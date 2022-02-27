<x-link />

<body class="sub_page">

    <div class="hero_area">
      <!-- header section strats -->
      <x-header />
      <!-- end header section -->
    </div>
  
  
    <!-- product section -->
  
    <section class="product_section layout_padding">
      <div class="container">
        <div class="heading_container heading_center">
          <h2>
            Our Products
          </h2>
        </div>
        <div class="row">
          @foreach ($products as $product)
        <div class="col-sm-6 col-lg-4">
          <div class="box">
            <a href="/productdetail" class="add_cart_btn">
            <div class="img-box">
              
              <img src="/product_image/{{$product->image}}" alt="">
              
                {{-- <span>
                  Add To Cart
                </span> --}}
             
            </div>
          </a>
            <div class="detail-box">
              <h5>
                {{$product->name}}
              </h5>
              <div class="product_info">
                <h5>
                  <span>$</span> {{$product->price}}
                </h5>
                <div class="star_container">
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        </div>
        <div class="btn_box">
          <a href="" class="view_more-link">
            View More
          </a>
        </div>
      </div>
    </section>
  
    <!-- end product section -->
  
  
  