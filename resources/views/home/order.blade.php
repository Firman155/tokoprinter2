<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="/home/images/logo6.png" type="">
      <title>Dodolan Printer | Orderan Anda</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{asset('home/css/bootstrap.css')}}" />
      <!-- font awesome style -->
      <link href="{{asset('home/css/font-awesome.min.css')}}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{asset('home/css/style.css')}}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{asset('home/css/responsive.css')}}" rel="stylesheet" />
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500&display=swap" rel="stylesheet">

   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
         <div class="col-sm-10 col-md-10 col-lg-10" style="margin: auto">
            <h1 class="text-center mb-4 mt-5" style="font-size: 30px; font-family:'Poppins';">Daftar Barang Orderan Anda</h1>

            @if(session()->has('cancel'))
            <div class="alert alert-danger">
                <button type="button" data-dismiss="alert" aria-hidden="true" class="close">x</button>
                {{session()->get('cancel')}}
            </div>
           @endif

            <table class="table table-hover mb-5" style="font-family: 'Poppins'">
                <thead class="bg-primary">
                  <tr>
                    <th scope="col" class="text-center">No.</th>
                    <th scope="col" class="text-center">Nama Product</th>
                    <th scope="col" class="text-center">Quantity</th>
                    <th scope="col" class="text-center">Harga</th>
                    <th scope="col" class="text-center">Gambar</th>
                    <th scope="col" class="text-center">Payment Status</th>
                    <th scope="col" class="text-center">Delivery Status</th>
                    <th scope="col" class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($order as $order)
                  <tr>
                    <td class="text-center">{{$loop->iteration}}.</td>
                        <td class="text-center">{{$order->namaproduct}}</td>
                        <td class="text-center">{{$order->quantity}}</td>
                        <td class="text-center">@currency($order->price)</td>
                        <td class="text-center"><img src="/product/{{$order->img}}" width="100px"></td>
                        <td class="text-center">{{$order->payment_status}}</td>
                        <td class="text-center">{{$order->delivery_status}}</td>
                        <td class="text-center">
                            @if($order->delivery_status=='Processing')
                            <a href="{{url('cancel_order',$order->id)}}" onclick="return confirm('Apakah Anda Yakin Ingin Membatalkan Orderan?')" class="btn btn-danger">Batalkan Orderan</a>

                            @else
                            <p class="text-primary">Pesanan Selesai</p>
                            @endif
                        </td>
                  </tr>
                  @endforeach
                </tbody>
            </table>
         </div>
      </div>
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>
