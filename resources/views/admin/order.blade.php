<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin | Daftar Order</title>
    <!-- plugins:css -->
    @include('admin.css')
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
                    <h2 style="font-size: 20px; padding-bottom:40px;">Daftar Order User</h2>

                    @if(session()->has('terkirim'))
                    <div class="alert alert-primary">
                        <button type="button" data-dismiss="alert" aria-hidden="true" class="close">x</button>
                        {{session()->get('terkirim')}}
                    </div>
                    @endif
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col" class="text-center">Nama</th>
                            <th scope="col" class="text-center">Telepon</th>
                            <th scope="col" class="text-center">Alamat</th>
                            <th scope="col" class="text-center">Nama Product</th>
                            <th scope="col" class="text-center">Jumlah</th>
                            <th scope="col" class="text-center">Harga</th>
                            <th scope="col" class="text-center">Status <br> Pembayaran</th>
                            <th scope="col" class="text-center">Status <br> Pengiriman</th>
                            <th scope="col" class="text-center">Gambar</th>
                            <th scope="col" class="text-center">Kirim</th>
                          </tr>
                        </thead>

                        @foreach ($order as $order)
                        <tbody>
                          <tr>
                            <td class="text-center">{{$order->name}}</td>
                            <td class="text-center">{{$order->phone}}</td>
                            <td class="text-center">{{$order->address}}</td>
                            <td class="text-center">{{$order->namaproduct}}</td>
                            <td class="text-center">{{$order->quantity}}</td>
                            <td class="text-center">{{$order->price}}</td>
                            <td class="text-center">{{$order->payment_status}}</td>
                            <td class="text-center">{{$order->delivery_status}}</td>
                            <td class="text-center">
                                <img src="/product/{{$order->img}}" alt="">
                            </td>
                            <td>
                                @if($order->delivery_status=='Processing')
                                <a href="{{url('delivered', $order->id)}}" class="btn btn-primary" onclick="return confirm('Apakah Anda Yakin Akan Mengirim Barang Ini Sekarang?')">Kirim</a>
                                @else
                                <p class="text-primary">Terkirim</p>
                                @endif
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
