<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

<section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
          <h2>
             <span>Product</span> Kami
          </h2>
       </div>
       <div class="row">
        @foreach ($product as $products)
        <div div class="col-sm-6 col-md-4 col-lg-4">
           <div class="box">
              <div class="option_container">
                 <div class="options">
                    <a href="{{url('product_details',$products->id)}}">
                        <button class="btn btn-outline-warning text-dark rounded-full px-4 py-2"><i class="bi bi-card-list"></i> Details</button>
                    </a>
                    <form action="{{url('add_cart', $products->id)}}" method="POST">
                        @csrf
                        <div class="row text-center">
                            <div class="col-md-3">
                                <input type="number" name="quantity" value="1" min="1" width="100px">
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-outline-primary text-dark rounded-full px-3 py-2"><i class="bi bi-cart-plus-fill"></i> Add To Cart</button>
                            </div>
                        </div>
                    </form>
                </div>
              </div>
              <div class="img-box">
                 <img src="product/{{$products->img}}" alt="">
              </div>
              <div class="detail-box">
                 <h5>
                    {{$products->namaproduct}}
                 </h5>
              </div>
              @if($products->discount_price!=null)
              <div class="detail-box">
                  <h6 style="text-decoration: line-through; color:red">
                    Harga Product :
                    Rp {{$products->price}}
                  </h6>
              </div>
              <div class="detail-box">
                <h6 style="color: blue">
                    Harga Diskon    :
                    Rp {{$products->discount_price}}
                </h6>
              </div>
              @else
              <div class="detail-box">
                <h6 style="color: blue">
                  Harga Product :
                  Rp {{$products->price}}
                </h6>
              </div>
              @endif
           </div>
        </div>
        @endforeach

        <span style="padding-top: 20px">
            {!!$product->withQueryString()->links('pagination::bootstrap-5')!!}
        </span>
    </div>
 </section>
