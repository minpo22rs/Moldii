@extends('merchant.layouts.master')
@section('css')
<style>
    .swal2-cancel {
        margin-right: 30px;
    }
    
    .pointer {cursor: pointer;}
</style>
@endsection
@section('content')
<div class="card page-header p-0">
    <div class="card-block front-icon-breadcrumb row align-items-end">
        <div class="breadcrumb-header col">
            <div class="big-icon">
                <i class="icofont icofont-cart"></i>
            </div>
            <div class="d-inline-block">
                <h5>คำสั่งซื้อ</h5>
              
            </div>
        </div>
        <div class="col">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item"><a href="">คำสั่งซื้อ</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-block">
        <div class="col-sm-12">
            <div class="dt-responsive table-responsive">
                <table id="example1" class="table example1">
                    <thead>
                        <tr>
                            <th style="text-align: center;">คำสั่งซื้อ</th>
                            <th style="text-align: center;">ชื่อลูกค้า</th>
                            <th style="text-align: center;">รายการสินค้า</th>
             
                            <th style="text-align: center;">ราคา</th>
                            <th style="text-align: center;">จำนวน</th>
                            <th style="text-align: center;">รหัสติดตาม</th>
                            <th style="text-align: center;">สถานะการชำระเงิน</th>
                            <th style="text-align: center;">สถานะสินค้า</th>
                            <th style="text-align: center;">การจัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                            
                            @foreach ($num as $nums)
                                <?php $i =1 ;
                                
                                        $sql = DB::Table('tb_order_details')->where('order_id',$nums->id_order)
                                                    ->where('store_id',Auth::guard('merchant')->user()->merchant_id)
                                                    ->leftJoin('tb_products','tb_order_details.product_id','=','tb_products.product_id')
                                                    ->leftJoin('tb_merchants','tb_order_details.store_id','=','tb_merchants.merchant_id')
                                                    ->get();
                                    
                                ?>
                                <tr>
                                    <td style="text-align: center;">{{$nums->order_code}}</td>
                                    <td style="text-align: center;">{{$nums->customer_name}}{{$nums->customer_lname}}</td>
                                    
                                      
                                        
                                    <td style="text-align: center;">@foreach ($sql as $sqls){{$sqls->product_name}}<br><br> @endforeach</td>
                                    <td style="text-align: center;">@foreach ($sql as $sqls){{$sqls->price}}<br><br> @endforeach</td>
                                    <td style="text-align: center;">@foreach ($sql as $sqls){{$sqls->amount}}<br><br>@endforeach</td>
                                    <td style="text-align: center;color:green">
                                        @foreach ($sql as $sqls)
                                            {{$sqls->tracking_code==null?'No Tracking':$sqls->tracking_code}}<br><br>
                                        @endforeach
                                    </td>
                                   
                                    <td style="text-align: center;">
                                        @if($nums->status_order==1)
                                            รอตรวจสอบหลักฐานการชำระเงิน
                                        @elseif($nums->status_order==2)
                                            ชำระเงินเรียบร้อยแล้ว
                                        @elseif($nums->status_order==4)
                                            เก็บเงินปลายทาง
                                        @elseif($nums->status_order==6)
                                            รอชำระเงิน
                                        @else
                                            -
                                        @endif
                                    
                                    </td>

                                    <td style="text-align: center;">
                                        @foreach ($sql as $sqls)
                                            @if($sqls->status_detail==5)
                                                อยู่ระหว่างขนส่ง<br><br>
                                            @elseif($sqls->status_detail==1 || $sqls->status_detail==9)
                                                ที่ต้องจัดส่ง<br><br>
                                           
                                            @elseif($sqls->status_detail==10)
                                                ลูกค้าได้รับสินค้าแล้ว<br><br>
                                            @else
                                                -<br><br>
                                            @endif
                                        @endforeach
                                    </td>

                                    {{-- <td style="text-align: center;">
                                        @if($nums->status_order==3)
                                            Delivery
                                        @elseif($nums->status_order==4)
                                           Cancel Order
                                        @else
                                            Pending
                                        @endif
                                    
                                    </td> --}}
                                    

                                    <td style="text-align: center;">
                                        <div class="dropdown-primary dropdown open">
                                            <button class="btn btn-outline-primary btn-round dropdown-toggle waves-effect waves-light " type="button" id="dropdown-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">More</button>
                                            <div class="dropdown-menu" aria-labelledby="dropdown-2" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" style="z-index: 999; position: static;">
                                                {{-- @if($nums->status_order==2 || $nums->status_order==4 && $sql[0]->tracking_code==null)
                                                    @if($sql[0]->tracking_code==null)
                                                    <a href="javascript:;" class="dropdown-item waves-light waves-effect" onclick="openmd({{$nums->id_order}});">
                                                        <i class="fa fa-edit"></i> จัดส่งออเดอร์
                                                    </a>
                                                @endif --}}
                                                <a href="{{url('merchant/orderdetail/'.$nums->id_order.'')}}" class="dropdown-item waves-light waves-effect" ><i class="icofont icofont-speech-comments"></i> View Detail</a>
                                                @if($sql[0]->tracking_code==null)
                                                    <div class="dropdown-divider"></div>

                                                    @if($nums->status_order!=5)
                                                        <a  href="javascript:"
                                                            onclick="Swal.fire({
                                                            title: 'ยืนยันการยกเลิกออเดอร์ใช่หรือไม่',
                                                            showDenyButton: true,
                                                            showCancelButton: true,
                                                            confirmButtonColor: '#377dff',
                                                            cancelButtonColor: '#363636',
                                                            confirmButtonText: `Yes`,
                                                            denyButtonText: `No`,
                                                            }).then((result) => {
                                                                if (result.value) {
                                                                    location.href='{{url('merchant/cancelorder',$nums->id_order)}}';
                                                                } else{
                                                                    Swal.fire('Canceled', '', 'info')
                                                                }
                                                            })"  class="dropdown-item waves-light waves-effect" >
                                                            <i class="icofont icofont-bin"></i> ยกเลิกออเดอร์
                                                        </a>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php $i ++ ;?>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <form action="{{url('merchant/createbooking')}}" method="POST">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันทำการจัดส่งออเดอร์ใช่หรือไม่</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                    <input type="hidden" name="oid" id="oid">
                    <div class="row">
                        <div class="col-3"> เลือกขนส่ง :</div>
                        <div class="col-6"> 
                                <select class="form-control" name="ship" required>
                                    <option value=""> โปรดเลือก</option>
                                    <option value="THP">ไปรษณีย์ไทย EMS</option>
                                    <option value="TP2">ไปรษณีย์ ลงทะเบียน</option>
                                    <option value="FLE">Flash Express</option>
                                    <option value="KRYD">Kerry Express (Drop off)</option>
                                    <option value="KRYP">Kerry Express (Pickup)</option>
                                </select>
                        </div>
                    </div>
                
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                <button type="submit" class="btn btn-primary">ยืนยัน</button>
            </div>
        </form>
      </div>
    </div>
  </div>

@endsection
@section('js')

@include('flash-message')

<script>
    
    function openmd(params) {
        document.getElementById('oid').value = params;
        $('#exampleModalCenter').modal('show');
    }

</script>
@endsection
