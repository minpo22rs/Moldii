<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head></head>
    <body>
<div id="output">
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.qrcode/1.0/jquery.qrcode.min.js" integrity="sha512-NFUcDlm4V+a2sjPX7gREIXgCSFja9cHtKPOL1zj6QhnE0vcY695MODehqkaGYTLyL2wxe/wtr4Z49SvqXq12UQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>         
    jQuery(function(){             
        jQuery('#output').qrcode({width: 200,height: 200,text: "{!! @$res !!}"});         
    })     
        
</script>
</body>
</html>