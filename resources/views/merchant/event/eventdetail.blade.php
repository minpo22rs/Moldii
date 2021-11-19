@extends('merchant.layouts.master')
@section('css')
<style>
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        padding: 0px 30px 0px 20px;
        line-height: 26px;
        /* color: #fff; */
        background-color: #fff;
    }
</style>
@endsection
@section('content')
<div class="card page-header p-0">
    <div class="card-block front-icon-breadcrumb row align-items-end">
        <div class="breadcrumb-header col">
            <div class="big-icon">
                <i class="icofont icofont-flash"></i>
            </div>
            <div class="d-inline-block">
                <h5>Flash Sale</h5>
                <span>Status: <label class="label label-primary">Merchant</label></span>
            </div>
        </div>
        <div class="col">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item"><a href="">Flash Sale</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-block">
        <form action="{{url('merchant/event_selectproduct', $fs->fs_id)}}" method="POST" id="event_selectproduct">
            @csrf
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">
                    <h6>Date & Time</h6>
                    <br>
                    <select name="date" class="form-control time" id="date">
                        @for ($i = $fs->fs_datestart; $i <= $fs->fs_dateend; $i++)
                        <option value="{{$i}}">{{date('d/m/Y', strtotime($i))}}</option>
                        @endfor
                    </select>
                    <br>
                    <select name="time" class="form-control form-control-warning time" id="time">
                        <option value="1" selected>00:00</option>
                        <option value="2">12:00</option>
                        <option value="3">18:00</option>
                        <option value="4">21:00</option>
                    </select>
                    <input type="hidden" id="phase" value="1">
                </label>
                <div class="col-sm-10">
                    <div id="result">
                        @foreach ($eventselect as $key => $item_event)
                        <input type="hidden" name="event_id[{{ $item_event->event_sp_id }}]" value="{{ $item_event->event_sp_id }}">
                        <div class="form-group row m-t-10">
                        <div class="col-6">
                            <select class="form-control" name="product[{{ $item_event->event_sp_id }}]" id="product_{{$key}}">
                                <option disabled>Select Product</option>
                                @foreach ($product as $item)
                                <option value="{{$item->product_id}}" {{ $item_event->event_sp_product_id == $item->product_id ? "selected" : "" }}>{{$item->product_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6">
                            <input type="number" name="discount[{{ $item_event->event_sp_id }}]" id="discount_{{$key}}" class="form-control" value="{{ $item_event->event_sp_value }}" placeholder="Maximun Sale = {{$fs->fs_maximum_sale}}%" max="{{$fs->fs_maximum_sale}}" min="0">
                        </div>
                        </div>
                        @endforeach
                        @if ($eventselect->count() < 3)
                        @for ($i = $eventselect->count(); $i < 3; $i++)
                        <div class="form-group row m-t-10">
                            <div class="col-6">
                                <select class="form-control" name="new_product[]" id="new_product_{{$i}}">
                                    <option selected disabled>Select Product</option>
                                    @foreach ($product as $item)
                                    <option value="{{$item->product_id}}">{{$item->product_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6">
                                <input type="number" name="new_discount[]" class="form-control" placeholder="Maximun Sale = {{$fs->fs_maximum_sale}}%" max="{{$fs->fs_maximum_sale}}" min="0">
                            </div>
                        </div>
                        @endfor
                        @endif
                    </div>
                </div>
            </div>
        </form>
        <div class="card-footer text-right">
            <button type="submit" class="btn btn-primary" form="event_selectproduct">Submit</button>
        </div>
    </div>
</div>
@endsection
@section('js')
@include('flash-message')
<script>
    $(document).on('change', '.time', function () {
        var date = $('#date').val();
        var time = $('#time').val();
        $.ajax({
            type: "GET",
            url: '{{ url('merchant/selectphase', $fs->fs_id) }}',
            data: {
                time: time,
                date: date
            },
            dataType: "JSON",
            success: function (response) {
                $('#result').html(response.html);
            }
        });
        $('#phase').val(time);
    });
</script>
@endsection
