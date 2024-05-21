@include('front.includes.header')
<!-- bradcam_area  -->
<div class="bradcam_area bradcam_bg_1">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3 style="color: yellow">
                        Recipes
                    </h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /bradcam_area  -->



@if (route('front_search') == url()->current())
    <!-- recepie_area_start  -->
    <div class="recepie_area plus_padding">
        <div class="container">
            @if (count($data) > 0 )
                <div class="row  text-center">
                    @foreach ($data as $key => $value)
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
                                    Full Recipe</a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div style="text-align: right;">
                    {{ $data->links() }}
                </div>
            @else
                <h2 class="text-center">No result found</h2>
            @endif
        </div>
    </div>
    <!-- /recepie_area_start  -->
@elseif(route('front_ingredient_search') == url()->current() || route('front_categories_search') == url()->current() )
    <!-- recepie_area_start  -->
    <div class="recepie_area plus_padding">
        <div class="container">
            <div class="row">
                @foreach ($data as $value)
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single_recepie text-center">
                            <div class="recepie_thumb">
                                <img src="{{ Storage::url(config('filesystems.path.url.recipe') . $value['image']) }}"
                                    alt="" />
                                {{-- <img src="{{ asset('assets/front/img/recepie/samosa.jpg') }}" alt="" /> --}}
                            </div>
                            <h3>{{ $value['name'] }}</h3>
                            {{-- <span>{{ $value['category_names'] }}</span> --}}
                            <p>Time Needs: {{ $value['cooking_time'] }}</p>
                            <a href="{{ route('front_recipe_detail', ['id' => $value['id']]) }}" class="line_btn">View
                                Full Recipe</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div style="text-align: right;">
                {{-- {{ $data->links() }} --}}
            </div>
        </div>
    </div>
    <!-- /recepie_area_start  -->
@else
    <!-- recepie_area_start  -->
    <div class="recepie_area plus_padding">
        <div class="container">
            @if (count($data)>0)
                
            
                <div class="row">
                    @foreach ($data as $value)
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="single_recepie text-center">
                                <div class="recepie_thumb">
                                    <img src="{{ Storage::url(config('filesystems.path.url.recipe') . $value->image) }}"
                                        alt="" />
                                    {{-- <img src="{{ asset('assets/front/img/recepie/samosa.jpg') }}" alt="" /> --}}
                                </div>
                                <h3>{{ $value->name }}</h3>
                                <span>{{ $value->category_names }}</span>
                                <p>Time Needs: {{ $value->cooking_time }}</p>
                                <a href="{{ route('front_recipe_detail', ['id' => $value->id]) }}" class="line_btn">View
                                    Full Recipe</a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div style="text-align: right;">
                    {{ $data->links() }}
                </div>
            @else
                <h2 class="text-center">No Result Found!</h2>
            @endif
        </div>
    </div>
    <!-- /recepie_area_start  -->
@endif

@include('front.includes.latest_trend')

@include('front.includes.footer')
