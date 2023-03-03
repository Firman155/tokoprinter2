<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin | Category</title>
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
                <div class="col-5">
                    <h2 class="h2_font">Tambah Category</h2>
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            <button type="button" data-dismiss="alert" aria-hidden="true" class="close">x</button>
                            {{session()->get('message')}}
                        </div>
                    @endif
                    <form action="{{url('add_category')}}" method="post">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="namacategory" class="fw-semibold mb-2">Nama Kategori</label>
                            <input type="text" id="namacategory" name="namacategory" class="form-control mb-2n bg-dark text-light" autocomplete="off" placeholder="Masukkan Nama Kategori...">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi" class="fw-semibold mb-2">Deskripsi</label>
                            <input type="text" id="deskripsi" name="deskripsi" class="form-control mb-2 bg-dark text-light" autocomplete="off" placeholder="Masukkan Deskripsi Kategori...">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary fw-semibold mb-5">Simpan</button>
                        </div>
                    </form>
                </div>
                <div class="col-5">
                    @if(session()->has('pesan'))
                        <div class="alert alert-danger">
                            <button type="button" data-dismiss="alert" aria-hidden="true" class="close">x</button>
                            {{session()->get('pesan')}}
                        </div>
                    @endif
                </div>
                <div class="col-12">
                    <h2 class="h2_font">Daftar Category</h2>
                    <table class="table table-dark table-hover">
                        <thead>
                          <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Nama Category</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Aksi</th>
                          </tr>
                        </thead>

                        @foreach ($data as $data)

                        <tbody>
                            <tr>
                                <td>{{$loop->iteration}}.</td>
                                <td>{{$data->namacategory}}</td>
                                <td>{{$data->deskripsi}}</td>
                                <td>
                                    <a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Category?')" href="{{url('delete_category', $data->id)}}" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></a>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    <!-- plugins:js -->
    @include('admin.script')
    {{-- plugins --}}
  </body>
</html>
