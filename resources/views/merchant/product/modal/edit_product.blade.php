

<div class="modal fade" id="editmodal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">แก้ไขสินค้า</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('merchant/product', $product->product_id)}}" method="POST" enctype="multipart/form-data" id="edit_product">
                @csrf
                {{method_field('PUT')}}
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">รูปภาพหน้าปก <span class="text-danger">*</span>
                            {{-- <span class="mytooltip tooltip-effect-1">
                                <span class="tooltip-item2">Cover <span class="text-danger">*</span></span>
                                <span class="tooltip-content4 clearfix">
                                    <span class="tooltip-text2">
                                        รูปภาพขนาด: 357 x 357 px.
                                    </span>
                                </span>
                            </span> --}}
                        </label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-6">
                                    <input type="file" name="cover[]" style="display: none;" id="adddocument{{$product->product_id}}">
                                    <button type="button" class="btn btn-success btn-outline-success btn-round" onclick="document.getElementById('adddocument'+{{$product->product_id}}).click();">
                                        <i class="icofont icofont-image"></i>เพิ่มรูปภาพ</button> 
                                </div>
                                <div class="col-6">
                                    <img src="{{asset('storage/app/product_cover/'.$product->product_img.'')}}" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">ชื่อสินค้า <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" name="name" class="form-control" placeholder="ชื่อสินค้า..." value="{{$product->product_name}}">
                                </div>
                                <div class="col-6">
                                    <label class="col-form-label">( {{$product->product_code}} )</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">รายละเอียด</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-12">
                                    <textarea name="description" class="form-control" cols="30" rows="10" placeholder="รายละเอียด...">{{$product->product_description}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">หมวดหมู่สินค้า <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-6">
                                    <select class="form-control" name="category_id" required>
                                        @foreach($category as $cats)
                                            <option value="{{$cats->cat_id}}" {{$product->product_cat_id==$cats->cat_id?'selected':''}}>{{$cats->cat_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">ขนาดสินค้า <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-3">
                                    <label class="col-form-label" >น้ำหนัก (กรัม)</label>
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
                                    <input type="text" name="weight" class="form-control" placeholder="น้ำหนัก..." value="{{$product->weight}}">
                                </div>
                                <div class="col-3">
                                    <input type="text" name="width" class="form-control" placeholder="ความกว้าง..." value="{{$product->width}}">
                                </div>
                                <div class="col-3">
                                    <input type="text" name="length" class="form-control" placeholder="ความยาว..." value="{{$product->length}}">
                                </div>
                                <div class="col-3">
                                    <input type="text" name="height" class="form-control" placeholder="ความสูง..." value="{{$product->height}}">
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="form-group row">
                        <label class="col-sm-2 col-form-label">ตัวเลือกเพิ่มเติม</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-12">
                                    <div class="input-group input-group-button">
                                        <input type="text" class="form-control" placeholder="ตัวเลือกเพิ่มเติม..." id="edit_option">
                                        <span class="input-group-addon btn btn-primary" id="edit_addoption">
                                            <span class="">เพิ่ม</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-control">
                                        @foreach ($product->Product_hasM_Options as $item)
                                        <label class="label label-primary label-lg" id="oldoption_{{$item->option_id}}">{{$item->option_name}} 
                                            <i class="icofont icofont-close pointer" onclick="del_oldoption({{$item->option_id}})"></i>
                                        </label>
                                        @endforeach

                                        <div id="edit_resultappend_option"></div>
                                        <div id="edit_resultinput_option"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">จำนวนสินค้า <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-12">
                                    <input type="number" name="amount" class="form-control" placeholder="จำนวนสินค้า..." value="{{$product->product_amount}}" >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">ราคาสินค้า <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-4">
                                    <label class="col-sm-2 col-form-label" style="color: #2ed8b6;">ราคา</label>
                                </div>
                                {{-- <div class="col-4">
                                    <label class="col-sm-2 col-form-label" style="color: #FF5370;">คะแนน</label>
                                </div> --}}
                                <div class="col-4">
                                    <label class="col-form-label" style="color: #FFB64D;">ราคาที่ลดแล้ว</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-4">
                                    <input type="number" name="price" class="form-control form-control-success"  value="{{$product->product_price}}" >
                                </div>
                                {{-- <div class="col-4">
                                    <input type="number" name="gpoint" class="form-control form-control-danger" value="{{$product->product_gpoint}}" >
                                </div> --}}
                                <div class="col-4">
                                    <input type="number" name="discount" class="form-control form-control-warning" placeholder="(optional)..." value="{{$product->product_discount}}" >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label mt-2">
                            บริการขนส่ง<span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <div class="row">
                                @foreach($sp as $sps)
                                    <div class="col-5 form-inline">
                                        <input type="checkbox" name="ship[]" value="{{$sps->id_shipping_company}}" checked><br><p class="mt-3 ml-1">{{$sps->name_company}}</p>

                                    </div>
                                @endforeach
                                @foreach($s as $ss)
                                    <div class="col-5 form-inline">
                                        <input type="checkbox" name="ship[]" value="{{$ss->id_shipping_company}}"><br><p class="mt-3 ml-1">{{$ss->name_company}}</p>

                                    </div>
                                @endforeach
                               
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">แท็ก</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-12">
                                    <div class="input-group input-group-button">
                                        <input type="text" class="form-control" placeholder="แท็ก..." id="edit_tag">
                                        <span class="input-group-addon btn btn-primary" id="edit_addtags">
                                            <span class="">เพิ่ม</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-control">
                                        @foreach ($product->ProductgetTags('P') as $item)
                                        <label class="label label-primary label-lg" id="oldtag_{{$item->tag_id}}">{{$item->tag_name}} 
                                            <i class="icofont icofont-close pointer" onclick="del_oldtag({{$item->tag_id}})"></i>
                                        </label>
                                        @endforeach
                                        
                                        <div id="edit_resultappend"></div>
                                        <div id="edit_resultinput_tag"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">อัลบั้มรูปภาพ<span class="text-danger">*</span></label>
                        <div class="col-sm-7">
                            <div class="row">
                                @if(!empty($img))
                                    @foreach($img as $key => $picture)
                                    <div id="gal{{$picture->product_img_id }}">
                                        <div class="form-group">
                                            <div class="col-sm-7">
                                                <input type="file" style="display: none;" name="sub_gallery[{{$picture->product_img_id}}]" class="form-control" id="slidepicture{{$picture->product_img_id}}" onchange="readGalleryURL2(this,{{$picture->product_img_id}})">
                                                <img id="gallerypreview{{$picture->product_img_id}}" style="max-height:250px ;;width:100%" src="{{asset('storage/app/product_img/'.$picture->img_name)}}" />
                                                <button  type="button" class="btn btn-danger" onclick="deletegallery({{$picture->product_img_id}})" style="position: absolute; top: 0px;"><i class="icofont icofont-trash"></i></button>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    @endforeach
                                @endif
                            </div>
                            <div id="delete"></div>
                            <div id="newgallery" class="row"></div>
                            <button type="button" class="btn btn-primary" onclick="addimagegallery()">เพิ่มรูปภาพ</button>
                            <br>
                        </div>                
                    </div>


                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">ปิด</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light" form="edit_product">ยืนยัน</button>
            </div>
        </div>
    </div>
</div>

<script>
    var edit_count_tag = 1;
    $('#edit_addtags').click(function () { 
        var edit_tagname = $('#edit_tag').val();
        if (edit_tagname != '') {
            $("#edit_resultappend").append('<label class="label label-primary label-lg" id="edit_tag_'+edit_count_tag+'" data-numtag="'+edit_count_tag+'">'+
            ''+edit_tagname+' <i class="icofont icofont-close pointer" onclick="edit_del_tag('+edit_count_tag+')"></i></label>'+
            '<input type="hidden" name="edit_tag[]" id="edit_inputtag_'+edit_count_tag+'" value="'+edit_tagname+'">')
            edit_count_tag++;
        }
    });

    function edit_del_tag(edit_tag_num) {
        $('#edit_tag_'+edit_tag_num).fadeOut();
        $('#edit_inputtag_'+edit_tag_num).remove();
    }

    function del_oldtag(id) {
        $.ajax({
            url: '{{ url('backoffice/deleteoldtags') }}/' + id,
            type: 'POST',
            data: {id: id},
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        }).done(function (data) {
            $('#oldtag_'+id).fadeOut();
        });
    }

    count = 0;
    gallery = count + 1000;

    function addimagegallery(){

        gallery++;

        newimage =  '<div id="gal'+gallery+'">'+
            '<div class="form-group">'+
                '<div class="col-sm-12">'+
                    '<input type="file" style="display: none;"  name="sub_gallery['+(gallery).toString()+']" class="form-control chooseImage'+gallery+'" id="slidepicture'+gallery+'" multiple="multiple" onchange="readGalleryURL2(this,'+gallery+')">'+
                    '<img id="gallerypreview'+gallery+'" style="max-height:250px ;" src="{{asset('images/brows.png')}}" onclick="browsImage('+gallery+')" />'+
                    '<button  type="button" class="btn btn-danger" onclick="deletegallery('+gallery+')" style="position: absolute; top: 0px;"><i class="icofont icofont-trash"></i></button>'+
                '</div>'+
            '</div>'+
        '</div>';
        $('#newgallery').append(newimage);
    }

    function browsImage(id){
        $('.chooseImage'+id).click();
    }

    function deletegallery(num){

        $('#gal'+num).remove();
        //gallery--;
        $('#delete').append('<input type="hidden" name="deletedkey[]" value="'+num+'">');

    }
    
    function readGalleryURL2(input,id) {
        if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#gallerypreview'+id).attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
        }
    }
</script>

