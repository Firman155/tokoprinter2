<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin | Update Product</title>
    <!-- plugins:css -->
    <base href="/public">
    @include('admin.css')
    <style type="text/css">
        .h2_font{
            font-size: 20px;
            padding-bottom: 40px;
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
        @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="col-8">
                    <h2 class="h2_font">Update Product</h2>
                    @if(session()->has('ubah'))
                        <div class="alert alert-success">
                            <button type="button" data-dismiss="alert" aria-hidden="true" class="close">x</button>
                            {{session()->get('ubah')}}
                        </div>
                    @endif
                    <form action="{{url('/update_product_confirm', $product->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="namaproduct" class="fw-semibold mb-2">Nama Product</label>
                            <input type="text" name="namaproduct" class="form-control mb-2n bg-dark text-light" id="namaproduct" autocomplete="off" value="{{$product->namaproduct}}" required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi" class="fw-semibold mb-2">Deskripsi</label>
                            <input type="text" id="deskripsi" name="deskripsi" class="form-control mb-2 bg-dark text-light" autocomplete="off" value="{{$product->deskripsi}}" required>
                        </div>
                        <div class="form-group">
                            <label for="img" class="fw-semibold mb-2">Gambar Sebelumnya</label>
                            <img height="100" width="100" src="/product/{{$product->img}}">
                        </div>
                        <div class="form-group">
                            <label for="img" class="fw-semibold mb-2">Ganti Gambar</label>
                            <input type="file" id="img" name="img" class="form-control mb-2 bg-dark text-light" autocomplete="off" placeholder="Masukkan Gambar Produk...">
                        </div>
                        <div class="form-group">
                            <label for="category" class="fw-semibold mb-2">Category</label>
                            <select name="category" id="category" class="form-control mb-2 bg-dark text-light" required>
                            <option class="form-control mb-2 bg-dark text-light" value="{{$product->category}}" selected>{{$product->category}}</option>
                            @foreach($category as $category)
                                <option class="form-control mb-2 bg-dark text-light" value="{{$category->namacategory}}">{{$category->namacategory}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="quantity" class="fw-semibold mb-2">Jumlah</label>
                            <input type="number" min="0" id="quantity" name="quantity" class="form-control mb-2 bg-dark text-light" autocomplete="off" value="{{$product->quantity}}" required>
                        </div>
                        <div class="form-group">
                            <label for="price" class="fw-semibold mb-2">Harga Satuan</label>
                            <input type="number" id="price" name="price" class="form-control mb-2 bg-dark text-light" autocomplete="off" value="{{$product->price}}" required>
                        </div>
                        <div class="form-group">
                            <label for="discount_price" class="fw-semibold mb-2">Harga Diskon</label>
                            <input type="number" id="discount_price" name="discount_price" class="form-control mb-2 bg-dark text-light" autocomplete="off" value="{{$product->discount_price}}">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary fw-semibold mb-5">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
  </body>
</html>
