     
        <div class="mt-1" name="story_videos_section" id="story_videos_section">

                @if($group->count() <2)
                    <div class="col-12 row m-0 justify-content-left ">
                            <a href="{{url('groupid/'.$group[0]->id.'')}}" style="width: 50%;">
                                <div class="card m-2 ">
                                    <img class="imaged w-100 card-image-top mt-1" src="{{('https://testgit.sapapps.work/moldii/storage/app/group_cover/'.$group[0]->group_img.'')}}" alt="alt" style=" height:120px;">
                                    <div class="card-body col-12 p-1 ">
                                        <div class="row pl-1">
                                            <h5 class="align-self-center m-0">{{$group[0]->name}}</h5>
                                        </div>
                                        
                                    </div>
                                </div>
                            </a>
          
                    </div>
                    
                @else
                    <div class="carousel-multiple owl-carousel owl-theme">

                        @foreach ($group as $groups)
                                <a href="{{url('groupid/'.$groups->id.'')}}">
                                    <div class="item test-1057 ">
                                        <div class = "card">
                                            <img src="{{('https://testgit.sapapps.work/moldii/storage/app/group_cover/'.$groups->group_img.'')}}" alt="alt" class="imaged w-100" style=" height:120px;">
                                            <div class="row col-12 item-1057">
                                                <div class="name row align-self-end mb-1">
                                                    
                                                    <h5 class="ml-1 align-self-center m-0">{{$groups->name}}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>


                        @endforeach
                    </div>
                @endif

        </div>
