<x-header-admin/>



{{-- for text editor https://www.tiny.cloud/docs/quick-start/# --}}
{{-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>--}}
{{-- https://ckeditor.com/docs/ckeditor5/latest/builds/guides/quick-start.html --}}



<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>



{{-- <script>
tinymce.init({
  selector: 'textarea#product_description'
});
</script> --}}


    <!--Container Main start-->
    {{-- <div class="height-100 bg-light">
        <h4>Content HERE</h4>
    </div> --}}
    <!--Container Main end-->

    <style>
      

    .form-group
    {
        margin:3%;
        margin-left: 
    }

    .btn-lg:hover
    {
        background:#fef9e7;
    }
 
    /* succes message */
.page-wrapper
{
  /* https://www.loginradius.com/blog/async/simple-popup-tutorial/ */
  position: sticky;
        top: 0;
        bottom: 0;
        /* top: 30%; */
        left: 40%;
      
}

    .succes {
  background-color: #4BB543;
}
.succes-animation {
  animation: succes-pulse 2s infinite;
}


.custom-modal {
  position: relative;
  width: 350px;
  min-height: 250px;
  background-color: #fff;
  border-radius: 30px;
  margin: 40px 10px;
}
.custom-modal .content { 
  position: absolute;
  width: 100%;
  text-align: center;
  bottom: 0;
}
.custom-modal .content .type {
  font-size: 18px;
  color: #999;
}
.custom-modal .content .message-type {
  font-size: 24px;
  color: #000;
}
.custom-modal .border-bottom {
  position: absolute;
  width: 300px;
  height: 20px;
  border-radius: 0 0 30px 30px;
  bottom: -20px;
  margin: 0 25px;
}
.custom-modal .icon-top {
  position: absolute;
  width: 100px;
  height: 100px;
  border-radius: 50%;
  top: -30px;
  margin: 0 125px;
  font-size: 30px;
  color: #fff;
  line-height: 100px;
  text-align: center;
}
@keyframes succes-pulse { 
  0% {
    box-shadow: 0px 0px 30px 20px rgba(75, 181, 67, .2);
  }
  50% {
    box-shadow: 0px 0px 30px 20px rgba(75, 181, 67, .4);
  }
  100% {
    box-shadow: 0px 0px 30px 20px rgba(75, 181, 67, .2);
  }
}
@keyframes danger-pulse { 
  0% {
    box-shadow: 0px 0px 30px 20px rgba(202, 11, 0, .2);
  }
  50% {
    box-shadow: 0px 0px 30px 20px rgba(202, 11, 0, .4);
  }
  100% {
    box-shadow: 0px 0px 30px 20px rgba(202, 11, 0, .2);
  }
}
/* 
#addmorep
{
  width: 84%;
  margin-left : 10%;
  padding : 1%;
} */

    </style>
       
           {{-- product form----------------------------------------------------}}
          <div class="accordion-body"> 
           <div class="d-flex justify-content-center" style="margin:2%; padding:5%;" >
            <form style="width:85%" id="product_form" enctype="multipart/form-data">
             @csrf
             <div class="card">
                 <div class="card-body" style="margin:0.5%; padding:5%;"> 
              <div class="form-group">
                <label for="product_name">Product name</label>
                <input type="text" class="form-control" id="product_name" placeholder="Enter product name">
              </div>
              
                <div class="form-row">
                   <div class="form-group col">   
                      <label for="product_price">Add product price</label>
                      <input type="text" class="form-control" id="product_price" placeholder="Enter product price">
                   </div>
      
                   <div class="form-group col"> 
                    <label for="product_price"> Select courency type for price</label>
                    <select class="form-select" id="price_type" name="price_type" aria-label="">
                      @foreach($currency_type as $currency_types)
      
                      <option value="{{$currency_types->id}}"> {{$currency_types->code}} {{$currency_types->symbol}}</option> </option>
                      
                      @endforeach
                    </select>
                   </div> 
              </div>
                
              <div class="form-group">
                <label for="product_category"> Select product category</label>
                <select class="form-select" id="product_category" name="product_category" aria-label="Default select example">
                  <option selected>Open this category menu</option>
      
                  @foreach($category as $product_categories)
      
                      <option value="{{$product_categories->id}}"> {{$product_categories->categories}}</option> </option>
                      
                      @endforeach
                </select>
              </div>
               
      
              <div class="form-group">
                  <label for="product_description">Add product description</label>
                  {{-- <textarea id="product_description">Hello, World!</textarea> --}}
                  <textarea class="form-control" id="product_description" rows="5"> </textarea>
                </div>
          
                <div class="form-group" >
                  <label for="product_imiages">Upload product images</label>
                  {{-- <input class="form-control" type="file" id="formFileMultiple" name="product_imiages" id="product_imiages" multiple> --}}
                  <input type="file" class="form-control-file" name="product_imiages" id="product_imiages"  multiple>
                </div>
               
                <div class="form-group" >
                  <button type="button" class="btn btn-lg" style="background:#f3c93e" id="add-product" >Add product</button>
                </div>
          
              </div>
           </div>  
          
         </form>
          
          </div> 
        </div>  
           {{-- Product form end here--}}
      
    
{{-- https://codepen.io/FlorinCornea/pen/PoqeNjL --}}

{{-- product message --}}

{{-- <div class="page-wrapper">
  <div class="custom-modal">
    <div class="succes succes-animation icon-top"><i class="fa fa-check"></i></div>
    <div class="succes border-bottom"></div>
    <div class="content">
      <p class="type">Product</p>
      <p class="message-type">Succesfully Added</p>
    </div>
  </div> --}}


</body>

<script>
       
    $(document).ready(function(){
        
          // Pass data
              $("#add-product").click(function(e){
                   e.preventDefault();
                   
                  //  $('#myModel').show();

                    var p_name = $("#product_name").val();

                    var p_price = $("#product_price").val();

                    var p_description = $("#product_description").val();

                    var p_price_type = $("#price_type").val();

                    var p_category = $("#product_category").val();

                    var p_images = $('#product_imiages')[0].files;

                    // console.log(p_description);

                    var form_data = new FormData($("#product_form")[0]);


                    
                    // p_images.forEach(element => {
                    //   form_data.append('p_images',element);
                      
                    // });
                    $.each( p_images, function( key, value ) {
                         form_data.append('p_images['+key+']',value);

                    });
                    form_data.append('p_name',p_name);
                    form_data.append('p_price',p_price);
                    form_data.append('p_description',p_description);
                    form_data.append('p_price_type',p_price_type);
                    form_data.append('p_category',p_category);
                    
                    alert(form_data.p_category);

                  $.ajax({

                    type:'POST',

                    url:"/addproduct",

                    enctype: 'multipart/form-data',

                    dataType: "html",

                    contentType: false,
                    
                    processData: false,

                    data : form_data,

                    // data:{"_token": "{{ csrf_token() }}",p_name:p_name, p_price:p_price, p_description:p_description,p_image:p_image},

                    success:function(data){
                        
                       alert("Succsesfull");

                       $('#product_name').val(''); 
                       $('#product_price').val('');
                       $('#product_description').text('');
                       $('#product_imiages').val('');
                       $("#product_category").val('');
                       $("#price_type").val('');
                       
                        },
                    }); 
                  });

     
      });  


  </script>