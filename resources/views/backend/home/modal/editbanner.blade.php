<div class="modal fade" id="editmodal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Banner</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('admin/updatebanner', $banner->banner_id)}}" method="POST" enctype="multipart/form-data" id="edit_banner">
                @csrf
                {{method_field('PUT')}}
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">
                            <span class="mytooltip tooltip-effect-1">
                                <span class="tooltip-item2">Banner <span class="text-danger">*</span></span>
                                <span class="tooltip-content4 clearfix">
                                    <span class="tooltip-text2">
                                        Image Size: 357 x 205 px.
                                    </span>
                                </span>
                            </span>
                        </label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-6">
                                    <input type="file" name="editbanner[]" style="display: none;" id="editdocument">
                                    <button type="button" class="btn btn-success btn-outline-success btn-round" onclick="document.getElementById('editdocument').click();">
                                        <i class="icofont icofont-image"></i> Change Banner</button> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">

                        <label class="col-sm-2 col-form-label"> Type  </label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-6">
                                    <select class="form-control col-sm-12" name="bannertype">
                                        <option value="1">Please Select</option>
                                        <option value="1" {{$banner->banner_type==1?'selected':''}}>Index</option>
                                        <option value="2" {{$banner->banner_type==2?'selected':''}}>Store</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light" form="edit_banner">Submit</button>
            </div>
        </div>
    </div>
</div>