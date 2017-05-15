<?php
require_once('api/db.php');

if (empty($_SESSION)) {
	echo '你还没有登录去登录吧！';
        // sleep(3);
	header("Location:login.html");
	return false;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>登录</title>
	<!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
	<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<style>
	*{
		margin: 0;
		padding: 0;
	}
	input,textarea{
		border: 0;
		outline: none;
	}
	.navbar{
		margin-bottom: 0;
	}
	.container{
		width: 800px;
		height: 740px;
		position: relative;
		background: deepskyblue;
	}
	#box{
		position: absolute;
		overflow-y: auto;
		width: 100%;
		height: 82%;
		background: lightpink;
		top: 0;
		left: 0;
	}
	#title{
		position: absolute;
		width: 100%;
		height: 6%;
		background: lightpink;
		top: 0;
		left: 0;
	}
	#list{	
		position: absolute;
		width: 100%;
		height: 72%;
		background: lightpink;
		top: 8%;
		left: 0;
	}
	#list li,#title li{
		width: 740px;
		height: auto;
		padding: 10px;
		margin: 0 auto 15px;
		background: greenyellow;
		list-style: none;
		position: relative;
	}
	#bot{
		width: 800px;
		height: 17%;
		position: absolute;
		bottom: 0;
	}
	.sub{
		width: 60px;
		height: 25px;
		line-height: 25px;
		text-align: center;
		background: pink;
	}
	.del{
		position: absolute;
		right: 10px;
		top:50%;
		margin-top: -12px;
		width: 60px;
		height: 25px;
		line-height: 25px;
		background: red;
		color: #fff;
		text-align: center;
		border: 0;
		outline: none;
	}
</style>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">首页</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="active"><a href="#">留言板 <span class="sr-only">(current)</span></a></li>
					<li><a href="#">博客</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#">Action</a></li>
							<li><a href="#">Another action</a></li>
							<li><a href="#">Something else here</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="#">Separated link</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="#">One more separated link</a></li>
						</ul>
					</li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
					<li><a href="#">用户名：<?php
						echo $_SESSION['name'];
						?> </a></li>
						<li><a href="logout.php">退出登录</a></li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>
		<div class="container">
			<div id="box">
				<ul id="title">
					<li>
						<span>用户id</span>
						<span>用户名</span>
						<span>标题</span>
						<span>留言内容</span>
						<span>创建时间</span>
					</li>
				</ul>
				<ul id="list">
				</ul>
			</div>
			<div id="bot">
				<form id="form">
					<p>标题&nbsp;&nbsp;<input type="text" name="title" class="title" /></p>
					<textarea name="content" class="con" cols="75" rows="3"></textarea>

				</form>
				<p><input type="submit" class="sub" /></p>
			</div>
		</div>
		<script type="text/templete" id="templete">
			<li>
				<span>@userid@</span>
				<span>@username@</span>
				<span>@title@</span>
				<span>@message@</span>
				<span>@createdtime@</span>
			</li>
      		</script>
	</body>
	<script src="js/jquery.js"></script>
	<script type="text/javascript">
		var templeteStr = $("#templete").html();
		var input = '<input type = "button" class = "del" value = "删除" />';
		function templete(str, obj){
		           // 第一个return 就是返回函数的结果
		           return str.replace(/\@([a-z]+)\@/g,function(match,$1){
		           // 第二个return 是replace 必须返回的
		          		return obj[$1];
		           })
		}
		$(".sub").click(function(){
			var formdata = $("#form").serialize();
			$.ajax({
				type: "POST",
				url: "api/write.php",
				data: formdata,
				success: function(msg) {
					var data = JSON.parse(msg);
					console.log(data);
					var html = {
						userid : data.userid,
						username : data.username,
						title : data.title,
						message : data.message,
						createdtime : data.created_time
					}

					// '<li>\
					// 	<span>'+data.userid+'</span>\
					// 	<span>'+data.username+'</span>\
					// 	<span>'+data.title+'</span>\
					// 	<span>'+data.message+'</span>\
					// 	<span>'+data.created_time+'</span>\
					// 	\
					// </li>';
					
					var htmls = templete(templeteStr,html);
					$("#list").prepend(htmls);
					for(var r = 0; r< $("#list li").length; r++){
						$("#list li").eq(r).append(input);
					}
				}
			});
			
		})
		$.ajax({
			type: "POST",
			url: "api/read.php",
			success: function(msg) {
				var data = JSON.parse(msg);
				var html = "";
				var indexarr = [];
				$.each(data.message,function(index, value){
					html +=
					'<li>\
						<span>'+value.userid+'</span>\
						<span>'+value.username+'</span>\
						<span>'+value.title+'</span>\
						<span>'+value.message+'</span>\
						<span>'+value.created_time+'</span>\
						<input type="button" class="del" value="删除" />\
					</li>';
					if(value.status == 20){
						indexarr.push(index);
					}
				})
				$("#list").append(html);
				for(var i =0; i< data.message.length; i++){
					for(var j = 0; j<indexarr.length;j++){
						if( i == indexarr[j]){
							$("#list li").eq(i).css("display","none");
						}
					}
				}
				$(".del").click(function(){
					$(this).parent().css("display","none");
					var i = $(this).parent().index();
					var id = data.message[i].id;
					//console.log(data.message[i]);
					//console.log(id);
					$.get("api/update.php",{id:id});
				});
			}
			
		});
		
</script>
</html>