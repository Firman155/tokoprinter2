<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin | Daftar Product</title>
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
        <div class="col-12">
            <h2 class="h2_font">Daftar Product</h2>
            @if(session()->has('hapus'))
                <div class="alert alert-danger">
                    <button type="button" data-dismiss="alert" aria-hidden="true" class="close">x</button>
                    {{session()->get('hapus')}}
                </div>
            @endif
            <table class="table table-dark table-hover">
                <thead>
                  <tr>
                    <th scope="col" class="text-center">No.</th>
                    <th scope="col" class="text-center">Nama Product</th>
                    <th scope="col" class="text-center">Deskripsi</th>
                    <th scope="col" class="text-center">Category</th>
                    <th scope="col" class="text-center">Jumlah</th>
                    <th scope="col" class="text-center">Harga Satuan</th>
                    <th scope="col" class="text-center">Harga Diskon</th>
                    <th scope="col" class="text-center">Gambar</th>
                    <th scope="col" class="text-center">Aksi</th>
                  </tr>
                </thead>

                @foreach ($product as $product)

                <tbody>
                    <tr>
                        <td class="text-center">{{$loop->iteration}}.</td>
                        <td class="text-center">{{$product->namaproduct}}</td>
                        <td class="text-center">{{$product->deskripsi}}</td>
                        <td class="text-center">{{$product->category}}</td>
                        <td class="text-center">{{$product->quantity}}</td>
                        <td class="text-center">{{$product->price}}</td>
                        <td class="text-center">{{$product->discount_price}}</td>
                        <td>
                            <img src="/product/{{$product->img}}" class="mx-auto">
                        </td>
                        <td>
                            <a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Product?')" href="{{url('delete_product', $product->id)}}" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></a>

                            <a href="{{url('update_product', $product->id)}}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>
<!-- container-scroller -->
<!-- plugins:js -->
@include('admin.script')
</body>
</html>
