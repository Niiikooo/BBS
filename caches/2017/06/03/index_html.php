<!DOCTYPE html>
<html>
<head>
	<title>BBS</title>
	<meta charset="utf-8" >
	
	<link rel="stylesheet" type="text/css" href="../../public/css/bootstrap.min.css"> 
	<link rel="stylesheet" type="text/css" href="../../public/css/base.css"> 
	<link rel="stylesheet" type="text/css" href="../../public/css/index.css">
	
	
</head>
<body>         
	<div id="container">
		<div id="header">
			<div class="header_top">
				<ul class="header_ul">
					<li><a href="#">设为首页</a></li>
					<li><a href="#">收藏本站</a></li>
				</ul>
			</div>
			<div class="header_down">
				<img src="img/logo.jpg" alt="logo">
				<!-- 未登录模块 -->
				<div class="header_right visitor" style="">
				<form action="<?=$login;?>" method="post">
				<ul>
					<li><label for="username">用户名</label></li>
					<li><input type="text" name="username" style="" id="username" class="form-control"></li>
					<li><input type="radio" id="autoLogin"  class="check"><label for="autoLogin">自动登录</label></li>
					<div class="clr"></div>
					<li style="" class="input_pass"><label for="password" >密码</label></li>
					<li><input type="password" name="password" id="password" style="" class="form-control"></li>
					<li><button type="submit" class="btn btn-xs" style="width:60px">登录</button></li>
				</ul>
				</form>
				<div class="header_right_r">
					<div><a href="#">找回密码</a></div>
					<div><a href="#">立即注册</a></div>
				</div>
				</div>
				<!-- 结束 -->
		
				<!-- 已登录模块开始 -->
				<div class="header_right_admin">
				<img src="../../public/img/logo.jpg" style="float: right">
				<ul class="admin_l" style="float:right">
					<li style="width: 200px;text-align:right"><?=$_SESSION['username'];?><span class="pipe">|</span></li>
					<li><button>签到</button><span class="pipe">|</span></li>
					<li>我的<span class="pipe">|</span></li>
					<li>设置<span class="pipe">|</span></li>
					<li>消息<span class="pipe">|</span></li>
					<li>提醒<span class="pipe">|</span></li>
					<li>退出</li>

					<div class="clr"></div>
				<ul class="admin_r">
					<li>积分：<span class="pipe">|</span></li>
					<li>用户组：</li>
					</ul>
				</ul>
				<div class="" style="float: right;">
					
				</div>
				</div>
				<!-- 已登录模块结束 -->
				
				<div class="clr"></div>
			</div>


		</div>
		<div class="clr"></div>
		<div id="search">
			<div class="search_top">
				<ul class="">
					<a href="#"><li style="" class="search_sy">首页</li></a>
					<li class="dn"></li>
					<a href="#"><li style="" class="search_js">PHP技术交流</li></a>
					<li class="dn"></li>
					<a href="#"><li style="" class="search_cx">程序人生</li></a>
				</ul>
			</div>
			<div class="search_down">
				
					<form action="serach.php" method="get">
						<a href="#"><div class="glass"></div></a>
						<div class="glass_search"><input type="text" name="search" class="search_input"></div>
						<div class="sh">
							<button type="submit">搜索</button>
						</div>
						<ul style="" class="search_ul">
							<li>热搜：</li>
							<li><a href="#">活动</a></li>
							<li><a href="#">交友</a></li>
							<li><a href="#">教程</a></li><div class="clr"></div>
						</ul>
						<div class="clr"></div>
					</form>
					<div class="path ">
						<ol class="breadcrumb" >
						<li class="home"></li>
						<!-- <ul class="path_a"> -->
						<li><a href="#">论坛</a></li>

							
						<!-- </ul> -->
						</ol>
<!-- 						<div class="clr"></div>
 -->						<ul class="chart">
							<li></li>
							<li>帖子<span class="pipe">|</span></li>
							<li>会员<span class="pipe">|</span></li>
							<li>欢迎新会员</li>
						</ul>
						<div class="clr"></div>
					</div>
				
			</div>
		</div>
		<div class="clr"></div>
		<div id="main">
			<!-- 主体分块 大板块开始 -->
			<!-- 添加循环语句 -->
			<div class="main">
			<!-- <?php var_dump($data);?> -->
			<?php var_dump(isset($_GET['bigid']));?>
			<?php foreach($data as $key => $value):?>
				<?php if(isset($_GET['bigid'])):?>
				<?php 
					$id = $_GET['bigid'];
					if($key!=$bigid[1]['cid']){
					
				}	
				?>

				


				<?php else: ?>
				<div class="main-mod">
				<div class="navnav"><span><a href="#"><?=$key;?></a></span></div>
				<div class="clr"></div>
				<!-- 一个小版块 -->
				<?php foreach($value as $k => $v):?>
				<div class="main-mod-main">
					<div class="mod-left">
						<a href="#"><img src="img/forum.gif" alt=""></a>
						<p><a href="#"><?=$v['classname'];?></a><br/>版主：<?=$v['compere'];?></p>

					</div>

					<div class="mod-right">
						<div class="r1"><p>10/9</p></div>
						<div class="r2"><p><a href="#">本论坛超管的账号、密码都为admin</a><br />2015-10-08 10:49:55 admin</p></div>
						<div class="clr"></div>
					</div>
					<div class="clr"></div>
					<div class="sigline"></div>
				</div>
				
				<div class="clr"></div>
				<?php endforeach;?>
				<!-- 小版块完 -->
				
				
				

				</div>
				<?php endif;?>
			<?php endforeach;?>
			</div>
			<!-- end of main-mod 大板块 -->
			<!-- 第二个板块开始 -->
			
				<!-- 一个小版块 -->
				
			<!-- 第二个板块结束 -->

			<!-- 底部版块 -->
			<div class="main_bottom">
				<div class="mod-left bottom_left">
					<a href="#"><img src="img/logo_88_31.gif" alt=""></a>
					<p><a href="#">官方论坛</a><br/>提供最新 Discuz! 产品新闻、软件下载与技术交流</p>
				</div>
				<div class="clr"></div>
				<div class="sigline"></div>
				<div class="b_ul">
					<ul>
						<li><a href="#">百度</a></li>
						<li><a href="#">漫游平台</a></li>
						<li><a href="#">YESWAN</a></li>
						<li><a href="#">我的领地</a></li>
					</ul>
				</div>
			</div>

		</div>
		<div id="footer">
			<div class="f_l">
				<p>Powered by <span><a href="#">phpxy</a></span> V2<br />© 2017 <a href="#">phpxy Inc.</a></p>
			</div>
			<div class="f_r">
				<p><a href="#">&nbsp;&nbsp;&nbsp;京ICP备 89273号</a>|<a href="#">phpxy</a><br/>Time Now Is: 05-13 02:55</p>
			</div>
		</div>






	</div>



</body>
</html>