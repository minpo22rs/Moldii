
<div class="modal fade" id="detailauction" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">รายละเอียดการประมูล</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('admin/addauction')}}" method="POST"  id="addnews">
                @csrf
                <div class="modal-body">
                    
                  
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">วันที่</label>
                        <div class="col-sm-3">
                            <input type="date" class="form-control" id="datefrom" name="date_start" min="{{date("Y-m-d")}}" value="{{$Auction->date_start}}" required>
                        </div>
                       
                        
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">เวลาเริ่มต้น</label>
                        <div class="col-sm-3">
                            <input type="time" class="form-control" id="timefrom" name="time_start" min="{{date("H:i")}}" value="{{$Auction->time_start}}" required>
                        </div>
                        <label class="col-sm-2 col-form-label text-right">สิ้นสุด</label>
                        <div class="col-sm-3">
                            <input type="time" class="form-control" id="timeto" name="time_finish"   value="{{$Auction->time_finish}}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                       
                        <label class="col-sm-2 col-form-label">ราคาเริ่มต้น</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control" name="price" value="{{$Auction->price}}" required>
                        </div>

                        <label class="col-sm-2 col-form-label  text-right">บิทครั้งละ</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control" name="bit" value="{{$Auction->bit}}" required>
                        </div>
                        
                    </div>
                    

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">รายการสินค้าที่เข้าร่วม</label>
                        
                    </div>

                    <div class="form-group row">
                        {{-- <label class="col-sm-3 col-form-label">รายการสินค้า</label> --}}
                        @foreach($ad as $ads)
                            <div class="col-sm-3 form-inline">
                                <input type="checkbox" class="form-control" name="epid[]" value="{{$ads->product_id}}" style="margin-right: 5px;margin-top;5px" checked>  {{$ads->product_name}}
                            </div>
                        @endforeach
                        {{-- @foreach($product as $products)
                                <div class="col-sm-3 form-inline">
                                    <input type="checkbox" class="form-control" name="pid[]" value="{{$products->product_id}}" style="margin-right: 5px;margin-top;5px">  {{$products->product_name}}
                                </div>
                        @endforeach --}}
                    </div>

                    
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">ยกเลิก</button>
            </div>
        </div>
    </div>
</div>