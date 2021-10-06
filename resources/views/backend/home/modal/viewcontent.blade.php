<div class="modal fade" id="viewcontentmodal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{$fs->fs_name}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="{{asset('storage/app/flashsale/'.$fs->fs_img.'')}}" class="img-fluid" width="100%">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Registeration</label>
                    <div class="col-sm-10">
                        <div class="row">
                            <label class="col-sm-12 col-form-label">
                                <span style="color: #4099ff;">{{date("d/m/Y", strtotime($fs->fs_regis_start))}}</span> - 
                                <span style="color: #FF5370;">{{date("d/m/Y", strtotime($fs->fs_regis_end))}}</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Content</label>
                    <div class="col-sm-10">
                        <label class="col-form-label">{{$fs->fs_content}}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Event Start</label>
                    <div class="col-sm-10">
                        <div class="row">
                            <label class="col-sm-12 col-form-label">
                                <span style="color: #4099ff;">{{date("d/m/Y", strtotime($fs->fs_datestart))}}</span> - 
                                <span style="color: #FF5370;">{{date("d/m/Y", strtotime($fs->fs_dateend))}}</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Maximum Sale</label>
                    <div class="col-sm-10">
                        <label class="col-form-label">{{$fs->fs_maximum_sale}} %</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Applicants</label>
                    <div class="col-sm-10">
                        <label class="col-form-label">{{$fs->fs_event_applicant($fs->fs_id)}}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <div class="dt-responsive table-responsive">
                            <table id="productTable" class="table" width="100%">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">#</th>
                                        <th style="text-align: center;">Image</th>
                                        <th style="text-align: center;">Merchant Name</th>
                                        <th style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var id = {{ $fs->fs_id }};
        var table = $('#productTable').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: '{{ url('admin/searchproduct') }}/' + id,
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', "className": "text-center text-middle"},
                {data: 'img', name: 'img', "className": "text-center text-middle"},
                {data: 'name', name: 'product_name', "className": "text-middle"},
                {data: 'action', name: 'action', orderable: false, searchable: false, "className": "text-center text-middle"},
            ]
        });
    });

    $(document).on('click', '.ignore', function () { 
        var id = $(this).attr('data-ignore');
        var event_id = {{ $fs->fs_id }};
        $.ajax({
            type: "POST",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: "{{url('admin/ignore_mercahant')}}/"+ id,
            data: {
                id: id,
                event_id: event_id,
            },
            success: function (response) {
                
            }
        });
    });
</script>