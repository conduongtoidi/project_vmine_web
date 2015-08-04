<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="style.css" />
<link href="css/baokim.css" rel="stylesheet">
<link href="logo/icon.png" rel="shortcut icon" type="image/x-icon" />

<title>VmineMC</title>
<script src="js/jsmin.js"></script>
<script src="js/bootstrap.js"></script>
<script>
	$(document).ready(function(){
    $(".form-control").tooltip({ placement: 'right'});
});
</script>
<script language="javascript">
//window.onload = function(){
// setTimeout("switchImage()", 3000);
//}
//var current = 1;
//var numIMG = 2; // max count cua hinh game
//function switchImage(){
//current++;
 // Thay thế hình
// document.images['myimage'].src ='anhgame/hinh' + current + '.png';
 // Gọi lại hàm nếu thõa đk
//if(current == numIMG){current =0;}
//setTimeout("switchImage()", 3000);

//}
</script>
</head>
<body>
<header>
  <p class="logo"><span class="logo">Một số lưu ý khi nạp thẻ: </span></p>
    <ol>
    <li>Sử dụng Points để nâng cấp Vip cũng như mua các vật phẩm cao cấp trong Server.</li>
    <li>Sau khi nap tiền thành công, Points sẽ tự động được cập nhật, dùng lệnh /p me để kiểm tra.</li>
    <li>Gặp sự cố nạp thẻ vui lòng liên hệ theo thông tin hỗ trợ bên dưới</li>
    <li>Mệnh giá q40 đổi xem ở bảng dưới</li>
    </ol>
    <span class="logo"><img src="anhgame/quy doi.png"></span>
</header>
<section>
  <div id="header">
    <div id="logo">
      <p class="logo">&nbsp;</p>
    </div>
    <div id="menu">
      <ul>
        <li><a href="index.html">Diễn đàn</a></li>
        <li><a href="index.html">Danh sách staff</a></li>
        <li><a href="napthe.php">Nạp thẻ</a></li>
        <li><a href="index.html">Trang chủ</a></li>
      </ul>
    <span class="logo"><img src="logo/logo.png" width="153" height="51"></span></div>
  </div>
  <nav>
<div class="container"> 
	<form class="form-horizontal form-bk" role="form" method="post" action="transaction.php">
	<h2 class="form-control-heading"> Nạp thẻ</h2>
<div class="form-group">
    <label for="txtpin" class="col-lg-2 control-label">Loại thẻ</label>
    <div class="col-lg-10">
      <select class="form-control" name="chonmang">
		  <option value="VIETEL">Viettel</option>
		  <option value="MOBI">Mobifone</option>
		  <option value="VINA">Vinaphone</option>
		  <option value="GATE">Gate</option>
		  <option value="VTC">VTC</option>
		  <option value="VNM">Vietnamobile</option>
		</select>
    </div>
  </div>

  <div class="form-group">
    <label for="txtpin" class="col-lg-2 control-label">Tài khoản</label>
    <div class="col-lg-10">
      <input type="text" class="form-control" id="txtuser" name="txtuser" />
    </div>
  </div>
  <div class="form-group">
    <label for="txtpin" class="col-lg-2 control-label">Mã thẻ</label>
    <div class="col-lg-10">
      <input type="text" class="form-control" id="txtpin" name="txtpin" placeholder="Mã thẻ" data-toggle="tooltip" data-title="Mã số sau lớp bạc mỏng"/>
    </div>
  </div>
  <div class="form-group">
    <label for="txtseri" class="col-lg-2 control-label">Số seri</label>
    <div class="col-lg-10">
      <input type="text" class="form-control" id="txtseri" name="txtseri" placeholder="Số seri" data-toggle="tooltip" data-title="Mã seri nằm sau thẻ">
    </div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-primary" name="napthe">Nạp thẻ</button>
    </div>
  </div> 
</form>
  </nav>
  <article>
    <ul>
      <li><a href="https://www.facebook.com/bongbongmattroi2025?fref=ts"> <img src="logo/facebook.png" width="100" height="100" title="Click here"></a></li>
      <li><img src="logo/call.png" width="100" height="100" title="0988073801"></li>
      <li><a href="mailto:honmalangthang2005@gmail.com"><img src="logo/gmail.png" width="100" height="100" title="honmalangthang2025@gmail.com"></a></li>
      <li><img src="logo/garena.png" width="100" height="100" title="passwords107"></li>
    </ul>
  </article>
</section>
<footer>
  <p>Copyright 2015 by PassBl</p>
</footer>
</body>
</html>
