<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title></title>
</head>
<body>
	
	<input type="button" name="photo" id="photo" value="test一下" />
	<img src="" id="show_img"/>
	
</body>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script>
  wx.config({
    debug: false,
    appId: '<?php echo $signPackage["appId"];?>',
    timestamp: <?php echo $signPackage["timestamp"];?>,
    nonceStr: '<?php echo $signPackage["nonceStr"];?>',
    signature: '<?php echo $signPackage["signature"];?>',
    jsApiList: [
		'chooseImage', 'uploadImage'
    ]
  });
  wx.ready(function () {
    // 在这里调用 API
	$("#photo").click(function(){	
	wx.chooseImage({
		success: function (res) {
			var localIds = res.localIds; 			  
			  wx.uploadImage({
				localId: localIds[0], 
				isShowProgressTips: 1, 
				success: function (res) {
					var serverId = res.serverId; 					
					 $.post("wxapi.php/welcome/response",{srx:serverId},function(result){
						if(result.status>0){
							alert('load success');
						}
					  });						
				}
			 });			  
		}
		});
	});
  });
</script>
</html>