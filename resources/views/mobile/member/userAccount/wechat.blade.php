<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .bg {
            background-color: #36b34b;
            width:auto;
            height: 500px;
            text-align: center;
        }

        #output {
            padding-top: 20px;
            padding-bottom: 20px;
            background-color: white;
            margin: 70px;
        }

        .btn {
            height: 40px;
            padding: 3px 18px;
            font-size: 13px;
            line-height: 1.2em;
            font-weight: 500;
            box-shadow: none !important;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: 0.2s all;
            text-decoration: none !important;
            border-radius: 6px;
            border-width: 2px;
        }

        
        .btn-info {
            background: #17A2B8 !important;
            border-color: #17A2B8 !important;
            color: #ffffff !important;
        }

        .btn-info:hover,
        .btn-info:focus,
        .btn-info:active,
        .btn-info.active {
            background: #0e8294 !important;
            border-color: #0e8294 !important;
        }

        .btn-info.disabled,
        .btn-info:disabled {
            background: #17A2B8;
            border-color: #17A2B8;
            opacity: 0.5;
        }


        
        .btn-danger {
            background: #FF5C63 !important;
            /* old :  #FF5C63 !important;*/
            border-color: #FF5C63 !important;
            color: #ffffff !important;
        }

        .btn-danger:hover,
        .btn-danger:focus,
        .btn-danger:active,
        .btn-danger.active {
            background: #ea2f1c !important;
            border-color: #ea2f1c !important;
        }

        .btn-danger.disabled,
        .btn-danger:disabled {
            background: #FF5C63;
            border-color: #FF5C63;
            opacity: 0.5;
        }
    </style>
</head>

<body>
    <div class="bg">
        <br>
        <a href=""
            title="White WeChat Pay Chinese Text Logo Icon">
            <img src="https://cdn.discordapp.com/attachments/420596865432551436/983686791276142683/1234.png" width="200px"/></a>

        <div id="output">

        </div>
        *ชำระเงินแล้วกรุณาอัพโหลดหลักฐานการชำระเงิน

       
    </div>
    <br>
    <div class="text-center" style="padding-left: 80px;">
       
    
            <a href="{{url('user/sendslip')}}" class="btn btn-info">แจ้งชำระเงิน</a>
            <a href="{{url('index')}}"class="btn btn-danger">กลับหน้าหลัก</a>

      
    </div>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.qrcode/1.0/jquery.qrcode.min.js"
        integrity="sha512-NFUcDlm4V+a2sjPX7gREIXgCSFja9cHtKPOL1zj6QhnE0vcY695MODehqkaGYTLyL2wxe/wtr4Z49SvqXq12UQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        jQuery(function () {
            jQuery('#output').qrcode({
                width: 180,
                height: 180,
                text: "{!! @$res !!}"
            });
        })
    </script>
</body>

</html>