<x-link />
<x-header />
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
    

     
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    {{-- <link href="{{asset('/product-info/style.css')}}" rel="stylesheet"> --}}
    
    <style>
/* Basic Styling */
/* html, body {
  height: 100%;
  width: 100%;
  margin: 0;
  font-family: 'Roboto', sans-serif;
} */

/* .container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 15px;
  display: flex;
} */

/* Columns */
/* .left-column {
  width: 65%;
  position: relative;
} */

/* .right-column {
  width: 35%;
  margin-top: 60px;
} */


/* Left Column */
.left-column img {
  width: 100%;
  position: absolute;
  left: 0;
  top: 0;
  opacity: 0;
  transition: all 0.3s ease;
}

.left-column img.active {
  opacity: 1;
}


/* Right Column */

/* Product Description */
.product-description {
  border-bottom: 1px solid #E1E8EE;
  margin-bottom: 20px;
}
.product-description span {
  font-size: 12px;
  color: #358ED7;
  letter-spacing: 1px;
  text-transform: uppercase;
  text-decoration: none;
}
.product-description h1 {
  font-weight: 300;
  font-size: 52px;
  color: #43484D;
  letter-spacing: -2px;
}
.product-description p {
  /* font-size: 16px;
  font-weight: 300;
  color: #86939E;
  line-height: 24px; */
}


/* Product Price */
.product-price {
  display: flex;
  align-items: center;
}

.product-price span {
  font-size: 26px;
  font-weight: 300;
  color: #43474D;
  margin-right: 20px;
}

.cart-btn {
  display: inline-block;
  background-color: #7DC855;
  border-radius: 6px;
  font-size: 16px;
  color: #FFFFFF;
  text-decoration: none;
  padding: 12px 30px;
  transition: all .5s;
}
.cart-btn:hover {
  background-color: #64af3d;
  cursor: pointer;
}

/* Responsive */
@media (max-width: 940px) {
  .container {
    flex-direction: column;
    margin-top: 60px;
  }

  .left-column,
  .right-column {
    width: 100%;
  }

  .left-column img {
    width: 300px;
    right: 0;
    top: -65px;
    left: initial;
  }
}

@media (max-width: 535px) {
  .left-column img {
    width: 220px;
    top: -85px;
  }
 /* image slide show w3school */
 /* Make the image fully responsive */
 /* .carousel-inner img {
    width: 100%;
    height: 100%;
  } */


}

    </style>    


    
    <main class="container">

      <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel" >
       
        <div class="carousel-inner container " style="height:500; width:500;">
           
        @foreach($product_images as $list)
          <div class="carousel-item  {{$loop->first?'active':''}}" style="height:800; width:800;">
              <img class="tales " src="/product_image/{{$list->image_name}}" alt="" width="1200" height="800">
          </div>
          @endforeach
        
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
          <h1><i class="fa fa-angle-left" aria-hidden="true" style="color:black;"></i></h1>
          {{-- <span class="carousel-control-prev-icon" aria-hidden="true"  ></span>
          <span class="sr-only ">  Previous</span> --}}
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
          <h1><i class="fa fa-angle-right" aria-hidden="true" style="color:black;"></i></h1>
          {{-- <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span> --}}
        </a>
      </div>
      

            
                  <!-- Right Column -->
                  <div class="right-column">

                    <!-- Product Description -->
                    <div class="product-description">
                      <span class>{{$product_category->categories}}</span>
                      <h1>{{$productdetails->name}}</h1>
                      <p>{!! html_entity_decode($productdetails->description) !!}</p>
                    </div>

                    <!-- Product Configuration -->
                    <div class="product-configuration">
                      {{-- message --}}
                      <div class="alert alert-success alert-dismissible fade show" id="success-add" role="alert" style="display: none;">
                         <p id="alert-message" > Poduct added successfully to cart <p>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      {{-- ------ --}}
                    <!-- Product Pricing -->
                    <div class="product-price">
                      <span>{{$product_currency->symbol}} {{$productdetails->price}}  </span> 
                      <button  id="addtocart" class="btn btn-success" type="button">Add to cart</button>
                      {{-- <a  id="myid" class="cart-btn">Add to cart</a> --}}
                      <input type="hidden" id="p_id" value="{{$productdetails->id}}">
                      <input type="hidden" id="p_price" value="{{$productdetails->price}}">
                    </div>
                  </div>
                </main>
             

              <br>
              <br><br><br><br><br><br><br><br><br>





 
<x-footer />



<script type="text/javascript">
  $(document).ready(function(){
  
    $("#addtocart").click(function(e){
                   e.preventDefault();
        

                 var p_id = $("#p_id").val();
                 var p_price = $("#p_price").val();

          


                  $.ajax({

                    type:'POST',

                    url:"/addtocart",

                    // dataType: "html",

                    data:{"_token": "{{ csrf_token() }}",p_id:p_id,p_price:p_price},

                    success:function(data){
                        
                       if(data==1){
                         $("#success-add").show().delay(3000).fadeOut(1500);
                        //  alert("Success");
                        // $('#addedSuccess')..modal('toggle');
                       }
                       if (data==2){
                        $("#alert-message").text("Product is already added");
                        $("#success-add").show().delay(3000).fadeOut(1500);
                        // alert("Product is already added"); 
                       }
                       if (data==0){
                        $("#alert-message").text("please Login For product add to your cart");
                        $("#success-add").show().delay(3000).fadeOut(1500);
                        //  alert("please Login For product add to your cart");
                       }
                       
                        },
                    }); 
                  });
  
  }); 

</script>
