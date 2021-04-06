<?php
	$prelanding = array('index2.html','index1.html');
	shuffle($prelanding);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" name="viewport"/>
		<script src="js/jquery-1.12.4.min.js" type="text/javascript"></script>
		<link href="css/style.css" rel="stylesheet" type="text/css">
		<meta property="og:type" content="website"/>
		<meta property="og:title" content="Tiền sẽ 1uôn 1uôn dồi dào nếu cất thứ này trong nhà "/>
		<meta property="og:description" content="Vì sao một số người luôn giàu có? Bí mật của họ là gì? Câu trả lời ở đây! "/>
		<meta property="og:image" content="img/post1.jpg"/>
		<meta property="og:image:width" content="783"/>
		<meta property="og:image:height" content="489"/>
		<meta property="og:site_name" content="Tiền sẽ 1uôn 1uôn dồi dào nếu cất thứ này trong nhà "/>
	</head>
	<body>
		<img src="https://www.facebook.com/tr?id=343258562677396&ev=PageView" height="1" width="1" style="display:none"/>
		<div class="mediabox">
			<div class="option_tile">
				VUI LÒNG CHỌN NGÔN NGỮ
			</div>
			<div class="option_flag">
				<div class="vietnamese goto">
					<img src="img/vn_flag.jpg" />
					<span>Tiếng Việt</span>
				</div>
				<div class="english goto">
					<img src="img/uk_flag.jpg" />
					<span>English</span>
				</div>
			</div>
			<div class="thankyou">
				CẢM ƠN BẠN ĐÃ GHÉ THĂM!
			</div>
		</div>
	</body>
	<script type="text/javascript">
			jQuery(function($) {
				$('.goto').on('click',function() {
					let randLink = '<?php echo $prelanding[0]?>';
					window.location.href = randLink;
				});
			});
	</script>
</html>