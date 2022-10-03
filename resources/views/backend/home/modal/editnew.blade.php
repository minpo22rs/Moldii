<div class="modal fade" id="editmodal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">เเก้ไขเนื่อหา</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('admin/news', $new->new_id)}}" method="POST" enctype="multipart/form-data" id="edit_new">
                @csrf
                {{method_field('PUT')}}
                <div class="modal-body">
                    @if ($new->new_type == 'C')
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">
                            <span class="mytooltip tooltip-effect-1">
                                <span class="tooltip-item2">รูปภาพ <span class="text-danger">*</span></span>
                                <span class="tooltip-content4 clearfix">
                                    <span class="tooltip-text2">
                                        รูปภาพขนาด: 375 x 197 px.
                                    </span>
                                </span>
                            </span>
                        </label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-6">
                                    <input type="file" name="editnew[]" style="display: none;" id="editdocument{{$new->new_id}}">
                                    <button type="button" class="btn btn-success btn-outline-success btn-round" onclick="document.getElementById('editdocument{{$new->new_id}}').click();">
                                        <i class="icofont icofont-image"></i> เปลี่ยนรูปภาพ</button> 
                                </div>
                                <div class="col-6">
                                    <img class="img-fluid" src="{{asset('storage/app/news/'.$new->new_img.'')}}" alt="" width="712" height="390">
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">
                            <span class="mytooltip tooltip-effect-1">
                                <span class="tooltip-item2">ลิงค์ </span>
                                {{-- <span class="tooltip-content4 clearfix">
                                    <span class="tooltip-text2">
                                        รูปภาพขนาด: 375 x 197 px.
                                    </span>
                                </span> --}}
                            </span>
                        </label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" name="link" class="form-control" placeholder="ลิงค์..." value="{{$new->new_img}}">
                                </div>
                                <div class="col-6">
                                    <iframe class="img-fluid" src="https://www.youtube.com/embed/{{$new->new_img}}"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif 
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">หัวข้อ</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="หัวข้อ..." value="{{$new->new_title}}" name="title" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">เนื้อหา</label>
                        <div class="col-sm-10">
                            <textarea name="content" class="form-control" cols="30" rows="10" placeholder="เขียนบางอย่าง...">{{$new->new_content}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">เเท็ก</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-12">
                                    <div class="input-group input-group-button">
                                        <input type="text" class="form-control" placeholder="ชื่อเเท็ก..." id="edit_tag">
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
                                        @foreach ($new->Content_hasM_Tags('C') as $item)
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
                        <label class="col-sm-2 col-form-label">แกลเลอรี่ภาพ</label>
                        <div class="col-sm-7">
                            <div class="row">
                                @if(!empty($img))
                                    @foreach($img as $key => $picture)
                                        <div id="gal{{$picture->id_new_img }}">
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="file" style="display: none;" name="sub_gallery[{{$picture->id_new_img}}]" class="form-control" id="slidepicture{{$picture->id_new_img}}" multiple="multiple" onchange="readGalleryURL2(this,{{$picture->id_new_img}})">
                                                    <img id="gallerypreview{{$picture->id_new_img}}" style="max-height:250px ;" src="{{asset('storage/app/news/'.$picture->name)}}" />
                                                    <button  type="button" class="btn btn-danger" onclick="deletegallery({{$picture->id_new_img}})" style="position: absolute; top: 0px;"><i class="icofont icofont-trash"></i></button>
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
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">ยกเลิก</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light" form="edit_new">ยืนยัน</button>
            </div>
        </div>
    </div>
</div>

<script>
    var edit_count_tag = {{ $new->Content_hasM_Tags('C')->count() }}+1;
    $('#edit_addtags').click(function () { 
        if (edit_count_tag <= 3) {
            var edit_tagname = $('#edit_tag').val();
            if (edit_tagname != '') {
                $("#edit_resultappend").append('<label class="label label-primary label-lg" id="edit_tag_'+edit_count_tag+'" data-numtag="'+edit_count_tag+'">'+
                ''+edit_tagname+' <i class="icofont icofont-close pointer" onclick="edit_del_tag('+edit_count_tag+')"></i></label>'+
                '<input type="hidden" name="edit_tag[]" id="edit_inputtag_'+edit_count_tag+'" value="'+edit_tagname+'">')
                edit_count_tag++;
                tagname = $('#edit_tag').val('');
            }
        }
    });

    function edit_del_tag(edit_tag_num) {
        $('#edit_tag_'+edit_tag_num).fadeOut();
        $('#edit_inputtag_'+edit_tag_num).remove();
        edit_count_tag--;
    }

    function del_oldtag(id) {
        $.ajax({
            url: '{{ url('admin/deleteoldtags') }}/' + id,
            type: 'POST',
            data: {id: id},
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        }).done(function (data) {
            $('#oldtag_'+id).fadeOut();
        });
        edit_count_tag--;
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