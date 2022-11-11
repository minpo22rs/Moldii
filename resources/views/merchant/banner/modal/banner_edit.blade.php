
<div class="modal fade" id="modal-edit-banner" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">แก้ไขรูปภาพ</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('merchant/updatebanner')}}" method="POST" enctype="multipart/form-data" id="updatebanner" >
                @csrf
                <input type="hidden" name="id" value="{{$banner->id_banner_promote}}">
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">
                            <span class="mytooltip tooltip-effect-1">
                                <span class="tooltip-item2">หน้าปก <span class="text-danger">*</span></span>
                                <span class="tooltip-content4 clearfix">
                                    <span class="tooltip-text2">
                                        รูปภาพขนาด: 357 x 205 px.
                                    </span>
                                </span>
                            </span>
                        </label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-6">
                                    <input type="file" name="img" style="display: none;" id="addimg">
                                    <button type="button" class="btn btn-success btn-outline-success btn-round" onclick="document.getElementById('addimg').click();">
                                        <i class="icofont icofont-image"></i>เลือกรูปภาพ</button> 
                                </div>
                            </div>
                            <center><br><img  src="{{asset('storage/app/banner_store/'.$banner->banner_promote_img.'')}}" alt="" width ="80%"></center>


                        </div>
                    </div>
                    <div class="form-group row">

                        <label class="col-sm-2 col-form-label">ตำแหน่ง </label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-6 mt-2">
                                   {{$banner->index_of}}
                                      
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">ยกเลิก</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light" >ยืนยัน</button>
                </div>
            </form>
        </div>
    </div>
</div>
