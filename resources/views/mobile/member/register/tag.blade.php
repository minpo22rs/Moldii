
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<style>
  a:link {
    text-decoration: none;
  }

  a:visited {
    text-decoration: none;
    color:#fff;
  }

  a:hover {
    text-decoration: none;
    color:#FFC300;
  }

</style>

<br>
<body style="background-color : #dc3545 ; "> <!-- แก้สีพื้นหลังตรงนี้ -->
  <div class="container mt-3 ">
    <div style="color: #fff;">
      <h2>สิ่งที่คุณสนใจ</h2>
      <small>เลือกได้มากกว่า 1 ตัวเลือก</small>
    </div>
    <div class="row">
        <div class="col-md-12 mt-4 mb-5" style="background-color : #fff ; ">
              <form action="{{url('selecttag')}}" method="POST">
                @csrf
                <div style="overflow: auto;width: 100%; height: 450;">
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="Art Toys"> Art Toys</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="Vintage Toy"> Vintage Toy</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="ของเก่า Retro"> ของเก่า Retro</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="Dragon bal"> Dragon bal</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="Mario"> Mario</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="One Piece"> One Piece</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="One Punch Man"> One Punch Man</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="Slam Dunk"> Slam Dunk</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="Doraemon"> Doraemon</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="Pokemon" >Pokemon</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="Harry Potter"> Harry Potter</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="Car Model"> Car Model</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="Scale Mode"> Scale Mode</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="รถก่อสร้าง">รถก่อสร้าง</button> <!-- ใส่ checkbox ต่อนะพี่ตั้ง ชื่อไว้เป็นตัวอย่างเนสตั้งเป็นชื่ออื่นก็ได้ -->
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="Motorcycle">Motorcycle</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="Vespa & สกู๊ตเตอร์">Vespa & สกู๊ตเตอร์</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="เครื่องบิน">เครื่องบิน</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="Rare Item">Rare Item</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="Marvel">Marvel</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="DC Comic">DC Comic</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="Hero">Hero</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="Masked Rider">Masked Rider</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="หุ่นยนต์">หุ่นยนต์</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="Transformers">Transformers</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="ไดโนเสาร์">ไดโนเสาร์</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="ก๊อตซิลล่า">ก๊อตซิลล่า</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="สัตว์ประหลาด">สัตว์ประหลาด</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="เจ้าหญิง">เจ้าหญิง</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="Toystory">Toystory</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="Radfink">Radfink</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="ฉากโมเดล">ฉากโมเดล</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="Majorette">Majorette</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="Ghost ผี">Ghost ผี</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="Kaws">Kaws</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="Astro boy">Astro boy</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="ดาบพิฆาตอสูร">ดาบพิฆาตอสูร</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="นารูโตะ">นารูโตะ</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="ชินจัง มารูโกะ">ชินจัง มารูโกะ</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="การ์ตูนสัตว์">การ์ตูนสัตว์</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="ดร.สลัมป์ กับหนูน้อยอาราเล">ดร.สลัมป์ กับหนูน้อยอาราเล</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="โคนัน">โคนัน</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="Star wars">Star wars</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="โตเกียวรีเวนเจอร์">โตเกียวรีเวนเจอร์</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="มายฮีโร่">มายฮีโร่</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="เอเลี่ยน พรีเดเตอร์">เอเลี่ยน พรีเดเตอร์</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="ศิลปิน ดารา">ศิลปิน ดารา</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="มวยปล้ำ">มวยปล้ำ</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="JADA TOY">JADA TOY</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="Minnion">Minnion</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="Disney">Disney</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="LOL">LOL</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="Lego ตัวต่อ">Lego ตัวต่อ</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="ของเล่นเด็ก">ของเล่นเด็ก</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="เสริมพัฒนาการ">เสริมพัฒนาการ</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="ปืน และอาวุธ ของเล่น">ปืน และอาวุธ ของเล่น</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="การ์ดพลัง">การ์ดพลัง</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="เทพนิยาย">เทพนิยาย</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="บอร์ดเกม">บอร์ดเกม</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="Q Posket">Q Posket</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="POP MART">POP MART</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="เดทโน๊ต">เดทโน๊ต</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="Captain Tsubasa">Captain Tsubasa</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="Labubu">Labubu</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="นินจาฮาโตริ">นินจาฮาโตริ</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="มนุษย์หินฟริ้นสโตน">มนุษย์หินฟริ้นสโตน</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="พาวเวอร์พัพเกิล">พาวเวอร์พัพเกิล</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="เซเลอร์มูน">เซเลอร์มูน</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="Tom and Jerry">Tom and Jerry</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="เต่านินจา">เต่านินจา</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="">ดิจิม่อน</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="ดิจิม่อน">อิคคิวซัง</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="บุริน">บุริน</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="บัคบันนี่">บัคบันนี่</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="TAMIYA">TAMIYA</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="ตัวละครภาพยนต์">ตัวละครภาพยนต์</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="การ์ตูนยุค 70-80">การ์ตูนยุค 70-80</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="การ์ตูนตลก">การ์ตูนตลก</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="หมา แมว">หมา แมว</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="ของแต่งบ้าน">ของแต่งบ้าน</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="ของใช้">ของใช้</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="เสื้อผ้า">เสื้อผ้า</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="แฟชั่น">แฟชั่น</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="อื่นๆ">อื่นๆ</button>
                </div>
              <br><br>
              <button type="submit" class="btn btn-danger btn-lg btn-block">ยืนยัน</button>
            </form>
        </div>
    </div>
  </div>
</body>


<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

<script>
  var a = "{{Session::get('success')}}";
    if (a) {
        alert(a);
    }

</script>