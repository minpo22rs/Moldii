<div class="modal fade" id="hismodal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Voucher Histories</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="dt-responsive table-responsive">
                    <table id="example1" class="table example1">
                        <thead>
                            <tr>
                                <th style="text-align: center;">#</th>
                                <th style="text-align: center;">Customer</th>
                                <th style="text-align: center;">Use At</th>
                                <th style="text-align: center;">Value</th>
                                <th style="text-align: center;">Merchant</th>
                                <th style="text-align: center;">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vused as $key => $item)
                            <tr>
                                <td class="text-center text-middle">{{$key+1}}</td>
                                <td class="text-center text-middle">{{$item->Vused_hasO_customer->customer_name}} {{$item->Vused_hasO_customer->customer_lname}}</td>
                                <td class="text-center text-middle">{{$item->VUsed_hasO_Product->product_name}} ({{$item->VUsed_hasO_Product->product_code}})</td>
                                <td class="text-center text-middle">{{$item->vused_value}}</td>
                                <td class="text-center text-middle"></td>
                                <td class="text-center text-middle">{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item->created_at)->format('d/m/Y H:i:s') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>