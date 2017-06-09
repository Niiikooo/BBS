<div id="header">
			<div class="header_top">
				<ul class="header_ul">
					<li><a href1="#">设为首页</a></li>
					<li><a href="#">收藏本站</a></li>
				</ul>
			</div>
			<div class="header_down">
				<a href="/index.php"><img src="/public/img/logo.jpg" alt="logo"></a>
				<!-- 未登录模块 -->
				<div class="header_right visitor" style="">
				<form action="<?php echo '?'.mt_rand() ;?>" method="post">
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
				<img src="<?php echo TPL_IMG ;?>logo.jpg" style="float: right">
				<ul class="admin_l" style="float:right">
					<li style="width: 200px;text-align:right"><?=$_SESSION['username'];?><span class="pipe">|</span></li>
					<li><button>签到</button><span class="pipe">|</span></li>
					<li>我的<span class="pipe">|</span></li>
					<li>设置<span class="pipe">|</span></li>
					<li>消息<span class="pipe">|</span></li>
					<li>提醒<span class="pipe">|</span></li>
					<li><a href="<?php echo TPL_PHP ;?>logout.php">退出</a></li>

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