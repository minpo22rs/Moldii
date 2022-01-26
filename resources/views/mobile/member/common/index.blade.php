@extends('mobile.main_layout.main')

    @section('app_header')
    <div class="appHeader bg-danger text-light">
        <div class="left">
            <a href="javascript:;" class="headerButton" onclick = "window.location.replace('{{url('user/ThaiLotto/selectMethod')}}');">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">
            
        </div>
        <div class="right"></div>
        <!-- <div class="m-1 w-100">

            <div class = "row">
                <div class = "col-10">
                    <form class="search-form">
                        <div class="form-group searchbox mt-1 mb-0">
                            <input type="text" class="form-control" placeholder="Search...">
                            <i class="input-icon">
                                <ion-icon name="search-outline" role="img" class="md hydrated" aria-label="search outline"></ion-icon>
                            </i>
                        </div>
                    </form>
                </div>
                <div class = "col-2">
                    <ion-icon   name="funnel"  
                                class="md hydrated font-weight-bold bg-white text-danger rounded p-1 mt-1 mb-0 h5"  
                                
                                role="img" aria-label="search outline">
                    </ion-icon>
                </div>
            </div>
            
        </div> -->
    </div>
    @endsection

    @section('content')
        <div class = "m-1">
            <ul class="nav nav-tabs style1 mt-1" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#home" role="tab" aria-selected="false">
                        บทความ
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#profile" role="tab" aria-selected="true">
                        วิดีโอ
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#contact" role="tab">
                        Podcast
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#store" role="tab">
                        ร้านค้า
                    </a>
                </li>
            </ul>
            <div class="tab-content mt-2">
                <div class="tab-pane fade active show" id="home" role="tabpanel">
                    <!-- A : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate enim sed elit
                    consequat, sed ultricies ligula venenatis. In nec arcu eget neque sodales accumsan vel
                    et neque. -->
                    <div class = "" name = "story_videos_section" id = "story_videos_section">

                        <div class="carousel-multiple owl-carousel owl-theme owl-loaded owl-drag">
                        
                            <div class="owl-stage-outer">
                                <div class="owl-stage" style="transform: translate3d(-514px, 0px, 0px); transition: all 0.25s ease 0s; width: 1265px; padding-left: 32px; padding-right: 32px;">
                                    <div class="owl-item cloned" style="width: 155.5px; margin-right: 16px;">
                                        <div class="item">
                                            <img src="assets/img/sample/photo/2.jpg" alt="alt" class="imaged w-100">
                                        </div>
                                    </div>
                                    <div class="owl-item cloned" style="width: 155.5px; margin-right: 16px;">
                                        <div class="item">
                                            <img src="assets/img/sample/photo/3.jpg" alt="alt" class="imaged w-100">
                                        </div>
                                    </div>
                                    <div class="owl-item" style="width: 155.5px; margin-right: 16px;">
                                        <div class="item">
                                            <img src="assets/img/sample/photo/1.jpg" alt="alt" class="imaged w-100">
                                        </div>
                                    </div>
                                    <div class="owl-item active" style="width: 155.5px; margin-right: 16px;">
                                        <div class="item">
                                            <img src="assets/img/sample/photo/2.jpg" alt="alt" class="imaged w-100">
                                        </div>
                                    </div>
                                    <div class="owl-item active" style="width: 155.5px; margin-right: 16px;">
                                        <div class="item">
                                            <img src="assets/img/sample/photo/3.jpg" alt="alt" class="imaged w-100">
                                        </div>
                                    </div>
                                    <div class="owl-item cloned" style="width: 155.5px; margin-right: 16px;">
                                        <div class="item">
                                            <img src="assets/img/sample/photo/1.jpg" alt="alt" class="imaged w-100">
                                        </div>
                                    </div>
                                    <div class="owl-item cloned" style="width: 155.5px; margin-right: 16px;">
                                        <div class="item">
                                            <img src="assets/img/sample/photo/2.jpg" alt="alt" class="imaged w-100">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="owl-nav disabled">
                                <button type="button" role="presentation" class="owl-prev">
                                    <span aria-label="Previous">‹</span>
                                </button>
                                <button type="button" role="presentation" class="owl-next">
                                    <span aria-label="Next">›</span>
                                </button>
                            </div>
                            <div class="owl-dots disabled">

                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel">
                    <!-- B : Suspendisse maximus ligula eu ligula iaculis, eu bibendum odio dignissim. Pellentesque
                    elementum nisl elit, non feugiat risus luctus sit amet. -->
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel">
                  <!--   C : Vestibulum sed facilisis diam, vel sodales leo. Aenean lacinia, nisi sit amet iaculis
                    maximus, nibh orci iaculis risus, vitae faucibus dui orci quis elit. -->
                </div>
                <div class="tab-pane fade" id="store" role="tabpanel">
               <!--      D : Vestibulum sed facilisis diam, vel sodales leo. Aenean lacinia, nisi sit amet iaculis
                    maximus, nibh orci iaculis risus, vitae faucibus dui orci quis elit. -->
                </div>
            </div>
        </div>
    @endsection

    @section('custom_script')
        <script>
            var a = "{{Session::get('success')}}";
            if(a){
                alert(a);
            }
        </script>
    
        <script>
                bottom_now(1);
        </script>
    @endsection