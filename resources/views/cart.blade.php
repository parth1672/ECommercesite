<x-link />
<meta name="csrf-token" content="{{ csrf_token() }}" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>
 
/* .cart_product
{
    margin-top: 5%;
    margin-bottom:5%;
    margin-left:5%;
    margin-right: 5%;
    width: 100%;
} */

.cart_product
{
  margin: 5%;

}

.delete-btn
{
  bottom: 0;
    text-align: left;
    position: relative;
}

/* .cart-data
{
  margin-top: 2%;
  width:25%;
  margin-left: 80%;
} */

.alert
{
  margin-top: 5%;
  margin-bottom : 20%;
  margin-left:5%;
  margin-right: 5%;
}
 

</style>    

<x-header />
<main> 
{{-- <section > --}}
     
  @if (Session::get('email') == false)
  <div class="alert alert-primary" role="alert">
    <h1> Plaese Login To see Cart.  </h1>
  </div>
  
  @elseif (empty($products))
   <div class="alert alert-info" role="alert">
    <h2> No items in your cart , <a href="/product" class="alert-link" > click here</a> to buy &#128522;  </h2>
  </div>

  @else  
  {{-- cart data --}}
 {{-- <div class= "cart-data">
  
  <table border= "1">
    <thead>
        <th> Cart <th>
    </thead>  
    <tbody>
          <td> ksdjbvfskjvbfvk <td> 
    </tbody>
  </table> --}}

 {{-- </div> --}}
  <div id="cart_user" > 
    <div class="cart_product">
        <table class="table table-hover table-responsive-xl">
        <thead>
          <tr>
            <th scope="col">Item</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Subtotal</th>
          </tr>
        </thead>
        <tbody>
          @foreach($products as $key=>$product)
          <tr>
            <th scope="row">
              <div style="width:200px;height:200px;" >
              <a href="/product-info/{{$product->id}}" > <img src="product_image/{{$product->image}}"  style="width:200px;height:200px;"> </a>
              </div>
                 <h4 style="width:40%" > {{$product->name}} </h4>
            </th>
            <td>$<span class="price" >{{$product->price}}</span> </td>
            <input type="hidden" id="price" value="{{$product->price}}" >
            <input type="hidden" id="productid" name="product_id" value="{{$product->id}}">
           
            <td><input type="number" id="quantity{{$product->id}}" name="quantity" min="1" max="20" value="1" style="width: 50px;" onchange="priceclac({{$product->price}},{{$product->id}})" ></td>
            <td> $ <span id="subtotal{{$product->id}}" > {{$product->price}} </span><div style="height:100%;"> <a href="removecart/{{$product->id}}"> <button type="button" id="delete-btn" class="btn btn-danger" class="delete-btn" value="{{$product->id}}" ><i class="fas fa-trash-alt"></i></button> </a> </div> </td>
          </tr>
        @endforeach
        <tr>
        
         <td colspan="3" style="text-align:right;">  <td>
           </tr>
          </tbody>
         </table>
      <div  style="text-align:center;">
       <button type="button" class="btn btn-lg" id="checkout" style="background-color :#f3c93e;">Check Out</button>
       </div>  
 </div>  
</div>

<div id="userddetail" style="display: none;width:80%;margin-left:10%;margin-bottom:5%;margin-top:5%">
   
<form actions="/checkout" method="post">
  @csrf
  <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control"  id="name" placeholder="name" value="{{$userdetail->name}}">
    </div>
    <div class="form-group">
    <fieldset disabled>
      <label for="email">Email</label>
      <input type="email" class="form-control" placeholder="email" value="{{$userdetail->email}}">
      </fieldset>
    </div>
  <div class="form-group">
    <label for="address">Address</label>
    <input type="text" class="form-control" id="address" id="address" placeholder="1234 Main St">
  </div>
  <div class="form-group">
    <label for="pincode">Pin Code</label>
    <input type="text" class="form-control" id="pincode" placeholder="395004">
  </div>
  
    <div class="form-group">
      <label for="phone">Phone</label>
      <input type="text" class="form-control" id="phone" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" placeholder="1234567">
  </div>
  
  <input type="submit" id="payment"  class="btn btn-primary" value="Payment">
</form>

</div>




@endif

{{-- </section> --}}
</main> 
<x-footer />    

<script>
 $("#cart").show();
function priceclac(x,y)
{

  var quantity = parseFloat($("#quantity"+ y).val());
   

  $("#subtotal"+y).html(quantity * x);  
}

 
$("#checkout").click(function(e){
                   e.preventDefault();
                
                      var productid = [];
                      var quantity = [];
                    $("input[name='quantity']").each(function(){
                         quantity.push($(this).val());
                    });
                    
                    $("input[name='product_id']").each(function(){
                      productid.push($(this).val());
                    });

                  $.ajax({

                    type:'POST',

                    url:"/quantity",

                    enctype: 'multipart/form-data',

                    // data : form_data,

                    data:{"_token": "{{ csrf_token() }}",productid:productid,quantity:quantity},

                    success:function(data){
                        if (data == 1) {
                          // $("#cart_user").hide();
                          // $("#userddetail").show();
                          window.location.replace("/checkout");
                        }
          
                         },
                      }); 
                  });

     
      // }); 


</script>
