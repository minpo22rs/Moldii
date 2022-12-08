@extends('mobile.main_layout.main')

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
@section('app_header')
<div class="appHeader bg-danger text-light">
    <div class="left">
        <ion-icon name="arrow-back-outline" onclick="window.history.back();"></ion-icon>
    </div>
    <div class="pageTitle">
      สิ่งที่คุณสนใจ
    </div>
</div>
@endsection
@section('content')
<br>

 
    <div class="row">
        <div class="col-md-12 p-2 mt-4 mb-5" style="background-color : #fff ; ">
      <h4>เลือกได้มากกว่า 1 ตัวเลือก</h4>

              <form action="{{url('updatetag')}}" method="POST">
                @csrf
                <div style="overflow: auto;width: 100%; height: 500;">
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="Art Toys" {{array_search('Art Toys',$arr)?'checked':''}}> Art Toys</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="Vintage Toy" {{array_search('Vintage Toy',$arr)?'checked':''}}> Vintage Toy</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="ของเก่า Retro" {{array_search('ของเก่า Retro',$arr)?'checked':''}}> ของเก่า Retro</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="Dragon ball" {{array_search('Dragon ball',$arr)?'checked':''}}> Dragon ball</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="Mario" {{array_search('Mario',$arr)?'checked':''}}> Mario</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="One Piece" {{array_search('One Piece',$arr)?'checked':''}}> One Piece</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" value="One Punch Man" {{array_search('One Punch Man',$arr)?'checked':''}}> One Punch Man</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('Slam Dunk',$arr)?'checked':''}} value="Slam Dunk"> Slam Dunk</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('Doraemon',$arr)?'checked':''}} value="Doraemon"> Doraemon</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('Pokemon',$arr)?'checked':''}} value="Pokemon" >Pokemon</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('Harry Potter',$arr)?'checked':''}} value="Harry Potter"> Harry Potter</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('Car Model',$arr)?'checked':''}} value="Car Model"> Car Model</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('Scale Mode',$arr)?'checked':''}} value="Scale Mode"> Scale Mode</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('รถก่อสร้าง',$arr)?'checked':''}} value="รถก่อสร้าง" >รถก่อสร้าง</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('Motorcycle',$arr)?'checked':''}} value="Motorcycle">Motorcycle</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('Vespa & สกู๊ตเตอร์',$arr)?'checked':''}} value="Vespa & สกู๊ตเตอร์">Vespa & สกู๊ตเตอร์</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('เครื่องบิน',$arr)?'checked':''}} value="เครื่องบิน">เครื่องบิน</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('Rare Item',$arr)?'checked':''}} value="Rare Item">Rare Item</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('Marvel',$arr)?'checked':''}} value="Marvel">Marvel</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('DC Comic',$arr)?'checked':''}} value="DC Comic">DC Comic</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('Hero',$arr)?'checked':''}} value="Hero">Hero</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('Masked Rider',$arr)?'checked':''}} value="Masked Rider">Masked Rider</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('หุ่นยนต์',$arr)?'checked':''}} value="หุ่นยนต์">หุ่นยนต์</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('Transformers',$arr)?'checked':''}} value="Transformers">Transformers</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('ไดโนเสาร์',$arr)?'checked':''}} value="ไดโนเสาร์">ไดโนเสาร์</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('ก๊อตซิลล่า',$arr)?'checked':''}} value="ก๊อตซิลล่า">ก๊อตซิลล่า</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('สัตว์ประหลาด',$arr)?'checked':''}} value="สัตว์ประหลาด">สัตว์ประหลาด</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('เจ้าหญิง',$arr)?'checked':''}} value="เจ้าหญิง">เจ้าหญิง</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('Toystory',$arr)?'checked':''}} value="Toystory">Toystory</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('Radfink',$arr)?'checked':''}} value="Radfink">Radfink</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('ฉากโมเดล',$arr)?'checked':''}} value="ฉากโมเดล">ฉากโมเดล</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('Majorette',$arr)?'checked':''}} value="Majorette">Majorette</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('Ghost',$arr)?'checked':''}} value="Ghost">Ghost ผี</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('Kaws',$arr)?'checked':''}} value="Kaws">Kaws</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('Astro boy',$arr)?'checked':''}} value="Astro boy">Astro boy</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('ดาบพิฆาตอสูร',$arr)?'checked':''}} value="ดาบพิฆาตอสูร">ดาบพิฆาตอสูร</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('นารูโตะ',$arr)?'checked':''}} value="นารูโตะ">นารูโตะ</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('ชินจัง มารูโกะ',$arr)?'checked':''}} value="ชินจัง มารูโกะ">ชินจัง มารูโกะ</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('การ์ตูนสัตว์',$arr)?'checked':''}} value="การ์ตูนสัตว์">การ์ตูนสัตว์</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('ดร.สลัมป์ กับหนูน้อยอาราเล่',$arr)?'checked':''}} value="ดร.สลัมป์ กับหนูน้อยอาราเล่">ดร.สลัมป์ กับหนูน้อยอาราเล่</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('โคนัน',$arr)?'checked':''}} value="โคนัน">โคนัน</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('Star wars',$arr)?'checked':''}} value="Star wars">Star wars</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('โตเกียวรีเวนเจอร์',$arr)?'checked':''}} value="โตเกียวรีเวนเจอร์">โตเกียวรีเวนเจอร์</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('มายฮีโร่',$arr)?'checked':''}} value="มายฮีโร่">มายฮีโร่</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('เอเลี่ยน พรีเดเตอร์',$arr)?'checked':''}} value="เอเลี่ยน พรีเดเตอร์">เอเลี่ยน พรีเดเตอร์</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('ศิลปิน ดารา',$arr)?'checked':''}} value="ศิลปิน ดารา">ศิลปิน ดารา</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('มวยปล้ำ',$arr)?'checked':''}} value="มวยปล้ำ">มวยปล้ำ</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('JADA TOY',$arr)?'checked':''}} value="JADA TOY">JADA TOY</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('Minnion',$arr)?'checked':''}} value="Minnion">Minnion</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('Disney',$arr)?'checked':''}} value="Disney">Disney</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('LOL',$arr)?'checked':''}} value="LOL">LOL</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('Lego',$arr)?'checked':''}} value="Lego">Lego ตัวต่อ</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('ของเล่นเด็ก',$arr)?'checked':''}} value="ของเล่นเด็ก">ของเล่นเด็ก</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('เสริมพัฒนาการ',$arr)?'checked':''}} value="เสริมพัฒนาการ">เสริมพัฒนาการ</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('ปืน และอาวุธ ของเล่น',$arr)?'checked':''}} value="ปืน และอาวุธ ของเล่น">ปืน และอาวุธ ของเล่น</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('การ์ดพลัง',$arr)?'checked':''}} value="การ์ดพลัง">การ์ดพลัง</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('เทพนิยาย',$arr)?'checked':''}} value="เทพนิยาย">เทพนิยาย</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('บอร์ดเกม',$arr)?'checked':''}} value="บอร์ดเกม">บอร์ดเกม</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('Q Posket',$arr)?'checked':''}} value="Q Posket">Q Posket</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('POP MART',$arr)?'checked':''}} value="POP MART">POP MART</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('เดทโน๊ต',$arr)?'checked':''}} value="เดทโน๊ต">เดทโน๊ต</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('Captain Tsubasa',$arr)?'checked':''}} value="Captain Tsubasa">Captain Tsubasa</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('Labubu',$arr)?'checked':''}} value="Labubu">Labubu</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('นินจาฮาโตริ',$arr)?'checked':''}} value="นินจาฮาโตริ">นินจาฮาโตริ</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('มนุษย์หินฟริ้นสโตน',$arr)?'checked':''}} value="มนุษย์หินฟริ้นสโตน">มนุษย์หินฟริ้นสโตน</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('พาวเวอร์พัพเกิล',$arr)?'checked':''}} value="พาวเวอร์พัพเกิล">พาวเวอร์พัพเกิล</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('เซเลอร์มูน',$arr)?'checked':''}} value="เซเลอร์มูน">เซเลอร์มูน</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('Tom and Jerry',$arr)?'checked':''}} value="Tom and Jerry">Tom and Jerry</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('เต่านินจา',$arr)?'checked':''}} value="เต่านินจา">เต่านินจา</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('ดิจิม่อน',$arr)?'checked':''}} value="ดิจิม่อน">ดิจิม่อน</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('อิคคิวซัง',$arr)?'checked':''}} value="อิคคิวซัง">อิคคิวซัง</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('บุริน',$arr)?'checked':''}} value="บุริน">บุริน</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('บัคบันนี่',$arr)?'checked':''}} value="บัคบันนี่">บัคบันนี่</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('TAMIYA',$arr)?'checked':''}} value="TAMIYA">TAMIYA</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('ตัวละครภาพยนต์',$arr)?'checked':''}} value="ตัวละครภาพยนต์">ตัวละครภาพยนต์</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('การ์ตูนยุค 70-80',$arr)?'checked':''}} value="การ์ตูนยุค 70-80">การ์ตูนยุค 70-80</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('การ์ตูนตลก',$arr)?'checked':''}} value="การ์ตูนตลก">การ์ตูนตลก</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('หมา แมว',$arr)?'checked':''}} value="หมา แมว">หมา แมว</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('ของแต่งบ้าน',$arr)?'checked':''}} value="ของแต่งบ้าน">ของแต่งบ้าน</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('ของใช้',$arr)?'checked':''}} value="ของใช้">ของใช้</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('เสื้อผ้า',$arr)?'checked':''}} value="เสื้อผ้า">เสื้อผ้า</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('แฟชั่น',$arr)?'checked':''}} value="แฟชั่น">แฟชั่น</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm mt-2"><input type="checkbox"   name="checkbox[]" {{array_search('อื่นๆ',$arr)?'checked':''}} value="อื่นๆ">อื่นๆ</button>
                </div>
                <br><br>
                <button type="submit" class="btn btn-lg btn-block btn-success" style="width: 50%;margin-left:25%">ยืนยัน</button>
            </form>
        </div>
    </div>
  </div>
<br>
@endsection

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
@section('custom_script')
<script>
    bottom_now(7);

    var a = "{{Session::get('success')}}";
      if (a) {
          Swal.fire({
              text : a,
              confirmButtonColor: "#fc684b",
          })
      }

</script>
@endsection
