@extends('merchant.layouts.master')
@section('css')
    <style>
        .swal2-container {
            z-index: 99999999999 !important;
        }

        .mytooltip .tooltip-item2 {
            color: #ff9d10;
        }

        .tooltip-content4 {
            background-color: #2b2b2b;
            color: white;
            border-bottom: 40px solid #ff9d10;
            margin: 0 0 10px -30px !important;
        }

        .swal2-cancel {
            margin-right: 30px;
        }

        @media only screen and (max-width: 480px) {
            .mytooltip .tooltip-content4 {
                margin: 0 0 10px -50px !important;
            }
        }

        .msg-span {
            color: #979696c7
        }





        .card-msg {
            width: 100%;
            height: 850px;
            background-color: #ffffff;
            border-radius: 10px;
            position: relative;

            justify-content: center;
        }


        .msg-h {
            width: 100%;
            background: linear-gradient(to right, #ff784f88, #ff53708a);
            ;
            border-radius: 10px 10px 0px 0px;

            box-shadow: 0px 11px 10px -18px rgb(0, 0, 0);



        }

        .msg-ft {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 100px;
            box-shadow: 0px -11px 10px -18px #111;
            background: linear-gradient(to right, #ff784f88, #ff53708a);
            border-radius: 0px 0px 10px 10px;
        }




        .msg-ft .input-msg:focus {
            border: none;
        }

        .input-msg {
            border-radius: 20px 0px 0px 20px;
            resize: none;
            border: none;

        }

        .input-msg::-webkit-scrollbar {
            display: none;

        }

        .msg-body {
            width: 100%;
            height: 650px;
            overflow: auto;

        }




        .msg-body::-webkit-scrollbar {
            display: none;
        }



        .sant-btn {
            color: #ffffff;
            height: 46px;
            border: none;
            border-radius: 0px 20px 20px 0px;
            background: #ff5370;


        }

        .sant-btn:hover {
            background: #ff784f96;
        }

        .name-u {
            color: #444444fd;
        }

        .container {

            position: relative;
            float: left;
            color: #fff;
            margin: 10px 0;
            width: 100%;


        }

        .Msg-P p {
            max-width: 65%;
            min-width: 11%;
            position: relative;
            float: left;
            border-radius: 20px;
            padding: 17px;
            border: 2px solid #ff5b69;
            background-color: #ff5b69;

        }

        .Msg-D p {
            max-width: 65%;
            min-width: 11%;
            position: relative;
            float: right;
            border-color: #2C3E50;
            background-color: #2C3E50;
            border-radius: 20px;
            padding: 17px;
            text-align: justify;

        }

        .img-P {
            max-width: 65%;
            min-width: 11%;
            position: relative;
            float: left;
            border-radius: 25px;
        }

        .img-D {
            max-width: 65%;
            min-width: 11%;
            position: relative;
            float: right;
            border-radius: 25px;
        }

        .video-P {
            max-width: 65%;
            min-width: 11%;
            position: relative;
            float: left;
            border-radius: 25px;
        }

        .video-D {
            max-width: 65%;
            min-width: 11%;
            position: relative;
            float: right;
            border-radius: 25px;
        }

        @media screen and (max-width: 1024px) {
            .card-msg {
                width: 100%;
                height: 750px;



            }

            .msg-body {

                height: 550px;

            }

            .msg-ft {
                width: 100%;
                height: 80px;


            }
        }

        @media screen and (max-width: 380px) {
            .card-msg {
                width: 100%;
                height: 650px;

            }

            .msg-body {

                height: 450px;

            }

            .msg-ft {
                width: 100%;
                height: 80px;


            }
        }



        .add-all {
            font-size: 1.5rem;
            color: #ff5b69;
            cursor: pointer;


        }


        .app-more-off {
            display: none;





        }

        .app-more input {
            display: none;
        }

        .app-more label i {
            cursor: pointer;
        }

        .X-add {
            transform: rotate(45deg);
            transition-duration: 350ms;


        }

        .preview {
            width: 100%;
            height: 100px;
            top: -100%;
            background-color: rgba(218, 218, 218, 0.356);
            position: absolute;
            color: rgb(71, 71, 71);
            display: none;





        }

        .preview i {
            top: 10px;
            right: 10px;
            font-size: 10px;
            display: none;
            position: absolute;
            cursor: pointer;



        }

        .preview img {
            width: 80px;
            height: 80px;
            border-radius: 10px;
            display: none;
        }

        #file-ip-2-preview {
            width: 80px;
            height: 80px;
            display: none;

        }




        #add_all {
            transition-duration: 350ms;

        }
    </style>
