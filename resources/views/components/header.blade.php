<style>
.user-account
{
  color: white;
}

.user_option_box:hover
{
  color:#f3c93e;
  cursor: pointer;
}
</style>
   
   
   {{-- <div class="hero_area"> --}}
        <!-- header section strats -->
        <header class="header_section">
          <div class="header_top">
            <div class="container-fluid">
              <div class="top_nav_container">
                <div class="contact_nav">
                  <a href="">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <span>
                      Call : +01 123455678990
                    </span>
                  </a>
                  <a href="mailto:testmailparth9@gmail.com">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                    <span>
                      Email : testmailparth9@gmail.com
                    </span>
                  </a>
                </div>
                <form class="search_form">
                  <input type="text" class="form-control" placeholder="Search here...">
                  <button class="" type="submit">
                    <i class="fa fa-search" aria-hidden="true"></i>
                  </button>
                </form>
                <div class="user_option_box">
                  <a class="account-link" data-toggle="modal" data-target="#RegisterForm" >
                    <i class="fa fa-user" aria-hidden="true"> </i>
                    <span class="user-account" >
                      {{session()->has('user') ? session('user') : "My Account" ;}}
                      
                    </span>
                  </a>
                  <a href="/cart" class="cart-link" id="cart">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    <span>
                      Cart
                    </span>
                  </a>
                </div>
              </div>
    
            </div>
          </div>
          <div class="header_bottom">
            <div class="container-fluid">
              <nav class="navbar navbar-expand-lg custom_nav-container ">
                <a class="navbar-brand" href="/">
                  <span>
                    Minics
                  </span>
                </a>
    
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class=""> </span>
                </button>
    
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav ">
                    <li class="nav-item ">
                      <a class="nav-link" href="/" style="{{ "/" == request()->path() ? "color:#f3c93e;" : "color:white;" }}" >Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                      <a class="nav-link" href="/about" style="{{ "about" == request()->path() ? "color:#f3c93e;" : "color:white;" }}" > About</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/product" style="{{ "product" == request()->path() ? "color:#f3c93e;" : "color:white;" }}" >Products</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/why" style="{{ "why" == request()->path() ? "color:#f3c93e;" : "color:white;" }}" >Why Us</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/testimonial" style="{{ "testimonial" == request()->path() ? "color:#f3c93e;" : "color:white;" }}" >Testimonial</a>
                    </li>

                    <li class="nav-item">
                      <a class="nav-link" href="/logout" style="color:white;" data-toggle="tooltip" data-placement="left" title="Logout" ><i class="fas fa-sign-out-alt" ></i></a>
                    </li>

                  </ul>
                </div>
              </nav>
            </div>
          </div>
        </header>
        <!-- end header section -->
      {{-- </div> --}}
      <!--Modal: Login / Register Form-->
      <div class="modal fade" id="RegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
            
          <form>
          <div id="singup-form">
    
          <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold">Sign up</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
         <div class="alert alert-danger error-msg" style="display:none">
                  <ul></ul>
            </div>
          
          <div class="modal-body mx-3">
            <div class="md-form mb-5">
              <i class="fas fa-user prefix grey-text"></i>
              <input type="text" id="name" name="name" class="form-control validate">
              <label data-error="wrong" data-success="right" for="name">Your name</label>
              {{-- @if ($errors->has('name'))
    
            <span style="color:red" >{{ $errors->first('name') }}</span><br>
     
             @endif  --}}
            </div>
            <div class="md-form mb-5">
              <i class="fas fa-envelope prefix grey-text"></i>
              <input type="email" id="email" name="email" class="form-control validate">
              <label data-error="wrong" data-success="right" for="email">Your email</label>
              <span style="color:red" id="email-error" ></span><br>
     
            
            </div>
    
            <div class="md-form mb-4">
              <i class="fas fa-lock prefix grey-text"></i>
              <input type="password" id="password" name="password" class="form-control validate">
              <label data-error="wrong" data-success="right" for="password">Your password</label>
              {{-- @if ($errors->has('password'))
    
            <span style="color:red" >{{ $errors->first('password') }}</span><br>
     
             @endif  --}}
            </div>
            
            <div class="md-form mb-4">
              <i class="fas fa-lock prefix grey-text"></i>
              <input type="password" id="password_confirmation" name="password_confirmation" class="form-control validate">
              <label data-error="wrong" data-success="right" for="password_confirmation">Conform password</label>
              {{-- @if ($errors->has('password_confirmation'))
    
            <span style="color:red" >{{ $errors->first('password_confirmation') }}</span><br>
     
             @endif  --}}
            </div>
    
          </div>
          <div class="modal-footer d-flex justify-content-center">
            <button class="btn" id="singup-btn" style="background-color:#f3c93e" >Sign up</button>
          </div>
              
              <div>
              <a id="login-form-link" href="#" class="link-info"> Have an account? </a>
              </div>
    
          </div>
    
        {{-- Login form --}}
          <div id="login-form" style="display:none;" >
            <div class="modal-header text-center">
              <h4 class="modal-title w-100 font-weight-bold">Login</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           <div class="alert alert-danger error-msg" style="display:none">
                  <ul></ul>
            </div>
    
            <div class="modal-body mx-3">
              
              <div class="md-form mb-5">
                <i class="fas fa-envelope prefix grey-text"></i>
                <input type="email" id="email-login" name="email" class="form-control validate">
                <label data-error="wrong" data-success="right" for="email">Your email</label>
                <span style="color:red" id="email-error" ></span><br>
       
              
              </div>
      
              <div class="md-form mb-4">
                <i class="fas fa-lock prefix grey-text"></i>
                <input type="password" id="password-login" name="password" class="form-control validate">
                <label data-error="wrong" data-success="right" for="password">Your password</label>
                {{-- @if ($errors->has('password'))
      
              <span style="color:red" >{{ $errors->first('password') }}</span><br>
       
               @endif  --}}
              </div>
              
      
            </div>
            <div class="modal-footer d-flex justify-content-center">
              <button class="btn" id="login-btn" style="background-color:#f3c93e" >Login</button>
            </div>
    
            <div>
              <a id="singup-form-link" href="#" class="link-info"> Don't Have an account? </a>
              </div>
    
          </div>
    
    
          <form>
        </div>
      </div>
    </div>
 

       
      <script>
       
        $(document).ready(function(){
        
              // Pass data
                  $("#singup-btn").click(function(e){
                       e.preventDefault();
                     

                        var name = $("#name").val();

                        var password = $("#password").val();

                        var email = $("#email").val();
         
                        var password_confirmation = $("#password_confirmation").val();


                      $.ajax({

                        type:'POST',

                        url:"/singup",

                        data:{"_token": "{{ csrf_token() }}",name:name, password:password, email:email,password_confirmation:password_confirmation},

                        success:function(data){

                     if ($.isEmptyObject(data.error)) {
                        //  alert("Succsesfull singup");
                         location.reload();
                          //  $(".fade").hide()
                            
                    }else{
                        printErrorMsg(data.error)
                    }

                            },
                        }); 
                      });

                     

                 $("#login-form-link").on("click", function(e){
                  e.preventDefault();
                     
                   $("#singup-form").hide();
                   $("#login-form").show();

                 });     

                 $("#singup-form-link").on("click", function(e){
                  e.preventDefault();
                     
                   $("#singup-form").show();
                   $("#login-form").hide();

                 });
                //pass-data for login
                 $("#login-btn").click(function(e){
                       e.preventDefault();
                    

                        var password = $("#password-login").val();

                        var email = $("#email-login").val();


                      $.ajax({

                        type:'POST',

                        url:"/login",

                        data:{"_token": "{{ csrf_token() }}", password:password, email:email},

                        success:function(data){

                           if ($.isEmptyObject(data.error)) {
                              //  alert("Succsesfull Login");
                               location.reload();
                          //  $(".fade").hide();
                          }else{
                            console.log(data.error);
                              printErrorMsg(data.error)
                              
                         }

                            },

                            
                        }); 
                      });

 // for showing error in singup or in login 
//  https://www.mywebtuts.com/blog/laravel-8-ajax-form-validation-example
                function printErrorMsg(msg) {
                       $('.error-msg').find('ul').html('');
                       $('.error-msg').css('display','block');
                       $.each( msg, function( key, value ) {
                           $(".error-msg").find("ul").append('<li>'+value+'</li>');
                       });
                       }
         
          });  
        
      </script>