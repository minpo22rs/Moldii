<div class="modal fade" id="viewmodal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">รายละเอียด</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-3">
                        ชื่อร้านค้า
                    </div>
                    <div class="col-4">
                        {{$merchant->merchant_shopname}}

                    </div>
                    <div class="col-2">
                        สถานะร้านค้า

                    </div>
                    <div class="col-3">
                    
                            <form action="{{url('admin/statusstore')}}" method="POST" >
                                @csrf
                                <input type="hidden" name="id" value="{{$merchant->merchant_id}}">
                                <select class="form-control" name="status" style="width:100%" required>
                                    <option value="">กรุณาเลือก</option>
                                    <option value="3">อนุมัติการเปิดร้าน</option>
                                    <option value="2">ปฎิเสธการเปิดร้าน</option>
                                </select>
                                <br>
                                <button type="submit" class="btn btn-success btn-sm"> ยืนยันสถานะร้านค้า</button>
                            </form>
                    </div>
                </div>
                <br>
                <hr>
                <div class="row">
                    <div class="col-3">
                        ชื่อ-นามสกุล เจ้าของร้าน
                    </div>
                    <div class="col-4">
                        {{$merchant->merchant_name}} -  {{$merchant->merchant_lname}} 

                    </div>
                </div>
                <br>
                <hr>
                <div class="row">
                    <div class="col-3">
                        อีเมลร้านค้า
                    </div>
                    <div class="col-4">
                        {{$merchant->merchant_email}}

                    </div>
                </div>
                <br>
                <hr>
                <div class="row">
                    <div class="col-3">
                        เบอร์โทรศัพท์ร้านค้า
                    </div>
                    <div class="col-3">
                        {{$merchant->merchant_phone}}

                    </div>
                </div>
                <br>
                <hr>
                <div class="row">
                    <div class="col-3">
                        ที่ตั้งร้านค้า
                    </div>
                    <div class="col-4">
                        {{$merchant->merchant_address}}
                        {{$merchant->tth}}
                        {{$merchant->ath}}
                        {{$merchant->pth}}
                        {{$merchant->merchant_postcode}}
                    </div>
                </div>
                <br>
                <hr>
                <div class="row">
                    <div class="col-6">
                        เอกสาร บัตรประชาชนหรือ หนังสือรับรองบริษัท
                        <br>
                        <br>
                        <img src="{{('https://modii.sapapps.work/storage/store/'.$merchant->merchant_document.'')}}" width="50%" height="50%">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>