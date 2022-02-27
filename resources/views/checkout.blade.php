<x-link />

    
<x-header />
<main> 
{{-- <section > --}}
      

<div id="userddetail" style="width:80%;margin-left:10%;margin-bottom:5%;margin-top:5%">
   
{{-- <form action="/checkoutuser" method="post" enctype="multipart/form-data">
  @csrf --}}
  <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control"  id="username" placeholder="name" value="{{$userdetail->name}}">
    </div>
    <div class="form-group">
    <fieldset disabled>
      <label for="email">Email</label>
      <input type="email" class="form-control" placeholder="email" value="{{$userdetail->email}}">
      </fieldset>
    </div>
  <div class="form-group">
    <label for="address">Address</label>
    <input type="text" class="form-control" id="address"  placeholder="1234 Main St">
  </div>
  <div class="form-group">
    <label for="pincode">Pin Code</label>
    <input type="text" class="form-control" id="pincode" placeholder="395004">
  </div>
  
    <div class="form-group">
      <label for="phone">Phone</label>
      <input type="text" class="form-control" id="phone" maxlength="10" minlength="10" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" placeholder="1234567">
  </div>
  <div class="form-group">
    <fieldset disabled>
      <label for="email">Total</label>
      <input type="text" class="form-control" placeholder="total" value="{{$total}}">
      
      </fieldset>
    </div>
  
  <input type="submit" id="submit" class="btn btn-primary" value="Payment">
{{-- </form> --}}

</div>

{{-- </section> --}}
</main> 
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
<input type="hidden" id="total" name="total" value="{{$total}}"/>



<x-footer />    

<script>
  $(document).ready(function(){
  
      $("#submit").click(function(e){
        e.preventDefault();
  
  
        var name = $("#username").val();
        alert(name);
        var address = $("#address").val();
        var pincode = $("#pincode").val();
        var phone = $("#phone").val();
        var total = $("#total").val();
  
        $.ajax({
  
         type:'POST',
  
         url:"/checkoutuser",
  
         enctype: 'multipart/form-data',
  
  
  
         data:{"_token": "{{ csrf_token() }}",name:name,address:address,pincode:pincode,phone:phone,total:total},
  
          success:function(data){
          if (data == 1) {
             // $("#cart_user").hide();
             // $("#userddetail").show();
            //  window.location.replace("/checkout");
            window.location.replace("/payment");
           }
  
          },
        }); 
        
   
      });
  
     
  });
  
  </script>


