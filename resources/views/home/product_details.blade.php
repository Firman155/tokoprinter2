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
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Dodolan Printer | Product Details</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{asset('home/css/bootstrap.css')}}" />
      <!-- font awesome style -->
      <link href="{{asset('home/css/font-awesome.min.css')}}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{asset('home/css/style.css')}}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{asset('home/css/responsive.css')}}" rel="stylesheet" />
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->

         <div class="col-sm-6 col-md-4 col-lg-4" style="margin: auto; padding:30px">
            <div class="card" style="width: 18rem;">
                @if(session()->has('cart'))
                    <div class="alert alert-primary">
                        <button type="button" data-dismiss="alert" aria-hidden="true" class="close">x</button>
                        {{session()->get('cart')}}
                    </div>
                @endif
                <h3 class="text-center mt-3 mb-3">Product Details</h3>
                <img src="/product/{{$product->img}}" class="card-img-top" width="300" height="300">
                <div class="card-body text-center">
                  <h5>{{$product->namaproduct}}</h5>
                </div>
            <div class="card-body">
                    @if($product->discount_price!=null)

                  <h6 class="mb-2" style="text-decoration: line-through; color:red">
                    Harga Product :
                    @currency($product->price)
                  </h6>


                <h6 class="mb-2" style="color: blue">
                    Harga Diskon    :
                    @currency($product->discount_price)
                </h6>

              @else
                <h6 class="mb-2" style="color: blue">
                  Harga Product :
                  @currency($product->price)
                </h6>
              @endif
                <h6 class="mb-2">Deskripsi : {{$product->deskripsi}}</h6>
                <h6 class="mb-2">Category : {{$product->category}}</h6>
                <h6>Quantity : {{$product->quantity}}</h6>
                <form action="{{url('add_cart', $product->id)}}" method="POST">
                    @csrf
                    <div class="row text-center mt-3">
                        <div class="col-md-4">
                            <input type="number" name="quantity" value="1" min="1" width="100px">
                        </div>
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary text-dark rounded-full px-3 py-2"><i class="bi bi-cart-plus-fill"></i> Add To Cart</button>
                        </div>
                    </div>
                </form>
            </div>
                </div>
              </div>
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
