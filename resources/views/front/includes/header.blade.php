<!DOCTYPE html>
<html class="no-js" lang="zxx">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Tasty Recipes</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <!-- Place favicon.ico in the root directory -->
    <style>
      .search-input {
        width: calc(100% - 40px); 
        padding: 5px 10px;
        border-radius: 25px;
        border: 2px solid yellow;
        outline: none;
        background-color: #fff;
        font-size: 16px;
        position: relative; 
      }

      .search-icon {
        position: absolute;
        top: 50%;
        right: 30px;
        transform: translateY(-50%);
        color: #999;
        border: none;
        background: none; 
        cursor: pointer; 
        background-color: transparent;
      }

      .search-icon:hover {
        color: #333; 
      }

    </style>

    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('assets/front/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/front/css/owl.carousel.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/front/css/magnific-popup.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/front/css/font-awesome.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/front/css/themify-icons.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/front/css/nice-select.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/front/css/flaticon.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/front/css/gijgo.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/front/css/animate.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/front/css/slick.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/front/css/slicknav.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/front/css/style.css')}}" />
    <!-- <link rel="stylesheet" href="{{asset('assets/front/css/responsive.css')}}"> -->
  </head>

  <body>
    <header>
      <div class="header-area">
        <div id="sticky-header" class="main-header-area">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-xl-3 col-lg-2">
                <div class="logo">
                  <a href="index.html">
                    <!-- <img src="img/logo.png" alt="" /> --> <h2 style="color: white;">Flavour<span style="color: yellow;">Quest</span></h2>
                  </a>
                </div>
              </div>
              <div class="col-xl-6 col-lg-7">
                <div class="main-menu d-none d-lg-block">
                  <nav>
                    <ul id="navigation">
                      <li><a href="{{route('front_index')}}" style="color: white;">home</a></li>
                      <li><a href="{{route('front_recipe_list')}}" style="color: white;">Recipes</a></li>
                      <li><a href="{{route('front_categories_search')}}" style="color: white;">Categories</a></li>
                      <li><a href="{{route('front_ingredient_search')}}" style="color: white;">Ingredient Search </a></li>
                      <li><a href="{{route('front_about')}}" style="color: white;">about</a></li>
                      {{-- <li>
                        <a href="#" style="color: white;">pages <i class="ti-angle-down"></i></a>
                        <ul class="submenu">
                          <li>
                            <a href="recipes_details.html" >Recipes Details</a>
                          </li>
                        </ul>
                      </li> --}}
                      {{-- <li><a href="contact.html" style="color: white;">Contact</a></li> --}}
                    </ul>
                  </nav>
                </div>
              </div>
              <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                <div class="search_icon">
                    <form method="POST" action="{{route('front_recipe_search')}}">
                      @csrf
                      <input type="text" class="search-input" name="search_recipe" placeholder="Search...">
                      <button class="search-icon" type="submit">
                        <i class="ti-search"></i>
                      </button>  
                    </form>
                  </div>
                </div>
             
              <div class="col-12">
                <div class="mobile_menu d-block d-lg-none"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- header-end -->