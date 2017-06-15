
<!DOCTYPE html>
<html>
<head>
	<title>帖子</title>
	
	<link rel="stylesheet" type="text/css" href="../../public/css/base.css"> 
	<link rel="stylesheet" type="text/css" href="../../public/css/bootstrap.min.css"> 
	<link rel="stylesheet" type="text/css" href="../../public/css/index.css">
	<link rel="stylesheet" type="text/css" href="../../public/css/list.css">
</head>
<body>
	<div id="container">
		<?php display('header.html',compact('pid','breadcrumb')) ;?>	
			<!-- 主体部分开始 -->
			<div class="list" style="overflow: hidden;">
<!-- 左侧导航栏 -->
	<div class="list_nav">
		<div class="list_n_h page-header"><h3>版块导航</h3></div>
		<!-- 开始遍历 -->
		<?php foreach($data as $key => $value):?>

		<ul class="nav nav-pills nav-stacked list_n_m">
		
			<li role="presentation" class="active"><a href="/index.php?cid=<?=$value[0]['parentid'];?>"><?=$key;?></a></li>
			<?php if($value):?>
			<?php foreach($value as $k => $v):?>
			<li role="presentation"><a href="/helper/compiler/list.php?cid=<?=$v['cid'];?>"><?=$v['classname'];?></a></li>
			<?php endforeach;?>
			<?php endif;?>
			<!-- <li role="presentation"><a href="#">开源产品</a></li>
			<li role="presentation"><a href="#">进阶讨论</a></li>
			<li role="presentation"><a href="#">进阶讨论</a></li>
			<li role="presentation"><a href="#">进阶讨论</a></li> -->
		</ul>
		<?php endforeach;?>
		<!-- 结束遍历 -->
		
		<div class="clr" style="clear: both"></div>
		<div style="clear:both"></div>

	</div>
	<!-- 导航栏结束 -->
	 <!-- 右侧开始 -->
	<div class="list_r">
	 	<!-- 右侧上部开始 -->
		<div class="list_r_h">
			<p><?=$bmdata['cidname'];?> 今日：<?=$bmdata['listToday'];?><span class="pipe">|</span>主题：<?=$bmdata['detailsNum'];?></p>
			<p>版主：<?php foreach($bmdata['bmName'] as $key => $value):?>
				<?=$value;?>&nbsp;&nbsp;&nbsp;&nbsp;
			<?php endforeach;?>
			</p>
		</div>
		<div>
			<a href="<?=$publish;?>?cid=<?=$_GET['cid'];?>"><button type="button" class="btn btn-default btn-lg">发帖<span class="glyphicon glyphicon-chevron-down down"></span></button></a>
			<button type="button" class="btn btn-default btn-lg">返回</button>

	<!-- 分页开始 -->
<nav aria-label="Page navigation" id="page" style="float: right;margin-right:40px">
  <ul class="pagination">
    <li>
      <a href="/helper/compiler/list.php?cid=<?=$newDetails[0]['classid'];?>&page=<?=$prev;?>" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <?php for($i=1;$i<$count+1;$i++):?>
    <li><a href="/helper/compiler/list.php?cid=<?=$newDetails[0]['classid'];?>&page=<?=$i;?>"><?=$i;?></a></li>
    <?php endfor;?>
    <li>
      <a href="/helper/compiler/list.php?cid=<?=$newDetails[0]['classid'];?>&page=<?=$next;?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
<!-- 分页结束 -->
			<!-- <button type="button" class="btn btn-default btn-lg">返回</button> -->
		</div>
		<div class="clr" style="clear:both"></div>
			 	<!-- 右侧上部结束 -->

	 	<!-- 右侧下部开始 -->
		<div class="panel panel-default list_r_b">
			<table class="table list_table">
			<!-- 表头 -->

				<tr><th class="l_t">筛选：<a href="/helper/compiler/list.php?cid=<?=$_GET['cid'];?>&select=0">全部</a><span class="pipe">|</span><a href="/helper/compiler/list.php?cid=<?=$_GET['cid'];?>&select=1">精华</a></th><th class="l_t">作者</th><th class="l_t">回复/查看</th><th class="l_t">最新回复时间</th></tr>
				<tr></tr>
				<!-- 主体 -->
				<?php if($newDetails == null):?>
		
				<?php else: ?>

				<?php foreach($newDetails as $key => $value):?>
				<tr><td class="l_t" id="<?php if($value['ishot'] == 1):?>ishot<?php endif;?>""><a href="/helper/compiler/details.php?tid=<?=$value['id'];?>"><?=$value['title'];?></a>
			<!-- 如果是精华帖加上标志 -->
				<?php if($value['elite'] == 1):?>
				<img src="/public/img/digest_1.gif">
				<?php endif;?>
				<!-- 结束 -->
			<!-- 如果有售价标上价格 -->
				<?php if($value['rate']!=0):?>
				- [售价 <?=$value['rate'];?> 金钱]
				<?php endif;?>
			<!-- 结束 -->
				</td><td class="l_t"><?=$value['username'];?></td><td class="l_t"><?=$value['replycount'];?>/<?=$value['hits'];?></td><td class="l_t"><?=$value['lastpost'];?></td></tr>
				<?php endforeach;?><?php endif;?>
			
			</table>
		<div class="clr" style="clear: both"></div>
		
		</div>
		<div>
			<a href="<?=$publish;?>?cid=<?=$_GET['cid'];?>"><button type="button" class="btn btn-default btn-lg">发帖<span class="glyphicon glyphicon-chevron-down down"></span></button></a>
			<button type="button" class="btn btn-default btn-lg">返回</button>
			<!-- 分页开始 -->
<nav aria-label="Page navigation" id="page" style="float: right;margin-right:40px">
  <ul class="pagination">
    <li>
      <a href="/helper/compiler/list.php?cid=<?=$newDetails[0]['classid'];?>&page=<?=$prev;?>" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <?php for($i=1;$i<$count+1;$i++):?>
    <li><a href="/helper/compiler/list.php?cid=<?=$newDetails[0]['classid'];?>&page=<?=$i;?>"><?=$i;?></a></li>
    <?php endfor;?>
    <li>
      <a href="/helper/compiler/list.php?cid=<?=$newDetails[0]['classid'];?>&page=<?=$next;?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
			<!-- 分页结束 -->
	 	<!-- 右侧下部结束 -->
	 <!-- 右侧结束 -->
		</div>

</div>

			<!-- 主体部分结束 -->
	
		
	</div>
	<?php display('footer.html') ;?>
	</div>
</body>
</html>

