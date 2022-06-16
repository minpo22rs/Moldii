<div class="modal fade" id="editmodal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">เเก้ไขรูปภาพ</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('admin/podcasts', $new->new_id)}}" method="POST" enctype="multipart/form-data" id="edit_new">
                @csrf
                {{method_field('PUT')}}
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">
                            <span class="mytooltip tooltip-effect-1">
                                <span class="tooltip-item2">Link </span>
                                <span class="tooltip-content4 clearfix">
                                    <span class="tooltip-text2">
                                        รูปภาพขนาด: 712 x 390 px.
                                    </span>
                                </span>
                            </span>
                        </label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" name="link" class="form-control" placeholder="Link..." value="{{$new->new_img}}">
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
                        <label class="col-sm-2 col-form-label">แท็ก</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-12">
                                    <div class="input-group input-group-button">
                                        <input type="text" class="form-control" placeholder="ชื่อแท็ก..." id="edit_tag">
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
</script>