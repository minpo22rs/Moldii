<div class="modal fade" id="editmodal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Merchant</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('admin/merchant', $merchant->merchant_id)}}" method="POST" enctype="multipart/form-data" id="edit_merchant">
                @csrf
                {{method_field('PUT')}}
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Profile Image</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-6">
                                    <input type="file" name="img[]" class="form-control" id="adddocument">
                                </div>
                                <div class="col-6">
                                    <img src="{{asset('storage/app/merchant/'.$merchant->merchant_img.'')}}" alt="" class="img-fluid"> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Name <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" name="name" class="form-control" placeholder="First Name..." value="{{$merchant->merchant_name}}">
                                </div>
                                <div class="col-6">
                                    <input type="text" name="lname" class="form-control" placeholder="Last Name..." value="{{$merchant->merchant_lname}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Verified</label>
                        <div class="col-sm-10">
                            <div class="row m-l-10">
                                <div class="border-checkbox-section">
                                    <div class="border-checkbox-group border-checkbox-group-primary">
                                        <input class="border-checkbox" name="verified[]" type="checkbox" id="authentic" value="authentic">
                                        <label class="border-checkbox-label" for="authentic">100% Authentic</label>
                                    </div>
                                    <div class="border-checkbox-group border-checkbox-group-primary">
                                        <input class="border-checkbox" name="verified[]" type="checkbox" id="daysreturn" value="daysreturn">
                                        <label class="border-checkbox-label" for="daysreturn">15 Days Return</label>
                                    </div>
                                    <div class="border-checkbox-group border-checkbox-group-primary">
                                        <input class="border-checkbox" name="verified[]" type="checkbox" id="shipping" value="shipping">
                                        <label class="border-checkbox-label" for="shipping">Free Shipping</label>
                                    </div>
                                    <div class="border-checkbox-group border-checkbox-group-primary">
                                        <input class="border-checkbox" name="verified[]" type="checkbox" id="access" value="access">
                                        <label class="border-checkbox-label" for="access">Access</label>
                                    </div>
                                    <div class="border-checkbox-group border-checkbox-group-primary">
                                        <input class="border-checkbox" name="verified[]" type="checkbox" id="reward" value="reward">
                                        <label class="border-checkbox-label" for="reward">Reward</label>
                                    </div>
                                    <div class="border-checkbox-group border-checkbox-group-primary">
                                        <input class="border-checkbox" name="verified[]" type="checkbox" id="coupons" value="coupons">
                                        <label class="border-checkbox-label" for="coupons">Coupons</label>
                                    </div>
                                    <div class="border-checkbox-group border-checkbox-group-danger">
                                        <input class="border-checkbox" name="verified[]" type="checkbox" id="all" value="all">
                                        <label class="border-checkbox-label" for="all">All</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Email <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-12">
                                    <input type="text" name="email" class="form-control" placeholder="Email..." required value="{{$merchant->merchant_email}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Password <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-12">
                                    <input type="password" name="password" class="form-control" placeholder="Password..." autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light" form="edit_merchant">Submit</button>
            </div>
        </div>
    </div>
</div>