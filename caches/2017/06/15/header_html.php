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
				<form action="<?php echo '/helper/compiler/login_verify.php?'.mt_rand() ;?>" method="post">
				<ul>
					<li><label for="username">用户名</label></li>
					<li><input type="text" name="username" style="" id="username" class="form-control"></li>
					<li><input type="radio" id="autoLogin"  class="check" name="auto" value="1"><label for="autoLogin">自动登录</label></li>
					<div class="clr"></div>
					<li style="" class="input_pass"><label for="password" >密码</label></li>
					<li><input type="password" name="password" id="password" style="" class="form-control"></li>
					<li><button type="submit" class="btn btn-xs" style="width:60px">登录</button></li>
				</ul>
				</form>
				<div class="header_right_r">
					<div><a href="/helper/compiler/findpwd.php">找回密码</a></div>
					<div><a href="/helper/compiler/reg.php">立即注册</a></div>
				</div>
				</div>
				<!-- 结束 -->
		
				<!-- 已登录模块开始 -->
				<div class="header_right_admin">
				<a href="/helper/compiler/home.php"><img src="<?=$_SESSION['picture'];?>" style="float: right"></a>
				<ul class="admin_l" style="float:right">
					<li style="width: 200px;text-align:right;margin-left:145px"><?=$_SESSION['username'];?><span class="pipe">|</span></li>
					<li><a href="/checkdaily.php?uid=<?=$_SESSION['uid'];?>"><button>签到</button></a><span class="pipe">|</span></li>
					<li><a href="/helper/compiler/home.php">我的</a><span class="pipe">|</span></li>

					<li><a href="<?php echo TPL_PHP ;?>logout.php">退出</a></li>

					<div class="clr"></div>
				<ul class="admin_r">
				<?php if($_SESSION['power'] == -1):?>
					<li><a href="/admin/adminIndex.php">管理中心</a><span class="pipe">|</span></li>
				<?php endif;?>
					<li>积分：<?=$_SESSION['rewardscore'];?> 距离下一等级积分：<?php $left = $_SESSION['rewardscore']%20;
					if ($left == 0){
						$left = 20;
					}
					echo $left;?><span class="pipe">|</span></li>
					<li>用户等级：<?php if(isset($_SESSION['level'])):?><?=$_SESSION['level'];?><?php endif;?><span class="pipe">|</span></li>
					<li>用户组：<?=$_SESSION['group'];?></li>
					</ul>
				</ul>
				<div class="" style="float: right;">
					
				</div>
				</div>
				<!-- 已登录模块结束 -->
				
				<div class="clr"></div>
			</div>
</div>
<div id="search">
			<div class="search_top">
				<ul class="">
				<a href="/index.php?cid=0"><li class="search_sy">首页</li></a>
					<li class="dn"></li>
				<?php foreach($pid as $key => $value):?>
					
					<a href="/index.php?cid=<?=$key;?>"><li class="search_js"><?=$value;?></li></a>
					<li class="dn"></li>
					<!-- <a href="#"><li class="search_cx">程序人生</li></a> -->
				<?php endforeach;?>
				</ul>
			</div>
			<div class="clr"></div>
			<div class="search_down">
				
					<form action="/helper/compiler/search.php" method="post">
						<div><a href="#"><div class="glass"></div></a></div>
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
			<!-- 导航条开始 -->
			<div class="clr"></div>
					<div class="path">
						<ol class="breadcrumb" >
							<li class="home"><a href=""></a></li>
							<!-- <ul class="path_a"> -->
							<li><a href="/index.php">论坛</a></li>
							
							<?php foreach($breadcrumb as $key => $value):?>		
							<?php if($key == 'classname'):?>
								<?php foreach($value as $k => $v):?>
								<li><a href="/helper/compiler/list.php?cid=<?=$k;?>"><?=$v;?></a></li>
								<?php endforeach;?>
								<?php continue ;?>
							<?php endif;?>
							<?php if($key == 'tid'):?>
								<?php foreach($value as $k => $v):?>
								<li><a href="/helper/compiler/details.php?tid=<?=$k;?>"><?=$v;?></a></li>
								<?php endforeach;?>
								<?php break ;?>
							<?php endif;?>			
							<li><a href="/index.php?cid=<?=$key;?>"><?=$value;?></a></li>
							<?php endforeach;?>
							<div class="clr"></div>
						</ol>
						<div class="clr"></div>

					</div>
			<!-- 导航条结束 -->
				
			</div>
</div>
<div class="clr"></div>
