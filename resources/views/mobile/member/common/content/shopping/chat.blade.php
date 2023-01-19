@extends('mobile.main_layout.main')
<!-- Bootstrap 4.6 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

<style>
    body {
        margin: 0 auto;
        max-width: 100%;

    }

    .msg-con {
        position: absolute;
        width: 100%;
        height: 100vh;
        display: grid;
        grid-template-columns: 1fr;
        grid-template-rows: 80px auto 156px;
        grid-template-areas:
            'msg-h'
            'msg-body'
            'msg-f';
    }

    .msg-h {
        width: 100%;
        grid-area: msg-h;
        background: linear-gradient(to right, #ff784f, #ff5370);
        padding: 1.2rem;
        align-items: center;






    }

    .msg-body {
        grid-area: msg-body;
        height: 650px;



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

    #formMsg {
        position: relative;
        grid-area: msg-f;
        background: linear-gradient(to right, #ff784f88, #ff53708a);
        width: 100%;
        /* bottom: 50;
        left: 0;
        right: 0; */
    }

    #formMsg .sant-btn {
        color: #ffffff;
        height: 46px;
        border: none;
        border-radius: 0px 20px 20px 0px;
        background: #ff5370;


    }

    #formMsg .sant-btn:hover {
        background: #ff784f96;
    }

    .input-msg:focus {
        border: none;
    }

    .input-msg {
        border-radius: 20px 0px 0px 20px;
        resize: none;
        border: none;
        height: 46px;


    }

    .input-msg::-webkit-scrollbar {
        display: none;

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

    .msg-h {
        background: linear-gradient(to right, #ff784f88, #ff53708a);
        box-shadow: 0px 11px 10px -18px rgb(0, 0, 0);

    }

    .preview {
        width: 100%;
        height: 100px;
        top: -100px;
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

    @media only screen and (min-device-width: 1023px) and (max-device-width: 1200px) {
        .msg-body {
            height: 600px;
            /* min-height: 650px; */


        }


    }
    @media only screen and (min-device-width: 769px) and (max-device-width: 1023px) {
        .msg-body {
            height: 930px;
            /* min-height: 650px; */


        }


    }

    @media only screen and (min-device-width: 480px) and (max-device-width: 768px) {
        .msg-body {

            height: 650px;

        }



    }

    @media only screen and (min-device-width: 376px) and (max-device-width: 480px) {
        .msg-body {

            height: 610px;

        }


    }
    @media only screen and (min-device-width: 300px) and (max-device-width: 375px) {
        .msg-body {

            height: 430px;

        }


    }
</style>
<!-- ###### content [ Start ]  ###### -->

<div class="col-12 p-0 ">
    <div class="msg-con">
        <div class="msg-h align-items-center">
            <h2 class="m-0"><span style="color:#DE3163;">Chat</span> Messages: &emsp;{{ $merchant->merchant_name }}
            </h2>

        </div>

        <ul id="message-list" style="overflow: auto ; width: 100%; " class="msg-body m-0  p-0">


        </ul>


        <form class=" p-0 m-0 justify-content-center formMsg " id="formMsg" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="preview   align-items-center p-1" id="preview-box">
                <img class="" id="file-ip-1-preview" />
                <video id="file-ip-2-preview"></video>

                <i id="removeImg" class="icofont icofont-ui-close  " onclick="removeImage()"></i>
            </div>
            <div class=" col-12 py-4 m-0 row  justify-content-end align-items-center ">
                <div class=" row m-0  p-0 text-center align-items-center add-all">
                    <i class="icofont icofont-ui-add mx-2 " id="add_all"></i>
                    <div class="app-more app-more-off " id="add_more">
                        <label for="inputImg" class="m-0 p-0"><i
                                class="icofont icofont-image mx-2 add_more1"></i></label>
                        <input type="file" id="inputImg" name="file[]" onchange="showPreview(event);" />
                        {{-- <i class="icofont icofont-ui-clip mx-2 add_more2"></i>
                        <i class="icofont icofont icofont-cubes mx-2  add_more3"></i> --}}
                    </div>
                </div>


                <input type="hidden" name="idc" value="{{ Session::get('cid') }}">
                <input type="hidden" name="ids" value="{{ $merchant->merchant_id }}">
                <textarea type="text" name="text"id="message" class="input-msg col" aria-label="Recipient's username"
                    aria-describedby="button-addon2"></textarea>
                <button onclick="send_message();" class="sant-btn btn btn-outline-secondary col-2" type="button"
                    id="button-addon2">Sand
                </button>
            </div>


        </form>
    </div>


</div> <!-- row -->
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
    //     }, 2000);

    function send_message() {
        let myForm = document.getElementById('formMsg');
        let formData = new FormData(myForm);
        formData.append('name', 'true');

        let message = document.querySelector("#message");
        let inputImg = document.querySelector("#inputImg");

        $.ajax({
            url: '{{ url('chatMsg/send_message') }}',
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
        var idc = "{{ Session::get('cid') }}";
        var ids = "{{ $merchant->merchant_id }}";
        $.ajax({
            url: '{{ url('chatMsg/fetch_message') }}',
            type: 'GET',
            dataType: 'HTML',
            data: {
                'customer_id': idc,
                'store_id': ids



            },
            success: function(data) {

                var json = JSON.parse(data);

                // console.log(json[0]['text']);

                // $('#message-list').html(json["html"]);
                // message.value = '';
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

<!-- ###### content [ End ] ###### -->

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
</script>
