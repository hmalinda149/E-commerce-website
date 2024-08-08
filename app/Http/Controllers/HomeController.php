<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use App\Models\Contact;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\Foreach_;
use Stripe;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    public function index()
    {
        $product = Product::paginate(3);
        return view('home.userpage',compact('product'));
    }

    public function redirect()
    {
        $usertype = Auth::user()->user_type;

        if($usertype==1)
        {
            $total_product = Product::all()->count();
            $total_order = Order::all()->count();
            $total_user = User::all()->count();

            $order = Order::all();
            $total_revenue=0;

            foreach($order as $order)
            {
                $total_revenue = $total_revenue + $order->price;
            }

            $total_delivered = Order::where('delivery_status','=','Delivered')->count();

            $total_processing = Order::where('delivery_status','=','processing')->count();

            return view('admin.home',compact('total_product','total_order','total_user','total_revenue','total_delivered','total_processing'));
        }
        else
        {
            $product = Product::paginate(10);
            return view('home.userpage',compact('product'));
        }
    }

    public function product_details($id, )
    {
        $product = Product::find($id);
        return view('home.product_details',compact('product'));
    }

    public function add_cart(Request $request,$id)
    {
        if(Auth::id())
        {
            $user = Auth::user();
            $userid = $user->id;
            $product = Product::find($id);

            $product_exist_id=cart::where('product_id','=',$id)->where('user_id','=',$userid)->get('id')->first();

            if($product_exist_id)
            {
                $cart=cart::find($product_exist_id)->first();
                $quantity=$cart->quantity;
                $cart->quantity=$quantity + $request->quantity;

                    if($product->discount_price!=null)
                        {
                            $cart->price = $product->discount_price * $cart->quantity;
                        }
                         else
                        {
                            $cart->price = $product->price * $cart->quantity;
                        }

                $cart->save();
                return redirect()->back()->with('message','Product Added Successfully...');
            }
            else
            {
                $cart = new Cart;

                    $cart->name = $user->name;
                    $cart->email = $user->email;
                    $cart->phone = $user->phone;
                    $cart->address = $user->address;
                    $cart->user_id = $user->id;
                    $cart->product_title = $product->title;

                        if($product->discount_price!=null)
                                {
                                    $cart->price = $product->discount_price * $request->quantity;
                                }
                                else
                                {
                                    $cart->price = $product->price * $request->quantity;
                        }

                    $cart->image = $product->image;
                    $cart->product_id = $product->id;
                    $cart->quantity = $request->quantity;

                    $cart->save();
                    return redirect()->back()->with('message','Product Added Successfully...');
            }




        }
        else
        {
            return redirect('login');
        }


    }

    // public function show_cart()
    // {
    //     if(Auth::id())
    //     {
    //         $id = Auth::user()->id;
    //         $cart = Cart::where('user_id','=',$id)->get();
    //         return view('home.show_cart',compact('cart'));
    //     }
    //     else
    //     {
    //         return redirect('login');
    //     }

    // }
    public function show_cart()
{
    if(Auth::id())
    {
        $id = Auth::user()->id;
        $cart = Cart::where('user_id', '=', $id)->get();
        return view('home.show_cart', compact('cart'));
    }
    else
    {
        return redirect('login');
    }
}
public function update_cart_quantity(Request $request)
{
    if (Auth::id()) {
        $cartItem = Cart::find($request->id);

        if ($cartItem) {
            $cartItem->quantity = $request->quantity;
            $cartItem->save();

            // Calculate new total price
            $totalPrice = Cart::where('user_id', Auth::user()->id)->sum(DB::raw('quantity * price'));

            return response()->json(['totalPrice' => $totalPrice, 'itemTotal' => $cartItem->quantity * $cartItem->price]);
        }
    }

    return response()->json(['error' => 'Unauthorized'], 401);
}


    public function remove_cart($id)
    {
        if(Auth::id())
        {
            $cart = Cart::find($id);
            $cart->delete();
            return redirect()->back();
        }
        else
        {
            return redirect('/login');
        }


    }

    // public function cash_on_deli()
    // {
    //     if(Auth::id())
    //     {
    //         $user = Auth::user();
    //         $userid = $user->id;
    //         $data = cart::where('user_id','=',$userid)->get();

    //         foreach($data as $data)
    //         {
    //             $order = new Order;

    //             $order->name = $data->name;
    //             $order->email = $data->email;
    //             $order->phone = $data->phone;
    //             $order->address = $data->address;
    //             $order->user_id = $data->user_id;
    //             $order->product_title = $data->product_title;
    //             $order->price = $data->price;
    //             $order->quantity = $data->quantity;
    //             $order->image = $data->image;
    //             $order->product_id = $data->product_id;

    //             $order->payment_status = 'cash on delevery';
    //             $order->delivery_status = 'processing';
    //             $order->save();

    //             $cart_id = $data->id;
    //             $cart = cart::find($cart_id);
    //             $cart->delete();


    //         }
    //         return redirect()->back()->with('message','We have received ypur order. We will connect with you soon...');
    //     }
    //     else
    //     {
    //         return redirect('/login');
    //     }




    // }
    public function cash_on_deli()
{
    if(Auth::id())
    {
        $user = Auth::user();
        $userid = $user->id;
        $data = Cart::where('user_id', $userid)->get();

        DB::beginTransaction();

        try {
            foreach ($data as $item)
            {
                $order = new Order;

                $order->name = $item->name;
                $order->email = $item->email;
                $order->phone = $item->phone;
                $order->address = $item->address;
                $order->user_id = $item->user_id;
                $order->product_title = $item->product_title;
                $order->price = $item->price;
                $order->quantity = $item->quantity;
                $order->image = $item->image;
                $order->product_id = $item->product_id;

                $order->payment_status = 'cash on delivery';
                $order->delivery_status = 'processing';
                $order->save();

                // Update the product quantity
                $product = Product::find($item->product_id);
                if ($product) {
                    if ($product->quantity >= $item->quantity) {
                        $product->quantity -= $item->quantity;
                        $product->save();
                    } else {
                        DB::rollBack();
                        return redirect()->back()->with('message', 'Product not available in the requested quantity');
                    }
                } else {
                    DB::rollBack();
                    return redirect()->back()->with('message', 'Product not found');
                }

                $cart_id = $item->id;
                $cart = Cart::find($cart_id);
                $cart->delete();
            }

            DB::commit();
            return redirect()->back()->with('message', 'We have received your order. We will connect with you soon...');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('message', 'An error occurred while processing your order');
        }
    }
    else
    {
        return redirect('/login');
    }
}

    public function stripe($totalprice)
    {
        return view('home.stripe',compact('totalprice'));
    }

    public function stripePost(Request $request,$totalprice)
    {

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create ([
                "amount" => $totalprice,
                "currency" => "lkr"*100,
                "source" => $request->stripeToken,
                "description" => "Thanks for Payment."
        ]);

        $user = Auth::user();
        $userid = $user->id;
        $data = cart::where('user_id','=',$userid)->get();


        foreach($data as $data)
        {
            $order = new Order;

            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $data->address;
            $order->user_id = $data->user_id;
            $order->product_title = $data->product_title;
            $order->price = $data->price;
            $order->quantity = $data->quantity;
            $order->image = $data->image;
            $order->product_id = $data->product_id;

            $order->payment_status = 'Paid';
            $order->delivery_status = 'processing';
            $order->save();

            $product = Product::find($data->product_id); // Make sure you have a Product model
                if ($product) {
                    $product->quantity -= $data->quantity; // Decrease the quantity
                    $product->save(); // Save the updated product
                }

            $cart_id = $data->id;
            $cart = cart::find($cart_id);
            $cart->delete();


        }

        Session::flash('success', 'Payment successful!');

        return back()->with('totalprice', 0);
    }

    public function show_order()
    {
        if(Auth::id())
        {
            $user =Auth::user();
            $userid = $user->id;
            $order = Order::where('user_id','=',$userid)->get();
            return view('home.order',compact('order'));
        }
        else
        {
            return redirect('/login');
        }

    }

    public function cancel_order($id)
    {
        if(Auth::id())
        {
            $order = Order::find($id);
            $order->delivery_status = 'You cancelled order';
            $order->save();
            return redirect()->back();
        }
        else
        {
            return redirect('/login');
        }


    }

    public function search_product(Request $request)
    {
        $search_text = $request->search;
        $product = Product::where('title','LIKE',"%$search_text%")->orWhere('category','LIKE',"%$search_text%")->paginate(10);
        return view('home.userpage',compact('product'));
    }

    public function all_products()
    {
        $product = Product::paginate(10);
        return view('home.all_products',compact('product'));
    }

    public function product_search(Request $request)
    {
        $search_text = $request->search;
        $product = Product::where('title','LIKE',"%$search_text%")->orWhere('category','LIKE',"%$search_text%")->paginate(10);
        return view('home.all_products',compact('product'));
    }

    public function services()
    {
        return view('home.services');
    }

    public function about()
    {
        return view('home.about');
    }

    public function contact_us()
    {
        return view('home.contact_us');
    }

    public function add_contact( Request $request)
    {
        if(Auth::id())
        {
            $contact = new Contact;

            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->subject = $request->subject;
            $contact->message = $request->message;

            $contact->save();
            return redirect()->back();
        }
        else
        {
            return redirect('/login');
        }



    }

}
