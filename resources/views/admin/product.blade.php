<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin | Product</title>
    <!-- plugins:css -->
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
                    <h2 class="h2_font">Tambah Product</h2>
                    @if(session()->has('berhasil'))
                        <div class="alert alert-success">
                            <button type="button" data-dismiss="alert" aria-hidden="true" class="close">x</button>
                            {{session()->get('berhasil')}}
                        </div>
                    @endif

                    <form action="{{url('/add_product')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="namaproduct" class="fw-semibold mb-2">Nama Product</label>
                            <input type="text" name="namaproduct" class="form-control mb-2n bg-dark text-light" id="namaproduct" autocomplete="off" placeholder="Masukkan Nama Produk..." required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi" class="fw-semibold mb-2">Deskripsi</label>
                            <input type="text" id="deskripsi" name="deskripsi" class="form-control mb-2 bg-dark text-light" autocomplete="off" placeholder="Masukkan Deskripsi Kategori..." required>
                        </div>
                        <div class="form-group">
                            <label for="img" class="fw-semibold mb-2">Gambar</label>
                            <input type="file" id="img" name="img" class="form-control mb-2 bg-dark text-light" autocomplete="off" placeholder="Masukkan Gambar Produk..." required>
                        </div>
                        <div class="form-group">
                            <label for="category" class="fw-semibold mb-2">Category</label>
                            <select name="category" id="category" class="form-control mb-2 bg-dark text-light" required>
                                @foreach($category as $category)
                                <option class="form-control mb-2 bg-dark text-light" value="{{$category->namacategory}}">{{$category->namacategory}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="quantity" class="fw-semibold mb-2">Jumlah</label>
                            <input type="number" min="0" id="quantity" name="quantity" class="form-control mb-2 bg-dark text-light" autocomplete="off" placeholder="Masukkan Jumlah Produk..." required>
                        </div>
                        <div class="form-group">
                            <label for="price" class="fw-semibold mb-2">Harga Satuan</label>
                            <input type="number" id="price" name="price" class="form-control mb-2 bg-dark text-light" autocomplete="off" placeholder="Masukkan Harga Satuan..." required>
                        </div>
                        <div class="form-group">
                            <label for="discount_price" class="fw-semibold mb-2">Harga Diskon</label>
                            <input type="number" id="discount_price" name="discount_price" class="form-control mb-2 bg-dark text-light" autocomplete="off" placeholder="Masukkan Harga Diskon...">
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
