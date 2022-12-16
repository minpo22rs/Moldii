<div class="modal fade" id="detailauction" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">รายละเอียดการประมูล</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
           
                <div class="modal-body">
                    @if($auction->finish ==1)
                    <div class="form-group row text-danger">
                        <label class="col-sm-2 col-form-label">สถานะ </label>


                        <label class="col-sm-3 col-form-label">สิ้นสุดการประมูลแล้ว </label>


                        <label class="col-sm-2 col-form-label text-right">ผู้ชนะ </label>
                        <label class="col-sm-3 col-form-label">{{$user->customer_name}} {{$user->customer_lname}} </label>

                        
                        <br>
                        <br>
                    </div>
                    @endif
                    
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">วันที่ <span class="text-danger">*</span></label>
                        <div class="col-sm-3">
                            <input type="date" class="form-control" id="datefrom" name="date_start" min="{{date("Y-m-d")}}" value="{{$auction->date_start}}" readonly>
                        </div>
                        <label class="col-sm-2 col-form-label text-right">ราคาเริ่มต้น <span class="text-danger">*</span></label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control" name="price" value="{{$auction->price}}" readonly>
                        </div>
                        
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">เวลาเริ่มต้น <span class="text-danger">*</span></label>
                        <div class="col-sm-3">
                            <input type="time" class="form-control" id="timefrom" name="time_start" min="{{date("H:i")}}"  value="{{$auction->time_start}}" readonly>
                        </div>
                        <label class="col-sm-2 col-form-label text-right">สิ้นสุด <span class="text-danger">*</span></label>
                        <div class="col-sm-3">
                            <input type="time" class="form-control" id="timeto" name="time_finish" value="{{$auction->time_finish}}" readonly>
                        </div>
                    </div>


                    <div class="form-group row">
                       
                        <label class="col-sm-2 col-form-label">ชื่อสินค้า <span class="text-danger">*</span></label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="name" value="{{$auction->product_name}}"  readonly>
                        </div>

                        <label class="col-sm-2 col-form-label  text-right">หมวดหมู่สินค้า <span class="text-danger">*</span></label>
                        <div class="col-sm-3">
                            <select class="form-control" name="category_id">
                                <option value="">เลือกหมวดหมู่สินค้า</option>
                                @foreach($cat as $cats)
                                    <option value="{{$cats->cat_id}}" {{$cats->cat_id == $auction->product_cat_id ?'selected':''}}>{{$cats->cat_name}}</option>

                                @endforeach
                            </select>
                        </div>
                        
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">รายละเอียด <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-12">
                                    <textarea name="description" class="form-control" cols="30" rows="5" placeholder="รายละเอียดสินค้า เช่น สี วัสดุ ปีที่ผลิต แหล่งที่ผลิต ที่มาของสินค้า หรือรายละเอียดที่เกี่ยวข้องกับสินค้า..." readonly> {{$auction->product_description}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">ขนาดสินค้า <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-3">
                                    <label class="col-form-label" >น้ำหนักหนัก (กรัม)</label>
                                </div>
                                <div class="col-3">
                                    <label class="col-form-label" >ความกว้าง(เซนติเมตร)</label>
                                </div>
                                <div class="col-3">
                                    <label class="col-form-label" >ความยาว (เซนติเมตร)</label>
                                </div>
                                <div class="col-3">
                                    <label class="col-form-label" >ความสูง (เซนติเมตร)</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-3">
                                    <input type="text" name="weight" class="form-control" placeholder="น้ำหนัก..." value="{{$auction->weight}}"  readonly>
                                </div>
                                <div class="col-3">
                                    <input type="text" name="width" class="form-control" placeholder="ความกว้าง..." value="{{$auction->width}}"  readonly>
                                </div>
                                <div class="col-3">  
                                    <input type="text" name="length" class="form-control" placeholder="ความยาว..." value="{{$auction->length}}"  readonly>
                                </div>
                                <div class="col-3">
                                    <input type="text" name="height" class="form-control" placeholder="ความสูง..." value="{{$auction->height}}"  readonly>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">รูปภาพสินค้า</label>
                        <div class="col-sm-3">
                            <img src="{{asset('storage/app/product_cover/'.$auction->product_img)}}" width="100%"/> <br>
                            @foreach($img as $imgs)

                                <img src="{{asset('storage/app/product_img/'.$imgs->img_name)}}" width="100%"/> <br>
                            @endforeach
                        </div>                
                    </div>

                    
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">ยกเลิก</button>
                </div>
            
            
        </div>
    </div>
</div>