@extends('mobile.main_layout.main')
<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-8 ">
            <div class="card">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ลำดับที่</th>
                            <th scope="col">ชื่อ</th>
                            <th scope="col">Email</th>
                            <th scope="col">เพศ</th>
                            <th scope="col">Phone</th>


                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($cus as $row)
                            <tr>

                                <td>{{ $row->customer_id }} </td>
                                <td>{{ $row->customer_name }} </td>
                                <td>{{ $row->customer_email }}</td>
                                <td>{{ $row->customer_gender }}</td>
                                <td>{{ $row->customer_phone }}</td>
                                <td>
                                    <a
                                         href="{{url('/testchat/chat_user/'.$row->customer_id)}}"
                                        class="start_chat btn btn-primary ">Chat</a>
                                </td>
                                {{-- <td>
                                <a href="{{ url('/department/softdelete/'.$row->id)}}" class="btn btn-danger">ลบ</a>
                            </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>




            </div>
        </div>
    </div>

</div>
<script src="https://code.jquery.com/jquery-3.6.2.js" integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4=" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script>

        // function make_chat_dialog_box(to_user_id, to_user_name) {

        //     var modal_content = '<div id="user_dialog_' + to_user_id +
        //         '" class="card " title="You have chat with ' +
        //         to_user_name + '">';
        //     modal_content +=
        //         '<div style="height:400px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px;" class="chat_history" data-touserid="' +
        //         to_user_id + '" id="chat_history_' + to_user_id + '">';
        //     modal_content += '</div>';
        //     modal_content += '<div class="form-group">';
        //     modal_content += '<textarea name="chat_message_' + to_user_id + '" id="chat_message_' + to_user_id +
        //         '" class="form-control"></textarea>';
        //     modal_content += '</div><div class="form-group" align="right">';
        //     modal_content += '<button type="button" name="send_chat" id="' + to_user_id +
        //         '" class="btn btn-info send_chat">Send</button></div></div>';
        //     $('#user_model_details').html(modal_content);
        // }

        $(document).on('click', '.start_chat', function() {
            var to_user_id = $(this).data('touserid');
            var to_user_name = $(this).data('tousername');
            make_chat_dialog_box(to_user_id, to_user_name);
            $("#user_dialog_" + to_user_id).dialog({
                autoOpen: false,
                width: 400
            });
            $('#user_dialog_' + to_user_id).dialog('open');

        });


</script>



<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    <script src = "https://cdn.socket.io/4.5.4/socket.io.min.js"
    integrity = "sha384-/KNQL8Nu5gCHLqwqfQjA689Hhoqgi2S84SNUxC3roTe4EhJ9AfLkp8QiQcU8AMzI"
    crossorigin = "anonymous" >
</script>
<script src="https://code.jquery.com/jquery-3.6.2.js" integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4="
    crossorigin="anonymous"></script>


</script>
