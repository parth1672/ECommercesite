<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <link rel="icon" href="images/fevicon.png" type="image/gif" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Minics-admin</title>
  
  {{-- Jquary cdn --}}
  {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <!-- bootstrap core css -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet"> <!-- range slider -->
  
  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <!-- Custom styles for this template -->
  
  {{-- bootstarp jquery --}}
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>

    @import url("https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap");
    
    :root {
        --header-height: 3rem;
        --nav-width: 68px;
        --first-color-light: #AFA5D9;
        --white-color: #F7F6FB;
        --body-font: 'Nunito', sans-serif;
        --normal-font-size: 1rem;
        --z-fixed: 100
    }
    
    *,
    ::before,
    ::after {
        box-sizing: border-box
    }
    
    body {
        position: relative;
        margin: var(--header-height) 0 0 0;
        padding: 0 1rem;
        font-family: var(--body-font);
        font-size: var(--normal-font-size);
        transition: .5s
    }
    
    a {
        text-decoration: none
    }
    
    .header {
        width: 100%;
        height: var(--header-height);
        position: fixed;
        top: 0;
        left: 0;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 1rem;
        background-color:  #3a4468 ;
        z-index: var(--z-fixed);
        transition: .5s
    }
    
    .header_toggle {
        color: #000000;
        font-size: 1.5rem;
        cursor: pointer
    }
    
    .header_img {
        width: 35px;
        height: 35px;
        display: flex;
        justify-content: center;
        border-radius: 50%;
        overflow: hidden
    }
    
    .header_img img {
        width: 40px
    }
    
    .l-navbar {
        position: fixed;
        left: -30%;
        width: var(--nav-width);
        height: 100vh;
        background-color:  #3a4468 ;
        padding: .5rem 1rem 0 0;
        transition: .5s;
        z-index: var(--z-fixed)
    }
    
    .nav {
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        overflow: hidden
    }
    
    .nav_logo,
    .nav_link {
        display: grid;
        grid-template-columns: max-content max-content;
        align-items: center;
        column-gap: 1rem;
        padding: .5rem 0 .5rem 1.5rem
    }
    
    .nav_logo {
        margin-bottom: 2rem
    }
    
    .nav_logo-icon {
        font-size: 1.25rem;
        color: var(--white-color)
    }
    
    .nav_logo-name {
        color: var(--white-color);
        font-weight: 700
    }
    
    .nav_link {
        position: relative;
        color: var(--first-color-light);
        margin-bottom: 1.5rem;
        transition: .3s
    }
    
    .nav_link:hover {
        color: var(--white-color)
    }
    
    .nav_icon {
        font-size: 1.25rem
    }
    
    .show {
        left: 0
    }
    
    .body-pd {
        padding-left: calc(var(--nav-width) + 1rem)
    }
    
    .active {
        color: var(--white-color)
    }
    
    .active::before {
        content: '';
        position: absolute;
        left: 0;
        width: 2px;
        height: 32px;
        background-color: var(--white-color)
    }
    
    .height-100 {
        height: 100vh
    }
    
    @media screen and (min-width: 768px) {
        body {
            margin: calc(var(--header-height) + 1rem) 0 0 0;
            padding-left: calc(var(--nav-width) + 2rem)
        }
    
        .header {
            height: calc(var(--header-height) + 1rem)
        }
    
        .header_img {
            width: 40px;
            height: 40px
        }
    
        .header_img img {
            width: 45px
        }
    
        .l-navbar {
            left: 0;
            padding: 1rem 1rem 0 0
        }
    
        .show {
            width: calc(var(--nav-width) + 156px)
        }
    
        .body-pd {
            padding-left: calc(var(--nav-width) + 188px)
        }
    }
    
    .dropdown-toggle::after {
        margin-left: 0
    }
    
    </style>

{{-- page html --}}

<body id="body-pd"  background-color="#fef9e7" >
    <header class="header" id="header">
        <div class="header_toggle"><i id="header-toggle" class="fas fa-bars text-white"></i> </div>
        {{-- <div class="header_img"> <img src="https://osdeibi.dev/assets/img/faces/logoround.png" alt=""> </div> --}}
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">

            <div><a href="/admin/dashboard" class="nav_logo link-warning" data-toggle="tooltip" data-placement="right"  title="Dashboard"><i class="fas fa-address-book"></i><span class="nav_logo-name">Dashboard</span> </a>
                <a href="/admin/product_admin" class="nav_logo link-warning " data-toggle="tooltip" data-placement="right"  title="Products"><i class="fas fa-shopping-basket"></i><span class="nav_logo-name">Products</span> </a>
            
            
            
            </div>
            <div> </div>
            {{-- <div> <a href="#" class="nav_logo"><i class="fab fa-angellist"></i><span class="nav_logo-name">Dashboard</span> </a>
                <div class="nav_list"> <a href="#" class="nav_link active"> <i class="fas fa-shopping-basket"></i>  <span class="nav_name"> Product </span> </a> <a href="#" class="nav_link"> <i class="fas fa-anchor"></i> <span class="nav_name">Stats</span> </a> <a class="nav_link nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <i class="fas fa-award"></i> <span class="nav_name">Dropdown</span> </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </div>
            </div> <a href="#" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a> --}}
        </nav>
    </div>

{{-- scrit for side menu bar --}}
<script>
    document.addEventListener("DOMContentLoaded", function(event) {
    
    const showNavbar = (toggleId, navId, bodyId, headerId) =>{
    const toggle = document.getElementById(toggleId),
    nav = document.getElementById(navId),
    bodypd = document.getElementById(bodyId),
    headerpd = document.getElementById(headerId)
    
    if(toggle && nav && bodypd && headerpd){
    toggle.addEventListener('click', ()=>{
    nav.classList.toggle('show')
    toggle.classList.toggle('bx-x')
    bodypd.classList.toggle('body-pd')
    headerpd.classList.toggle('body-pd')
    })
    }
    }
    
    showNavbar('header-toggle','nav-bar','body-pd','header')
    
    const linkColor = document.querySelectorAll('.nav_link')
    
    function colorLink(){
    if(linkColor){
    linkColor.forEach(l=> l.classList.remove('active'))
    this.classList.add('active')
    }
    }
    linkColor.forEach(l=> l.addEventListener('click', colorLink))
    
    });
    
    </script>