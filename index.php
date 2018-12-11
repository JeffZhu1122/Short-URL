<?php
/*
5A防红 v4.2 ©天宇网络
*/

include("./includes/common.php");
?>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
<title>Jeff域名防红工具-QQ微信短链接</title>
<meta name="keywords" content="防红，防红跳转短链接，QQ绿标，GZ防红，QQ短链接，防红工具，域名防红，微信防红">
<meta name="description" content="防红工具，全网最好用的短链接生成网站！">

<link rel="shortcut icon" href="https://www.jeffscode.com/" />
<link rel="stylesheet" href="https://css.letvcdn.com/lc04_yinyue/201612/19/20/00/bootstrap.min.css">
<style type="text/css">
.row{margin-top:120px}.page-header{margin-bottom:40px}.expand-transition{-webkit-transition:all .5s ease;transition:all .5s ease}.expand-enter,.expand-leave{opacity:0}
@media (max-width:768px){.h3-xs{font-size:20px}.row-xs{margin-top:80px}}
.modal{display:block}
.alert.top{position:fixed;top:30px;margin:0 auto;left:0;right:0;width:50%;z-index:1050}@media (max-width:768px){.alert.top-xs{width:80%}}
.en-markup-crop-options{top:18px!important;left:50%!important;margin-left:-100px!important;width:200px!important;border:2px rgba(255,255,255,.38) solid!important;border-radius:4px!important}.en-markup-crop-options div div:first-of-type{margin-left:0!important}
</style>
</head>
<body>
</br>
<div class="container">
	<div class="header">
		<ul class="nav nav-pills pull-right" role="tablist">
			<li role="presentation"><a href="http://wpa.qq.com/msgrd?v=3&uin=2937119735&site=qq&menu=yes">联系站长</a></li>
          <li role="presentation"><a href="1.php">免费API</a></li>
		</ul>
<div id="app" class="container">
	<div class="alert top top-xs alert-dismissible alert-danger expand-transition" style="display:none" id="error-tips">
	</div>
	<div class="row row-xs">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-10 col-xs-offset-1 col-sm-offset-3 col-md-offset-3 col-lg-offset-3">
			<div class="page-header">
				<h3 class="text-center h3-xs">Jeff域名防红工具</h3>
			</div>
<span style="color:#436EEE" align="center" ><marquee behavior="scroll"><strong>
 Jeff防红成立于2016年7月份到目前已稳定正常运行2年，GZ防红已免费为用户提供了365192次防红服务请求。 免费为3682个网站商提供了稳定的防红接口！
   </strong>
   </marquee>
   </span>


			<div class="form-group" id="input-wrap">
				<label class="control-label" for="inputContent">请输入网址:</label><input type="text" id="inputContent" class="form-control" placeholder="不带http：//">
			</div>
			<div class="text-right">
				<div class="input_group_addon btn btn-primary" id="shortify" onclick="checkUrl(document.getElementById('inputContent').value)">生成一下</div>
			</div>
		</div>
		<div class="modal expand-transition" id="result-wrap" style="display:none">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" onclick="closeWrapper()" aria-hidden="true">×</button>
						<h4 class="modal-title">生成成功！</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<input type="text" class="form-control" id="gen_result_url" value="">
						</div>
					</div>
					<div class="modal-footer">
						<a target="_blank" id="preViewBtn" href=""><button type="button" class="btn btn-success">点击预览</button></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div>
</div>
		<script>
		function sendAJAX(hasHttp) {
			var xhr = new XMLHttpRequest();
			xhr.onreadystatechange = function () {
				if (xhr.readyState === 4) {

					if(xhr.status===200){
						var result = JSON.parse(xhr.responseText);
						if (result.code == 1) {
							var resultWrap = document.getElementById('result-wrap');
							resultWrap.style.display = 'block';
							var preViewBtn = document.getElementById('preViewBtn'),
								genResultUrl = document.getElementById('gen_result_url');
							/*location.protocol + "//" + location.host + "/" +*/
							preViewBtn.setAttribute('href', result.ae_url);
							genResultUrl.value = result.ae_url;
						} else {
							msgAlert('返回错误或当前域名在黑名单中')
						}
					}else{
							msgAlert('返回错误或当前域名在黑名单中')
					}	
				}
			};
			var urlVal = document.getElementById('inputContent').value;
			var urlParam = hasHttp?urlVal:location.protocol+'//'+urlVal;
			xhr.open('GET', './dwz.php?longurl=' + encodeURIComponent(urlParam));
			xhr.send();
		}

		function msgAlert(txt,input) {
			var tips = document.getElementById('error-tips');
			tips.style.display = "block";
			tips.innerHTML = txt;
			input&&(document.getElementById('input-wrap').classList.add('has-error'))
			setTimeout(function () {
				tips.style.display = 'none';
			}, 3000)
		}
		function closeWrapper(){
			document.getElementById('result-wrap').style.display='none'
		}
		function checkUrl(text) {
			var hasHttp = /^([hH][tT]{2}[pP]:\/\/|[hH][tT]{2}[pP][sS]:\/\/)\w+([-.]\w+)*\.\w+([-.]\w+)*/.test(text),
				notHasHttp = /^\w+([-.]\w+)*\.\w+([-.]\w+)*/.test(text);
			if (!hasHttp&&!notHasHttp) {
				msgAlert('输入的url有误，请重新输入!',true);
			} else {
				document.getElementById('input-wrap').classList.remove('has-error')
				sendAJAX(hasHttp);
			}
		}
</script>

<br>






<center>
<a href="http://wpa.qq.com/msgrd?v=3&uin=2937119735&site=qq&menu=yes" class="btn btn-primary btn-sm"> 联系客服</a>
<a href="https://url.jeffscode.com/1.php" class="btn btn-default btn-sm"> API接口</a>
<a href="https://jq.qq.com/?_wv=1027&k=5IYzyH0" class="btn btn-warning btn-sm"> 加入我们</a>
</center>

<hr>
<div style="text-align:center;color:#888;">免责声明：本站永久免费! 短网址均由用户生成，所跳转网站内容均与本站无关!<br>
            © 2018 Jeff防红工具 All right reserved. 
			<br>适用于个人博客，轻装简便，外链跳转、网址变换、网址缩短。</div>
<div>

<?php
if(!file_exists("config.php"))
{
	echo "<script>\nalert('请先安装！');\nwindow.location.href='install.php';</script>";
	exit;
}

$targeturl = $_POST['url'];

if(!preg_match('/\b((?#protocol)https?|ftp):\/\/((?#domain)[-A-Z0-9.]+)((?#file)\/[-A-Z0-9+&@#\/%=~_|!:,.;]*)?((?#parameters)\?[-A-Z0-9+&@#\/%=~_|!:,.;]*)?/i', $targeturl))
{
	$rem = false;
}
else
{
	$rem = true;
}

include("config.php");
if($rem == false)
{
?>


<?php
}
?>		

</body>
</html>
