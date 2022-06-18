@extends('backend.layouts.master')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('/files/assets/pages/message/message.css')}}">
<style>
    .messages-content {
        border-right: none;
        border-left: 1px solid #ccc;
    }
    .media {
        /* border-bottom: 1px solid #ccc; */
        margin-bottom: 15px;
    }
    .user_contact:hover {
        background: #d6d6d6;
        cursor: pointer;
    }
</style>
@endsection
@section('content')
<div class="card page-header p-0">
    <div class="card-block front-icon-breadcrumb row align-items-end">
        <div class="breadcrumb-header col">
            <div class="big-icon">
                <i class="icofont icofont-support"></i>
            </div>
            <div class="d-inline-block">
                <h5>ติดต่อฝ่ายสนับสนุน</h5>
                <span>Status: <label class="label label-primary">Admin Level 1</label></span>
            </div>
        </div>
        <div class="col">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item"><a href="">ติดต่อฝ่ายสนับสนุน</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header bg-primary">
        <div class="media">
            <a class="media-left" href="#">
                <img class="media-object img-radius msg-img-h" src="{{asset('storage/app/profile/'.Auth::user()->admin_img.'')}}" alt="">
            </a>
            <div class="media-body">
                <div class="txt-white">เข้าสู่ระบบในฐานะ</div>
                <div class="f-13 txt-white">{{ Auth::user()->admin_name }} {{ Auth::user()->admin_lname }}</div>
            </div>
        </div>
    </div>
    <div class="card-block">
        <div class="row">
            <div class="col-lg-3 col-md-4 message-left">
                <div class="card-block user-box contact-box assign-user">
                    <div class="media user_contact">
                        <div class="media-left media-middle photo-table">
                            <a href="#">
                                <label class="label label-primary">การส่งสินค้า</label>
                            </a>
                        </div>
                        <div class="media-body">
                            <h6>Josephin Doe</h6>
                            <p>Lorem ipsum dolor sit amet..</p>
                        </div>
                    </div>
                    <div class="media user_contact">
                        <div class="media-left media-middle photo-table">
                            <a href="#">
                                <label class="label label-warning">เรียกร้อง</label>
                            </a>
                        </div>
                        <div class="media-body">
                            <h6>Josephin Doe</h6>
                            <p>Lorem ipsum dolor sit amet..</p>
                        </div>
                    </div>
                    <div class="media user_contact">
                        <div class="media-left media-middle photo-table">
                            <a href="#">
                                <label class="label label-danger">การชำระ</label>
                            </a>
                        </div>
                        <div class="media-body">
                            <h6>Josephin Doe</h6>
                            <p>Lorem ipsum dolor sit amet..</p>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left media-middle photo-table">
                            <a href="#">
                                <img class="media-object img-radius" src="../files/assets/images/avatar-2.jpg" alt="Generic placeholder image">
                            </a>
                        </div>
                        <div class="media-body">
                            <h6>Josephin Doe</h6>
                            <p>Lorem ipsum dolor sit amet..</p>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left media-middle photo-table">
                            <a href="#">
                                <img class="media-object img-radius" src="../files/assets/images/avatar-1.jpg" alt="Generic placeholder image">
                            </a>
                        </div>
                        <div class="media-body">
                            <h6>Josephin Doe</h6>
                            <p>Lorem ipsum dolor sit amet..</p>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left media-middle photo-table">
                            <a href="#">
                                <img class="media-object img-radius" src="../files/assets/images/avatar-2.jpg" alt="Generic placeholder image">
                            </a>
                        </div>
                        <div class="media-body">
                            <h6>Josephin Doe</h6>
                            <p>Lorem ipsum dolor sit amet..</p>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left media-middle photo-table">
                            <a href="#">
                                <img class="media-object img-radius" src="../files/assets/images/avatar-3.jpg" alt="Generic placeholder image">
                            </a>
                        </div>
                        <div class="media-body">
                            <h6>Josephin Doe</h6>
                            <p>Lorem ipsum dolor sit amet..</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-12 messages-content ">
                <div>
                    <div class="media">
                        <div class="media-left friend-box">
                            <a href="#">
                                <img class="media-object img-radius" src="../files/assets/images/avatar-1.jpg" alt="">
                            </a>
                        </div>
                        <div class="media-body">
                            <p class="msg-send">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
                                took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially
                                unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus
                                PageMaker including versions of Lorem Ipsum.</p>
                            <p><i class="icofont icofont-wall-clock f-12"></i> October 12, 2015 at 9:00 pm</p>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-body text-right">
                            <p class="msg-reply bg-primary">Aldus PageMaker including versions of Lorem Ipsum.</p>
                            <p class="msg-reply bg-primary">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
                                took a galley.</p>
                            <p><i class="icofont icofont-wall-clock f-12"></i> October 12, 2015 at 9:01 pm</p>
                        </div>
                        <div class="media-right friend-box">
                            <a href="#">
                                <img class="media-object img-radius" src="../files/assets/images/avatar-2.jpg" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left friend-box">
                            <a href="#">
                                <img class="media-object img-radius" src="../files/assets/images/avatar-1.jpg" alt="">
                            </a>
                        </div>
                        <div class="media-body">
                            <p class="msg-send">Aldus PageMaker including versions of Lorem Ipsum.</p>
                            <p class="msg-send">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
                                took a galley.</p>
                            <p><i class="icofont icofont-wall-clock f-12"></i> October 12, 2015 at 9:15 pm</p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="messages-send">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" id="alighaddon2" class="form-control new-msg" placeholder="What’s on your mind.........." aria-describedby="basic-addon2">
                            <span class="input-group-addon bg-white" id="basic-addon2"><i class="icofont icofont-paper-plane f-18 text-primary"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
@include('flash-message')
<script  src="{{asset('/files/assets/pages/message/message.js')}}"></script>
@endsection
