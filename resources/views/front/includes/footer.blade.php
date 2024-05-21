
<!-- footer  -->
<footer class="footer">
  <div class="footer_top">
    <div class="container">
      <div class="row">
       <div class="col-xl-3 col-md-6 col-lg-4">
          <div class="footer_widget">
            <h3 class="footer_title">Latest Recipes</h3>
            <ul>
              @foreach ($recipes as $key=>$value)
                <li><a href="{{route('front_recipe_detail',['id'=>$value->id])}}">{{$value->name}}</a></li>
              @endforeach
              {{-- <li><a href="#"> Manage Reputation</a></li>
              <li><a href="#">Power Tools</a></li>
              <li><a href="#">Marketing Service</a></li> --}}
            </ul>
          </div>
        </div>
        {{-- <div class="col-xl-3 col-md-6 col-lg-4">
          <div class="footer_widget">
            <h3 class="footer_title">Quick Links</h3>
            <ul>
              <li><a href="#">Jobs</a></li>
              <li><a href="#">Brand Assets</a></li>
              <li><a href="#">Investor Relations</a></li>
              <li><a href="#">Terms of Service</a></li>
            </ul>
          </div>
        </div> --}}
        <div class="col-xl-3 col-md-6 col-lg-4">
          <div class="footer_widget">
            <h3 class="footer_title">Features</h3>
            <ul>
              <li><a href="#">Recipe Search</a></li>
              <li><a href="#">Search By Ingredients</a></li>
            </ul>
          </div>
        </div>
        {{-- <div class="col-xl-3 col-md-6 col-lg-4">
          <div class="footer_widget">
            <h3 class="footer_title">Resources</h3>
            <ul>
              <li><a href="#">Guides</a></li>
              <li><a href="#">Research</a></li>
              <li><a href="#">Experts</a></li>
              <li><a href="#">Agencies</a></li>
            </ul>
          </div>
        </div> --}}
        
        <div class="col-xl-3 col-md-6 col-lg-4">
          <div class="footer_widget">
            <h3 class="footer_title">Countact Us</h3>
            <p>If you have any query feel free to contact us.</p>
            <ul>
              <li><a href="#">adv4607@gmail.com</a></li>
              <li><a href="#">+91-7600056742</a></li>
              <li><a href="#">+91-7600056742</a></li>
            </ul>
          </div>
        </div>
        <div class="col-xl-3 col-md-6 col-lg-4">
          <div class="footer_widget">
            <h3 class="footer_title">About Us</h3>
            <p>Welcome to Flavour Quest, your ultimate destination for delicious recipes, cooking tips, and culinary inspiration!</p>
            <ul>
              <a href="{{ route('front_about') }}" class="boxed-btn3" >Read More</a>
            </ul>
          </div>
        </div>
        {{-- <div class="col-xl-4 col-md-6 col-lg-4">
          <div class="footer_widget">
            <h3 class="footer_title">Subscribe</h3>
            <p class="newsletter_text">
              You can trust us. we only send promo offers,
            </p>
            <form action="#" class="newsletter_form">
              <input type="text" placeholder="Enter your mail" />
              <button type="submit"><i class="ti-arrow-right"></i></button>
            </form>
          </div>
        </div> --}}
      </div>
    </div>
  </div>
  {{-- <div class="copy-right_text">
    <div class="container">
      <div class="footer_border"></div>
      <div class="row align-items-center">
        <div class="col-xl-8 col-md-8">
           <p class="copy_right">
            Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0.
            Copyright &copy;
            <script>
              document.write(new Date().getFullYear());
            </script>
            All rights reserved | This template is made with
            <i class="fa fa-heart-o" aria-hidden="true"></i> by
            <a href="https://colorlib.com" target="_blank">Colorlib</a>
            Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0.
          </p> 
        </div>
        <div class="col-xl-4 col-md-4">
          <div class="socail_links">
            <ul>
              <li>
                <a href="#">
                  <i class="ti-facebook"></i>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="ti-twitter-alt"></i>
                </a>
              </li>
              <li>
                <!-- <a href="#">
                  <i class="fa fa-dribbble"></i>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fa fa-behance"></i>
                </a> -->
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div> --}}
</footer>
  <!--/ footer  -->

  <!-- JS here -->
  <script src="{{asset('assets/front/js/vendor/modernizr-3.5.0.min.js')}}"></script>
  <script src="{{asset('assets/front/js/vendor/modernizr-3.5.0.min.js')}}"></script>
  <script src="{{asset('assets/front/js/vendor/jquery-1.12.4.min.js')}}"></script>
  <script src="{{asset('assets/front/js/popper.min.js')}}"></script>
  <script src="{{asset('assets/front/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/front/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('assets/front/js/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('assets/front/js/ajax-form.js')}}"></script>
  <script src="{{asset('assets/front/js/waypoints.min.js')}}"></script>
  <script src="{{asset('assets/front/js/jquery.counterup.min.js')}}"></script>
  <script src="{{asset('assets/front/js/imagesloaded.pkgd.min.js')}}"></script>
  <script src="{{asset('assets/front/js/scrollIt.js')}}"></script>
  <script src="{{asset('assets/front/js/jquery.scrollUp.min.js')}}"></script>
  <script src="{{asset('assets/front/js/wow.min.js')}}"></script>
  <script src="{{asset('assets/front/js/nice-select.min.js')}}"></script>
  <script src="{{asset('assets/front/js/jquery.slicknav.min.js')}}"></script>
  <script src="{{asset('assets/front/js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{asset('assets/front/js/plugins.js')}}"></script>
  <script src="{{asset('assets/front/js/gijgo.min.js')}}"></script>

  <!--contact js-->
  <script src="{{asset('assets/front/js/contact.js')}}"></script>
  <script src="{{asset('assets/front/js/jquery.ajaxchimp.min.js')}}"></script>
  <script src="{{asset('assets/front/js/jquery.form.js')}}"></script>
  <script src="{{asset('assets/front/js/jquery.validate.min.js')}}"></script>
  <script src="{{asset('assets/front/js/mail-script.js')}}"></script>

  <script src="{{asset('assets/front/js/main.js')}}"></script>
</body>
</html>