@endsection
@section('content')
    <div class="card-msg justify-content-center  p-0">
        <div class=" msg-h py-4 m-0   row align-items-end">
            <div class="breadcrumb-header d-flex align-items-center col">
                <div class="big-icon">
                    <img src="{{ asset('storage/app/merchant/' . $user->customer_img . '') }}" width="45px" height="45px"
                        class="rounded-circle mr-4 " alt="User-Profile-Image">

                </div>
                <div class="d-inline-block align-items-center name-u">
                    <h4>{{ $user->customer_name }} </h4>
                </div>
            </div>


        </div>
        <ul id="message-list" class="msg-body col-12   px-4">




        </ul>

        <form id="formMsg" method="POST" enctype="multipart/form-data" class="msg-ft p-0 justify-content-center">
            @csrf
            <div class="preview   align-items-center p-2" id="preview-box">
                <img id="file-ip-1-preview" />
                <video id="file-ip-2-preview"></video>
                <i id="removeImg" class="icofont icofont-ui-close  " onclick="removeImage()"></i>
            </div>
            <div class=" col-12 p-4 m-0 row  justify-content-end align-items-center ">
                <div class=" row m-0  p-0 text-center align-items-center add-all">
                    <i class="icofont icofont-ui-add mx-2 " id="add_all"></i>
                    <div class="app-more app-more-off " id="add_more">
                        <label for="inputImg" class="m-0 p-0"><i class="icofont icofont-image mx-2 add_more1"></i></label>
                        <input type="file" id="inputImg" name="file[]" onchange="showPreview(event);" />
                        {{-- <i class="icofont icofont-ui-clip mx-2 add_more2"></i>
                        <i class="icofont icofont icofont-cubes mx-2  add_more3"></i> --}}
                    </div>
                </div>
                <input type="hidden" name="idc" value="{{ $user->customer_id }}">
                <input type="hidden" name="ids" value="{{ Auth::guard('merchant')->user()->merchant_id }}">
                <textarea type="text" name="text"id="message" class="input-msg col" aria-label="Recipient's username"
                    aria-describedby="button-addon2"></textarea>

                <button onclick="send_message();" class="sant-btn btn btn-outline-secondary col-2" type="button"
                    id="button-addon2">Sand
                </button>
            </div>

        </form>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.2.js" integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4="
        crossorigin="anonymous"></script>
    <script>
        var addMore = document.querySelector("#add_more")
        var addAll = document.querySelector("#add_all")

        addAll.addEventListener('click', () => {
            addMore.classList.toggle("app-more-off");
            addAll.classList.toggle("X-add");


        });
        //Prview img and video
        var previewBox = document.getElementById("preview-box");
        var removeImg = document.getElementById("removeImg");
        var previewImg = document.getElementById("file-ip-1-preview");
        var previewVideo = document.getElementById("file-ip-2-preview");
        let inputImg = document.querySelector("#inputImg");

        function showPreview(event) {
            if (event.target.files.length > 0) {
                if (inputImg.value.split('.')[1] == 'mp4') {
                    const file = inputImg.files[0];
                    const objectUrl = URL.createObjectURL(file);
                    previewVideo.src = objectUrl;
                    previewVideo.play();
                    previewVideo.style.display = "block";

                } else {
                    var src = URL.createObjectURL(event.target.files[0]);
                    previewImg.src = src;
                    previewImg.style.display = "block";

                }


                removeImg.style.display = "block";
                previewBox.style.display = "block";

            }
        }

        function removeImage() {

            previewImg.src = '';
            previewVideo.src = '';
            inputImg.value = '';
            previewVideo.value = '';


            previewImg.style.display = "none";
            previewVideo.style.display = "none";
            removeImg.style.display = "none";
            previewBox.style.display = "none";

        }








        fetch_msg();

        // setInterval(() => {
        //     fetch_msg();
        // }, 2000);
        function send_message() {
            let myForm = document.getElementById('formMsg');
            let formData = new FormData(myForm);
            formData.append('name', 'true');

            let message = document.querySelector("#message");
            let inputImg = document.querySelector("#inputImg");

            $.ajax({
                url: '{{ url('merchant/send_message') }}',
                type: 'POST',
                data: formData,
                dataType: 'HTML',
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    console.log("success");

                    var json = JSON.parse(data);
                    $.each(json, function(index, value) {
                        $('#message-list').html(json["html"]);
                    });
                    message.value = '';
                    inputImg.value = '';
                    previewVideo.value = '';
                    previewImg.src = '';
                    previewVideo.src = '';

                    previewImg.style.display = "none";
                    previewVideo.style.display = "none";
                    removeImg.style.display = "none";
                    previewBox.style.display = "none";


                },
                error: function() {
                    console.log("Error");

                    message.value = '';
                    inputImg.value = '';
                    previewVideo.value = '';
                    previewImg.src = '';
                    previewVideo.src = '';

                    previewImg.style.display = "none";
                    previewVideo.style.display = "none";
                    removeImg.style.display = "none";
                    previewBox.style.display = "none";

                }
            });
        }



        function fetch_msg() {
            var idc = "{{ $user->customer_id }}";
            var ids = "{{ Auth::guard('merchant')->user()->merchant_id }}";
            $.ajax({
                url: '{{ url('merchant/fetch_msg') }}',
                type: 'GET',
                dataType: 'HTML',
                data: {
                    'customer_id': idc,
                    'store_id': ids



                },
                success: function(data) {
                    var json = JSON.parse(data);
                    $.each(json, function(index, value) {
                        $('#message-list').html(json["html"]);
                    });






                },
                error: function() {
                    console.log("Error");

                    message.value = '';

                }


            });
        }
    </script>
@endsection



@section('js')
    @include('flash-message')
    <script></script>
@endsection
