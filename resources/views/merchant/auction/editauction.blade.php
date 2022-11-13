<div class="modal fade" id="editmodal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">เเก้ไขรายละเอียดการประมูล</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                
                <form action="{{url('merchant/updateauction')}}" method="POST" >
                    @csrf
                 
                    <div class="modal-body">
                        
                      <input type="hidden" name="id" value="{{$id}}"> 
                      <input type="hidden" name="pid" value="{{$Auction->product_id}}"> 
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
                                <input type="time" class="form-control" id="timeto" name="time_finish" value="{{$Auction->time_finish}}" required>
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
                       
                            <label class="col-sm-2 col-form-label">ชื่อสินค้า <span class="text-danger">*</span></label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="name" value="{{$Auction->product_name}}"  required>
                            </div>
    
                            <label class="col-sm-2 col-form-label  text-right">หมวดหมู่สินค้า <span class="text-danger">*</span></label>
                            <div class="col-sm-3">
                                <select class="form-control" name="category_id">
                                    <option value="">เลือกหมวดหมู่สินค้า</option>
                                    @foreach($cat as $cats)
                                        <option value="{{$cats->cat_id}}" {{$cats->cat_id == $Auction->product_cat_id ?'selected':''}}>{{$cats->cat_name}}</option>
    
                                    @endforeach
                                </select>
                            </div>
                            
                        </div>
    
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">รายละเอียด <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-12">
                                        <textarea name="description" class="form-control" cols="30" rows="5" placeholder="รายละเอียดสินค้า เช่น สี วัสดุ ปีที่ผลิต แหล่งที่ผลิต ที่มาของสินค้า หรือรายละเอียดที่เกี่ยวข้องกับสินค้า..." required> {{$Auction->product_description}}</textarea>
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
                                        <input type="text" name="weight" class="form-control" placeholder="น้ำหนัก..." value="{{$Auction->weight}}"  required>
                                    </div>
                                    <div class="col-3">
                                        <input type="text" name="width" class="form-control" placeholder="ความกว้าง..." value="{{$Auction->width}}"  required>
                                    </div>
                                    <div class="col-3">  
                                        <input type="text" name="length" class="form-control" placeholder="ความยาว..." value="{{$Auction->length}}"  required>
                                    </div>
                                    <div class="col-3">
                                        <input type="text" name="height" class="form-control" placeholder="ความสูง..." value="{{$Auction->height}}"  required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">ยกเลิก</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light" >ยืนยัน</button>
                    </div>
                </form>
            
        </div>
    </div>
</div>

<script>
   
</script>