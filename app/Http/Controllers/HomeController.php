<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Product;

use App\Models\Cart;

use App\Models\Order;

class HomeController extends Controller
{
    public function index()
    {
        $product=Product::paginate(6);
        return view('home.userpage', compact('product'));
    }


    public function redirect()
    {
        $usertype=Auth::user()->usertype;

        if($usertype=='1'){
            $total_product=product::all()->count();
            $total_order=order::all()->count();
            $total_user=user::all()->count();
            $order=order::all();

            $total_revenue=0;

            foreach($order as $order)
            {
                $total_revenue=$total_revenue+$order->price;
            }

            $total_delivered=order::where('delivery_status','=','selesai')->get()->count();
            $total_processing=order::where('delivery_status','=','Processing')->get()->count();

            return view('admin.home', compact('total_product', 'total_order', 'total_user', 'total_revenue', 'total_delivered', 'total_processing'));
        }

        else{
            $product=Product::paginate(6);
            return view('home.userpage', compact('product'));
        }
    }

    public function product_details($id)
    {
        $product=product::find($id);
        return view('home.product_details', compact('product'));
    }

    public function add_cart(Request $request,$id)
    {
        if(Auth::id())
        {
            $user=Auth::user();
            $userid=$user->id;
            $product=product::find($id);
            $product_exist_id=cart::where('product_id','=',$id)->where('user_id','=',$userid)->get('id')->first();

            if($product_exist_id)
            {
                $cart=cart::find($product_exist_id)->first();
                $quantity=$cart->quantity;
                $cart->quantity=$quantity+$request->quantity;
                if($product->discount_price!=null)
                {
                    $cart->price=$product->discount_price * $cart->quantity;
                }

                else
                {
                    $cart->price=$product->price * $cart->quantity;
                }
                $cart->save();
                return redirect()->back()->with('cart', 'Product Berhasil Ditambahkan Ke Cart!');
            }
            else
            {

                $cart=new cart;
                $cart->name=$user->name;
                $cart->email=$user->email;
                $cart->phone=$user->phone;
                $cart->address=$user->address;
                $cart->user_id=$user->id;

                $cart->namaproduct=$product->namaproduct;

                if($product->discount_price!=null)
                {
                    $cart->price=$product->discount_price * $request->quantity;
                }

                else
                {
                    $cart->price=$product->price * $request->quantity;
                }

                $cart->img=$product->img;
                $cart->product_id=$product->id;

                $cart->quantity=$request->quantity;

                $cart->save();
                return redirect()->back()->with('cart', 'Product Berhasil Ditambahkan Ke Cart!');
            }


        }
        else
        {
            return redirect('login');
        }

    }

    public function show_cart()
    {
        if(Auth::id())
        {

            $id=Auth::user()->id;

            $cart=cart::where('user_id','=',$id)->get();

            return view('home.showcart', compact('cart'));
        }

        else
        {
            return redirect('login');
        }
    }

    public function remove_cart($id)
    {
        $cart=cart::find($id);
        $cart->delete();

        return redirect()->back()->with('hapus', 'Product Berhasil Dihapus Dari Cart!');
    }

    public function cash_order()
    {
        $user=Auth::user();
        $userid=$user->id;

        $data=cart::where('user_id','=',$userid)->get();

        foreach($data as $data)
        {
            $order=new order;
            $product = Product::find($data->product_id);
            $product->quantity = $product->quantity - $data->quantity;
            $product->save();
            $order->name=$data->name;
            $order->email=$data->email;
            $order->phone=$data->phone;
            $order->address=$data->address;
            $order->user_id=$data->user_id;

            $order->namaproduct=$data->namaproduct;
            $order->price=$data->price;
            $order->quantity=$data->quantity;
            $order->img=$data->img;
            $order->product_id=$data->product_id;

            $order->payment_status='Cash On Delivery';
            $order->delivery_status='Processing';

            $order->save();

            $cart_id=$data->id;
            $cart=cart::find($cart_id);
            $cart->delete();

        }

        return redirect()->back()->with('cod', 'Pesanan Berhasil Dibuat! Kami Akan Segera Mengonfirmasi Pesanan Anda. Terima Kasih!');
    }

    public function show_order()
    {
        if(Auth::id()){
            $user=Auth::user();
            $userid=$user->id;
            $order=order::where('user_id','=',$userid)->get();

            return view('home.order',compact('order'));

        }else{
            return redirect('login');
        }
    }

    public function cancel_order($id)
    {
        $order=order::find($id);
        $order->delivery_status='Pesanan DIbatalkan';

        $order->save();
        return redirect()->back()->with('cancel', 'Pesanan Berhasil Dibatalkan');
    }

    public function products()
    {
        $product=Product::paginate(6);
        return view('home.all_product',compact('product'));
    }
}
