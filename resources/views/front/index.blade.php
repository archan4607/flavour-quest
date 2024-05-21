    @include('front.includes.header')


    <!-- slider_area_start -->
    <div class="slider_area">
        <div class="single_slider d-flex align-items-center slider_bg_1">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-xl-8">
                        <div class="slider_text text-center">
                            <div class="text">
                                <h3 style="color: yellow;">Punjabi Dish with Naan</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider_area_end -->
    <!-- recepie_area_start  -->
    <div class="recepie_area">
        <div class="container">
            <div class="row">
                @foreach ($recipes as $key => $value)
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single_recepie text-center">
                            <div class="recepie_thumb">
                                <img src="{{ Storage::url(config('filesystems.path.url.recipe') . $value->image) }}"
                                    alt="" />
                                {{-- <img src="{{asset('assets/front/img/recepie/samosa.jpg')}}" alt="" /> --}}
                            </div>
                            <h3>{{ $value->name }}</h3>
                            <span>{{ $value->category_names }}</span>
                            <p>Time Needs: {{ $value->cooking_time }}</p>
                            <a href="{{ route('front_recipe_detail', ['id' => $value->id]) }}" class="line_btn">View
                                Full
                                Recipe</a>
                        </div>
                    </div>
                @endforeach
              </div>
              <div class="text-center">
                <a href="{{ route('front_recipe_list') }}" class="boxed-btn3">View all Recipes</a>

              </div>
        </div>
    </div>
    <!-- /recepie_area_start  -->

    <!-- recepie_videos   -->
    {{-- <div class="recepie_videoes_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="recepie_info">
                        <h3>Recipe videos that never misses any portion</h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates non nesciunt libero
                            autem, laboriosam eaque fugiat, deserunt numquam corporis delectus obcaecati explicabo eum
                            exercitationem sequi. Quasi vitae possimus totam voluptate distinctio aliquam doloremque ea
                            debitis commodi similique et minus numquam voluptas eos sed, neque aliquid. Dicta cupiditate
                            aliquam voluptates eveniet?
                        </p>
                        <div class="video_watch d-flex align-items-center">
                            <a class="popup-video" href="#">
                                <i class="ti-control-play"></i>
                            </a>
                            <div class="watch_text">
                                <h4>Watch Video</h4>
                                <p>You will love our execution</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="videos_thumb">
                        <div class="big_img">
                            <img src="{{ asset('assets/front/img/video/Biriyani.jpg') }}" alt="" />
                        </div>
                        <div class="small_thumb">
                            <img src="{{ asset('assets/front/img/video/small_1.png') }}" alt="" />
                        </div>
                        <div class="small_thumb_2">
                            <img src="{{ asset('assets/front/img/video/2.png') }}" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!--/ recepie_videos   -->

    @include('front.includes.latest_trend')


    <!-- customer_feedback_area  -->
    {{-- <div class="customer_feedback_area">
        <div class="container">
            <div class="row justify-content-center mb-50">
                <div class="col-xl-9">
                    <div class="section_title text-center">
                        <h3>Feedback From Customers</h3>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Error accusamus temporibus hic
                            esse, cum exercitationem expedita facilis ratione incidunt quibusdam voluptatibus modi
                            asperiores eaque officiis iste sit doloribus porro libero velit excepturi architecto in.
                            Dolores itaque voluptas impedit delectus soluta.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="customer_active owl-carousel">
                        <div class="single_customer d-flex">
                            <div class="thumb">
                                <img src="img/testmonial/2.png')}}" alt="" />
                            </div>
                            <div class="customer_meta">
                                <h3>Adame Nesane</h3>
                                <span>Chief Customer</span>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates, dolores?
                                    Nostrum voluptate autem tenetur doloremque sint non expedita, optio quisquam.
                                </p>
                            </div>
                        </div>
                        <div class="single_customer d-flex">
                            <div class="thumb">
                                <img src="img/testmonial/1.png')}}" alt="" />
                            </div>
                            <div class="customer_meta">
                                <h3>Adame Nesane</h3>
                                <span>Chief Customer</span>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora eligendi accusamus
                                    exercitationem quasi unde dolores, commodi sapiente aut laborum ullam?
                                </p>
                            </div>
                        </div>
                        <div class="single_customer d-flex">
                            <div class="thumb">
                                <img src="img/testmonial/2.png')}}" alt="" />
                            </div>
                            <div class="customer_meta">
                                <h3>Adame Nesane</h3>
                                <span>Chief Customer</span>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora eligendi accusamus
                                    exercitationem quasi unde dolores, commodi sapiente aut laborum ullam?
                                </p>
                            </div>
                        </div>
                        <div class="single_customer d-flex">
                            <div class="thumb">
                                <img src="img/testmonial/1.png')}}" alt="" />
                            </div>
                            <div class="customer_meta">
                                <h3>Adame Nesane</h3>
                                <span>Chief Customer</span>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora eligendi accusamus
                                    exercitationem quasi unde dolores, commodi sapiente aut laborum ullam?
                                </p>
                            </div>
                        </div>
                        <div class="single_customer d-flex">
                            <div class="thumb">
                                <img src="img/testmonial/2.png')}}" alt="" />
                            </div>
                            <div class="customer_meta">
                                <h3>Adame Nesane</h3>
                                <span>Chief Customer</span>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora eligendi accusamus
                                    exercitationem quasi unde dolores, commodi sapiente aut laborum ullam?
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- / customer_feedback_area  -->

    @include('front.includes.footer')
