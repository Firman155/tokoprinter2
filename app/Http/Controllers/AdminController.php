<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

use App\Models\Product;

class AdminController extends Controller
{
    public function view_category()
    {
        $data=category::all();
        return view('admin.category', compact('data'));
    }

    public function add_category(Request $request)
    {
        $data = new category;
        $data->namacategory=$request->namacategory;
        $data->deskripsi=$request->deskripsi;

        $data->save();
        return redirect()->back()->with('message', 'Category Berhasil Ditambahkan!');
    }

    public function delete_category($id)
    {
        $data=category::find($id);
        $data->delete();
        return redirect()->back()->with('pesan', 'Category Berhasil Dihapus!');
    }


    public function view_product()
    {
        $category=category::all();
        return view('admin.product', compact('category'));
    }

    public function add_product(Request $request)
    {
        $product=new product;

        $product->namaproduct=$request->namaproduct;
        $product->deskripsi=$request->deskripsi;
        $product->category=$request->category;
        $product->quantity=$request->quantity;
        $product->price=$request->price;
        $product->discount_price=$request->discount_price;

        $img=$request->img;
        $imgname=time().'.'.$img->getClientOriginalExtension();
        $request->img->move('product',$imgname);
        $product->img=$imgname;


        $product->save();
        return redirect()->back()->with('berhasil', 'Product Berhasil Ditambahkan!');
    }

    public function show_product()
    {
        $product=product::all();
        return view('admin.daftar_product', compact('product'));
    }

    public function delete_product($id)
    {
        $product=product::find($id);
        $product->delete();
        return redirect()->back()->with('hapus', 'Product Berhasil Dihapus!');
    }

    public function update_product($id)
    {
        $product=product::find($id);
        $category=category::all();
        return view('admin.update_product', compact('product','category'));
    }

    public function update_product_confirm(Request $request, $id)
    {
        $product=product::find($id);

        $product->namaproduct=$request->namaproduct;
        $product->deskripsi=$request->deskripsi;
        $product->category=$request->category;
        $product->price=$request->price;
        $product->discount_price=$request->discount_price;
        $product->quantity=$request->quantity;

        $img=$request->img;

        if($img){
            $imgname=time().'.'.$img->getClientOriginalExtension();
            $request->img->move('product',$imgname);
            $product->img=$imgname;
        }

        $product->save();
        return redirect()->back()->with('ubah', 'Product Berhasil Diubah!');
    }
}
