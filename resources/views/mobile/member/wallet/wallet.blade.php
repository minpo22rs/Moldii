
@extends('mobile.main_layout.main')
    @section('app_header')
    <div class="appHeader bg-danger text-light">
        <div class="left">
                <ion-icon name="arrow-back-outline"  onclick = "window.history.back();"></ion-icon>
        </div>
        <div class="pageTitle">
            Wallet
        </div>
    </div>
    @endsection
    @section('content') 
        <div class="section full mt-3 mb-3">
            <div class = "card bg-danger mx-3">
                <div class = "card-body p-2">
                    <div class = "row">
                        <div class = "col-3">
                            <div class = "m-1">
                                <ion-icon name="wallet-outline" class = "text-white" style = "font-size: 48px;"></ion-icon>
                            </div>
                        </div>
                        <div class = "col-9">
                            <div class = "m-1">
                                <div class = "row">
                                    จำนวนเงินทั้งหมด
                                </div>
                                <div class = "row mt-1" style = "font-size: 28px;">
                                    THB 10,000
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class = "row mt-1 border-top font-weight-bold">
                        <div class = "col-10 mt-2">
                            เติมเงินเพื่อใช้ในการชำระ
                        </div>
                        <div class = "col-2 mt-2 text-right">
                            <ion-icon name="chevron-forward-outline" style = "font-size: 18px;"></ion-icon>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section full mt-3 mb-3">
            <div class="card bg-success mx-3" style="/* background-color: #005476; */ color: white;">
                <div class="card-body p-1">
                    <div class="row font-weight-bold">
                        <div class="col-2 text-right">
                            <ion-icon name="card-outline" style="font-size: 32px;" role="img" class="md hydrated" aria-label="chevron forward outline"></ion-icon>
                        </div>
                        <div class="col-8 mt-1">
                            เพิ่มบัตรเครดิตหรือเดบิต
                        </div>
                        <div class="col-2 text-right mt-1">
                            <ion-icon name="chevron-forward-outline" style="font-size: 18px;" role="img" class="md hydrated" aria-label="chevron forward outline"></ion-icon>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section full mt-3 mb-3">
            <div class = "row mx-3 my-3">
                <div class = "col-6 text-left">
                    <span class = "text-dark font-weight-bold">รายการล่าสุด</span>
                </div>
                <div class = "col-6 text-right">
                    <span class = "text-info">ดูทั้งหมด</span>
                </div>
            </div>
            <div class = "row border-top mx-3 my-3 text-dark">
                <div class = "col-6 mt-1 text-left">
                    <div class = "row"><div class = "col-12"><span class = "font-weight-bold" style = "font-size: 18px;">Payment</span></div></div>
                    <div class = "row"><div class = "col-12"><span>ชื่อรายการ</span></div></div>
                </div>
                <div class = "col-6 mt-1 text-right">
                    <div class = "row mt-1">
                        <div class = "col-10 pr-0">
                            <span class = "font-weight-bold" style = "font-size: 18px;">
                                THB 1,000
                            </span>
                        </div>
                        <div class = "col-2">
                            <ion-icon name="chevron-forward-outline" style = "font-size: 24px;"></ion-icon>
                        </div>
                    </div>
                </div>
            </div>
            <div class = "row border-top mx-3 my-3 text-dark">
                <div class = "col-6 mt-1 text-left">
                    <div class = "row"><div class = "col-12"><span class = "font-weight-bold" style = "font-size: 18px;">เติมเงิน</span></div></div>
                    <div class = "row"><div class = "col-12"><span>ชื่อธนาคาร</span></div></div>
                </div>
                <div class = "col-6 mt-1 text-right">
                    <div class = "row mt-1">
                        <div class = "col-10 pr-0">
                            <span class = "font-weight-bold text-success" style = "font-size: 18px;">
                                THB +1,000
                            </span>
                        </div>
                        <div class = "col-2">
                            <ion-icon name="chevron-forward-outline" style = "font-size: 24px;"></ion-icon>
                        </div>
                    </div>
                </div>
            </div>
            <div class = "row border-top mx-3 my-3 text-dark">
                <div class = "col-6 mt-1 text-left">
                    <div class = "row"><div class = "col-12"><span class = "font-weight-bold" style = "font-size: 18px;">Payment</span></div></div>
                    <div class = "row"><div class = "col-12"><span>ชื่อรายการ</span></div></div>
                </div>
                <div class = "col-6 mt-1 text-right">
                    <div class = "row mt-1">
                        <div class = "col-10 pr-0">
                            <span class = "font-weight-bold" style = "font-size: 18px;">
                                THB 1,000
                            </span>
                        </div>
                        <div class = "col-2">
                            <ion-icon name="chevron-forward-outline" style = "font-size: 24px;"></ion-icon>
                        </div>
                    </div>
                </div>
            </div>
            <div class = "row border-top mx-3 my-3 text-dark">
                <div class = "col-6 mt-1 text-left">
                    <div class = "row"><div class = "col-12"><span class = "font-weight-bold" style = "font-size: 18px;">เติมเงิน</span></div></div>
                    <div class = "row"><div class = "col-12"><span>ชื่อธนาคาร</span></div></div>
                </div>
                <div class = "col-6 mt-1 text-right">
                    <div class = "row mt-1">
                        <div class = "col-10 pr-0">
                            <span class = "font-weight-bold text-success" style = "font-size: 18px;">
                                THB +1,000
                            </span>
                        </div>
                        <div class = "col-2">
                            <ion-icon name="chevron-forward-outline" style = "font-size: 24px;"></ion-icon>
                        </div>
                    </div>
                </div>
            </div>
            <div class = "row border-top mx-3 my-3 text-dark">
                <div class = "col-6 mt-1 text-left">
                    <div class = "row"><div class = "col-12"><span class = "font-weight-bold" style = "font-size: 18px;">Payment</span></div></div>
                    <div class = "row"><div class = "col-12"><span>ชื่อรายการ</span></div></div>
                </div>
                <div class = "col-6 mt-1 text-right">
                    <div class = "row mt-1">
                        <div class = "col-10 pr-0">
                            <span class = "font-weight-bold" style = "font-size: 18px;">
                                THB 1,000
                            </span>
                        </div>
                        <div class = "col-2">
                            <ion-icon name="chevron-forward-outline" style = "font-size: 24px;"></ion-icon>
                        </div>
                    </div>
                </div>
            </div>
            <div class = "row border-top mx-3 my-3 text-dark">
                <div class = "col-6 mt-1 text-left">
                    <div class = "row"><div class = "col-12"><span class = "font-weight-bold" style = "font-size: 18px;">เติมเงิน</span></div></div>
                    <div class = "row"><div class = "col-12"><span>ชื่อธนาคาร</span></div></div>
                </div>
                <div class = "col-6 mt-1 text-right">
                    <div class = "row mt-1">
                        <div class = "col-10 pr-0">
                            <span class = "font-weight-bold text-success" style = "font-size: 18px;">
                                THB +1,000
                            </span>
                        </div>
                        <div class = "col-2">
                            <ion-icon name="chevron-forward-outline" style = "font-size: 24px;"></ion-icon>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('custom_script')
        <script>
                bottom_now(4);
        </script>
    @endsection