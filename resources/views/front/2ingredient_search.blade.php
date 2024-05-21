@include('front.includes.header')
    <!-- bradcam_area  -->
    <div class="bradcam_area bradcam_bg_1">
      <div class="container">
        <div class="row">
          <div class="col-xl-12">
            <div class="bradcam_text text-center">
              <h3 style="color: rgb(255, 255, 255)">Recipe Details</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /bradcam_area  -->

    <div class="recepie_details_area">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-xl-6 col-md-6">
            <div class="recepies_thumb">
              <img src="{{Storage::url(config('filesystems.path.url.recipe'). $data->image)}}" alt="" />
            </div>
          </div>
          <div class="col-xl-6 col-md-6">
            <div class="recepies_info">
              <h3>{{$data->name}}</h3>
              <p>
                {{$data->description}}
              </p>

              <div class="resepies_details">
                <ul>
                  <li>
                    <p>
                      <strong>Type</strong> : {{ $data->type==0 ? 'Veg' : 'Non-Veg' }}
                    </p>
                  </li>
                  <li>
                    <p>
                      <strong>Level</strong> : {{ $data->level }}
                    </p>
                  </li>
                  <li>
                    <p>
                      <strong>Preparation Time</strong> : {{$data->preparation_time}}
                    </p>
                  </li>
                  <li>
                    <p><strong>Cooking Time</strong> : {{$data->cooking_time}}</p>
                  </li>
                  <li>
                    <p><strong>Serve</strong> : {{$data->serve}}</p>
                  </li>
                  <li>
                    <p><strong>Category</strong> : {{$data->category_names}}</p>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xl-12">
            <div class="recepies_text">
              <h2>Instruction</h2>
              <p>{!! $data->instruction !!}</p>
              <h2>Direction</h2>
              <p>{!! $data->direction !!}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- recepie_area_start  -->
    <div class="recepie_area inc_padding">
      <div class="container">
        <div class="row">
          @foreach ($cat_recipes as $key=>$value)
            <div class="col-xl-4 col-lg-4 col-md-6">
              <div class="single_recepie text-center">
                <div class="recepie_thumb">
                  <img src="{{Storage::url(config('filesystems.path.url.recipe'). $value->image)}}" alt="" />
                </div>
                <h3>{{$value->name}}</h3>
                <span>{{$value->category_names}}</span>
                <p>Time Needs: {{$value->cooking_time}}</p>
                <a href="{{route('front_recipe_detail',['id' => $value->id])}}" class="line_btn">View Full Recipe</a>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
    <!-- /recepie_area_start  -->
    @include('front.includes.footer')
