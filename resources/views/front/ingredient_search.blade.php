@include('front.includes.header')
<!-- bradcam_area  -->
<div class="bradcam_area bradcam_bg_1">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3 style="color: yellow">Ingredient Search</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /bradcam_area  -->



<!-- recepie_area_start  -->
<div class="plus_padding" style="padding-top: 3%; padding-bottom: 3%;">
    <div class="container">
        <form method="POST" action="{{ route('front_ingredient_search_result') }}">
            <div class="row">
                @csrf
                @foreach ($data as $key => $value)
                    <div class="col-xl-2 col-lg-1 col-md-2">
                        <div class="single_recepie text-start">
                            <input type="checkbox" name="ing_select[]"  value="{{ $value->id }}"
                                id="ing_select{{ $key }}">
                            <label for="ing_select{{ $key }}" style="font-weight: bold;"> {{ $value->name }}</label>
                        </div>
                    </div>
                @endforeach
            </div>
            <div style="text-align: right;">
                <button type="submit" href="javascript:void(0);" class="line_btn">Search</button>
            </div>
        </form>
    </div>
</div>
<!-- /recepie_area_start  -->

@include('front.includes.latest_trend')

@include('front.includes.footer')
