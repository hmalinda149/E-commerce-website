<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\Contact;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function view_category()
    {
        if(Auth::id())
        {
            $data=Category::all();

            return view('admin.category',compact('data'));
        }
        else
        {
            return redirect('/login');
        }

    }

    public function upload_category(Request $request)
    {
        if(Auth::id())
        {
            $data = new Category;
            $data->Category_name = $request->category;
            $data->save();
            return redirect()->back()->with('message','Category added successfully');
        }
        else
        {
            return redirect('/login');
        }


    }

    public function delete_category($id)
    {
        if(Auth::id())
        {
            $data = Category::find($id);
            $data->delete();
            return redirect()->back()->with('message','Caregory deleted successfully');
        }
        else
        {
            return redirect('/login');
        }


    }

    public function add_product()
    {
        if(Auth::id())
        {
            $category = Category::all();
            return view('admin.add_prodect',compact('category'));
        }
        else
        {
            return redirect('/login');
        }


    }

    public function upload_product(Request $request)
    {
        if(Auth::id())
        {
            $product = new Product;

            $product->title = $request->title;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->discount_price = $request->discount_price;
            $product->quantity = $request->quantity;
            $product->category = $request->category;

            $image = $request->image;
            if($image){

                $imagename = time().'.'.$image->getClientOriginalExtension();
                $request->image->move('products',$imagename);
                $product->image = $imagename;
            }

            $product->save();
            return redirect()->back()->with('message','Product added successfully');

        }
        else
        {
            return redirect('/login');
        }





    }

    public function view_product()
    {
        if(Auth::id())
        {
            $product = Product::all();
            return view('admin.view_product',compact('product'));
        }
        else
        {
            return redirect('/login');
        }


    }

    public function delete_product($id)
    {
        if(Auth::id())
        {
            $product = Product::find($id);
            $product->delete();
            return redirect()->back()->with('message','Product deleted successfully');
        }
        else
        {
            return redirect('/login');
        }


    }

    public function update_product($id)
    {
        if(Auth::id())
        {
            $product = Product::find($id);
            $category = Category::all();
            return view('admin.update_product',compact('product','category'));
        }
        else
        {
            return redirect('/login');
        }


    }

    public function update_product_con($id,Request $request)
    {
        if(Auth::id())
        {
            $product = Product::find($id);

            $product->title = $request->title;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->discount_price = $request->discount_price;
            $product->quantity = $request->quantity;
            $product->category = $request->category;

            $image = $request->image;
            if($image){

                $imagename = time().'.'.$image->getClientOriginalExtension();
                $request->image->move('products',$imagename);
                $product->image = $imagename;
            }

            $product->save();
            return redirect('view_product')->with('message','Product Updated successfully');
        }
        else
        {
            return redirect('/login');
        }


    }

    public function order()
    {
        if(Auth::id())
        {
            $order = Order::all();
            return view('admin.order',compact('order'));
        }
        else
        {
            return redirect('/login');
        }


    }

    public function delivered($id)
    {
        if(Auth::id())
        {
            $order =Order::find($id);
            $order->delivery_status= 'Delivered';
            $order->payment_status='Paid';
            $order->save();
            return redirect()->back();
        }
        else
        {
            return redirect('/login');
        }


    }

    public function print_pdf($id)
    {
        if(Auth::id())
        {

            $order =Order::find($id);
            $pdf = Pdf::loadView('admin.invoice',compact('order'));
            return $pdf->download('invoice.pdf');
        }
        else
        {
            return redirect('/login');
        }


    }

    public function search(Request $request)
    {
        if(Auth::id())
        {
            $searchtext = $request->search;
            $order = Order::where('name','LIKE',"%$searchtext%")->orWhere('product_title','LIKE',"%$searchtext%")->get();
            return view('admin.order',compact('order'));
        }
        else
        {
            return redirect('/login');
        }


    }

    public function view_contact()
    {
        if(Auth::id())
        {
            $contact = Contact::all();
            return view('admin.view_contact',compact('contact'));
        }
        else
        {
            return redirect('/login');
        }


    }

    public function delete_contact($id)
    {
        if(Auth::id())
        {
            $contact = Contact::find($id);
            $contact->delete();
            return redirect()->back()->with('message','Caregory deleted successfully');
        }
        else
        {
            return redirect('/login');
        }


    }



}
