{{-- @extends('mobile.main_layout.main')
    
    @section('content')   --}}          
        <div class="mt-1" name="story_videos_section" id="story_videos_section">

            <div class="carousel-multiple owl-carousel owl-theme">
                @foreach ($group as $groups)
                    <div class="item test-1057 ">
                        <div class = "card">
                            <img src="{{('https://testgit.sapapps.work/moldii/storage/app/group_cover/'.$groups->group_img.'')}}" alt="alt" class="imaged w-100" style=" height:180px;">
                            <div class="row col-12 item-1057">
                                <div class="name row align-self-end mb-1">
                                    
                                    <h5 class="ml-1 align-self-center m-0">{{$groups->name}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    {{-- 
    @endsection
    --}}