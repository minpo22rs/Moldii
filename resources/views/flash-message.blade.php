@if ($message = Session::get('success'))
<script type="text/javascript">
    swal.fire({
        title:'สำเร็จ!',
        text:"{{Session::get('success')}}",
        timer:3000,
        type:'success'
    }).then((value) => {
    }).catch(swal.noop);
</script>
@endif
  
@if ($message = Session::get('error'))
<script type="text/javascript">
    swal.fire({
        title:'เกิดข้อผิดพลาด!',
        text:"{{Session::get('error')}}",
        timer:3000,
        type:'error'
    }).then((value) => {
    }).catch(swal.noop);
</script>
@endif
   
@if ($message = Session::get('warning'))
<script type="text/javascript">
    swal.fire({
        title:'คำเตือน!',
        text:"{{Session::get('warning')}}",
        timer:3000,
        type:'warning'
    }).then((value) => {
    }).catch(swal.noop);
</script>
@endif

@if ($message = Session::get('loginfail'))
<script type="text/javascript">
    swal.fire({
        title:'ขออภัย!',
        text:"{{Session::get('loginfail')}}",
        type:'error'
    }).then((value) => {
    }).catch(swal.noop);
</script>
@endif
   
@if ($message = Session::get('info'))
<div class="alert alert-info alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    <strong>{{ $message }}</strong>
</div>
@endif
  
{{-- @if ($errors->any())
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    Please check the form below for errors
</div>
@endif --}}