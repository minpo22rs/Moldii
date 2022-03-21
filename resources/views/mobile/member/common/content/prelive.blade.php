{{-- @extends('mobile.main_layout.main')
    
    @section('content')   --}}          
        <div class="mt-1" name="story_videos_section" id="story_videos_section">

            <div class="carousel-multiple owl-carousel owl-theme">
                @for($i = 1; $i <= 9; $i++)
                    <div class="item test-1057 ">
                        <div class = "card">
                            <img src="{{ asset('new_assets/img/sample/photo/2.jpg')}}" alt="alt" class="imaged w-100" style=" height:180px;">
                            <div class="row col-12 item-1057">
                                <div class="name row align-self-end mb-1">
                                    <img src="{{ asset('new_assets/img/sample/photo/2.jpg')}}" alt="alt" class=" rounded-circle ml-1  " style="width: 30px; height:30px;">
                                    <h5 class="ml-1 align-self-center m-0">Story ที่ {{$i}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>

        </div>
    {{-- 
    @endsection
    --}}