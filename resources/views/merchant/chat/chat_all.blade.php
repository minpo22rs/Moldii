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
            color: rgb(185, 185, 185)
        }

        .msg-span_2 {
            color: #000000c7;
            font-weight: 800;

        }

        .status {
            width: 20px;
            height: 20px;
            border-radius: 100%;
            background-color: #4099ff;
        }


    </style>
@endsection
@section('content')
    <div class="card page-header p-0">
        <div class="card-block front-icon-breadcrumb row align-items-center">
            <div class="breadcrumb-header d-flex align-items-center  col">
                <div class="big-icon">
                    <i class="icofont icofont-ui-messaging"></i>
                </div>
                <div class="d-inline-block align-items-center msg-status_c">
                    <h5>Messages</h5>

                </div>

            </div>


        </div>
    </div>
    <div id="list-user-message">
    </div>
@endsection



@section('js')
    @include('flash-message')
    <script>
        user_msg();
        setInterval(() => {
            user_msg();
        }, 3000);
        let messageList = document.querySelector("#list-user-message");

        function user_msg() {

            var ids = "{{ Auth::guard('merchant')->user()->merchant_id }}";
            $.ajax({
                url: '{{ url('merchant/user_msg') }}',
                type: 'GET',
                dataType: 'HTML',
                data: {
                    'store_id': ids
                },
                success: function(data) {

                    var json = JSON.parse(data);
                    $.each(json, function(index, value) {
                        $('#list-user-message').html(json["html"]);
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
