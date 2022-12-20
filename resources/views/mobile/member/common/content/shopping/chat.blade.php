@extends('mobile.main_layout.main')
<!-- Bootstrap 4.6 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

<style>
    body {
        margin: 0 auto;
        max-width: 100%;
        padding: 20px;
    }

    .container {
        min-width: 10%;
        position: relative;
        float: left;
        border: 2px solid #DE3163;
        background-color: #DE3163;
        color: #fff;
        border-radius: 30px;
        padding: 15px;
        margin: 10px 0;
        max-width: 70%;
    }

    .darker {
        min-width: 10%;
        position: relative;
        float: right;
        border-color: #2C3E50;
        background-color: #2C3E50;
        max-width: 70%;
        text-align: justify;
    }

    .container::after {
        content: "";
        clear: both;
        display: table;
    }

    .container img {
        float: left;
        max-width: 60px;
        width: 100%;
        margin-right: 20px;
        border-radius: 50%;
    }

    .container img.right {
        float: right;
        margin-left: 20px;
        margin-right: 0;
    }

    .time-right {
        float: right;
        color: #aaa;
    }

    .time-left {
        float: left;
        color: #999;
    }

    #parent4 {
        position: fixed;
        background-color: #212529;
        width: 100%;
        bottom: 50;
        left: 0;
        right: 0;
    }
</style>
<!-- ###### content [ Start ]  ###### -->

<div class="col-md-12 mt-4">
    <div class="row">
        <h2><span style="color:#DE3163;">Chat</span> Messages: </h2>

        <ul id="message-list" style="overflow: auto ; width: 100%; height: 550;" class="mt-3 p-0">
            {{--
            <li class="container ">
                <!-- <img src="#" alt="Avatar"> -->
                <!-- <h5>User : </h5> -->
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora ipsa error optio excepturi, est
                    aliquid.</p>
                <!-- <span class="time-right"  style="color:#fff;">11:00</span> -->
            </li>

            <li class="container darker">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit, similique.</p>
            </li>

            <li class="container">
                <p>Lorem ipsum dolor sit amet.</p>
            </li> --}}



            {{-- <li class="container darker">
                <p>Lorem ipsum dolor sit .</p>
            </li>

            <li class="container">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laboriosam voluptas maiores esse maxime
                    quod. Enim rem non omnis consectetur facere.</p>
            </li> --}}

            {{-- <li class="container darker">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore nesciunt architecto obcaecati, est
                    ea odio.</p>
            </li> --}}

        </ul> <!-- overflow -->

        <div class="input-group p-4 pb-5" id="parent4">
            <input type="text" id="message" class="form-control " name="">
            <div class="input-group-append">
                <button onclick="send_message()" class="send_chat btn btn-info" type="button">Send</button>
            </div>

        </div>
    </div>


</div> <!-- row -->
</div>
<script src="https://cdn.socket.io/4.5.4/socket.io.min.js"
    integrity="sha384-/KNQL8Nu5gCHLqwqfQjA689Hhoqgi2S84SNUxC3roTe4EhJ9AfLkp8QiQcU8AMzI" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.6.2.js" integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4="
    crossorigin="anonymous"></script>


<script>
    // $(function() {
    //             // let socket = io.connect("http://localhost:3005");

    //             // // let ip_address = '127.0.0.1';
    //             // // let socket_port = '3005';
    //             // // let socket = io(ip_address + ':' + socket_port);

    //             // let message = document.querySelector("#message");
    //             // let messageBtn = document.querySelector("#messageBtn");
    //             // let messageList = document.querySelector("#message-list");

    //             // messageBtn.addEventListener("click", (e) => {
    //             //     //การส่ง ข้อความ
    //             //     console.log(message.value);
    //             //     socket.emit("new_message", {
    //             //         message: message.value
    //             //     });
    //             //     message.value = "";
    //             // });

    //             // socket.on("receive_message", (data) => {
    //             //     //การส่ง Event (เมื่อ server มีการรับข้อความก็จะให้ทำอะไร)
    //             //     console.log(data,'testt');
    //             //     let listItem = document.createElement("li");
    //             //     listItem.textContent = data.message ;
    //             //     listItem.classList.add("container");
    //             //     listItem.classList.add("darker");
    //             //     listItem.classList.add("text-end");
    //             //     messageList.appendChild(listItem);
    //             // });
    //             // socket.on("receive_message_test", (data) => {
    //             //     //การส่ง Event (เมื่อ server มีการรับข้อความก็จะให้ทำอะไร)
    //             //     console.log(data,'testt');
    //             //     let listItem = document.createElement("li");
    //             //     listItem.textContent = data.message ;
    //             //     listItem.classList.add("container");

    //             //     listItem.classList.add("text-end");
    //             //     messageList.appendChild(listItem);
    //             // });
    //
    //         });


    function send_message() {
        let message = document.querySelector("#message")
        let messageList = document.querySelector("#message-list");



        $.ajax({
            url: '{{ url("/send_message")}}',
            type: 'GET',
            dataType: 'json',
            data: {
                'message': message.value,


            },
            success: function(data) {
                console.log("success");
                // var json = JSON.parse(data);

                // console.log(json['text']);
                // let listItem = document.createElement("li");
                // listItem.textContent = json['text'];
                // listItem.classList.add("container");
                // listItem.classList.add("darker");
                // listItem.classList.add("text-end");
                // messageList.appendChild(listItem);
                // message.value = "";
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

