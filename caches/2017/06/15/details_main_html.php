	<link rel="stylesheet" type="text/css" href="../../public/css/bootstrap.min.css"> 
	<link rel="stylesheet" type="text/css" href="../../public/css/base.css"> 
	<link rel="stylesheet" type="text/css" href="../../public/css/index.css">
	<link rel="stylesheet" type="text/css" href="../../public/css/details.css">
	<link rel="stylesheet" type="text/css" href="../../public/css/list.css">

<div id="main">
	<div class="page">
	<!-- 判断是否需要登录 -->
		<a href="publish.php?cid=<?=$table['publish']['classid'];?>"><button type="button" class="btn btn-default btn-lg">发帖<span class="glyphicon glyphicon-chevron-down down"></span></button></a>
		<a href="#reply"><button type="button" class="btn btn-default btn-lg">回复</button></a>
		<!-- 分页 -->
<nav aria-label="Page navigation" id="page" style="float: right;margin-right:40px">
  <ul class="pagination">
    <li>
      <a href="/helper/compiler/details.php?tid=<?=$table['publish']['id'];?>&page=<?=$prev;?>" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <?php for($i=1;$i<$count+1;$i++):?>
    <li><a href="/helper/compiler/details.php?tid=<?=$table['publish']['id'];?>&page=<?=$i;?>"><?=$i;?></a></li>
    <?php endfor;?>
    <li>
      <a href="/helper/compiler/details.php?tid=<?=$table['publish']['id'];?>&page=<?=$next;?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
<!-- 分页结束 -->
	</div>
	<!-- 表格开始 -->
	<div class="details">
		<table class="details_table">
	<!-- 如果不是首页 -->
	<?php if($page > 1):?>
	<?php else: ?>
		<!-- 板块管理 -->
		<?php if($power == -1 || (isset($_SESSION['power']) && $table['publish']['classid'] == $_SESSION['power'])):?>
		
		<tr id="del1"><td id="del2"><a href="/helper/compiler/detailOperation.php?del=<?=$table['publish']['id'];?>">删除主题</a>&nbsp;&nbsp;<a href="/helper/compiler/detailOperation.php?istop=<?=$table['publish']['id'];?>">置顶</a>&nbsp;&nbsp;
		
		<a href="/helper/compiler/detailOperation.php?elite=<?=$table['publish']['id'];?>">精华</a><a href="/helper/compiler/detailOperation.php?ishot=<?=$table['publish']['id'];?>">高亮</a></td></tr>
		<?php elseif((isset($_SESSION['username']) && $table['publish']['username'] == $_SESSION['username'])):?>
		<tr id="del1"><td id="del2"><a href="/helper/compiler/detailOperation.php?del=<?=$table['publish']['id'];?>">删除主题</a></td></tr>
		
		<?php endif;?>
		<!-- 管理结束 -->
			<tr><th class="d_t_view">查看：<?=$table['publish']['hits'];?>&nbsp;&nbsp;&nbsp;回复：<?=$table['publish']['replycount'];?></th><th class="title"><?=$table['publish']['title'];?></th></tr>
			<tr id="details_1"><td class="d_t_view"><?=$table['publish']['username'];?></div></td><td>
				<!-- <div class="sigline details_sigline"></div> -->
				<div class="fl">
				&nbsp;&nbsp;&nbsp;发表于：<?=$table['publish']['addtime'];?>
				</div><form action="/helper/compiler/jump.php" method="post">
				<div class="fr">楼主&nbsp;&nbsp;电梯直达：&nbsp;&nbsp;&nbsp;
				
				<input type="text" name="elevator" class="form-control">&nbsp;&nbsp;<a href="helper/compiler/jump.php">
				<input type="hidden" name="tid" value="<?=$table['publish']['id'];?>">
				<input type="submit" class="btn btn-default elevator" value="" style="width:20px"></form></a></div>
				<div class="clr"></div>
			</td></tr>
			<tr><td class="bor_none">
				<div>
					<img src="/public/img/logo.jpg" alt="头像" class="user_logo">
					<div>					
					<div class="d_D">
						<div class="d_dl"><p class="gold"><?=$user['tcount'];?></p><p>帖子</p></div>
						<div class="d_dl"><p class="gold"><?=$user['rewardscore'];?></p>经验</div>
						<div class="d_dl"><p class="gold"><?=$user['gold'];?></p>金币</div>
						
					</div></div>
					<div class="d_D"><div class="clr"></div>
					<div class="d_dl d_g"><?=$table['publish']['groupName'];?></div></div>
					<div class="clr"></div>
					<div class="d_D"><div class="clr"></div>
					<div class="d_dl d_g"><img src="/public/img/new_pm.gif" alt="">发消息</div></div>
					
				</div>
			</td><td class="d_content">
			<div>
			<?=$payment;?>
			</td>
			</div>
			</tr>
			<tr><td></td><td></td></tr>
			<div class="clr"></div>
	<?php endif;?>

			<!-- 回复部分开始 -->
			<?php if($table['reply']==false):?>
			<?php else: ?>
			
			<?php foreach($table['reply'] as $key => $value):?>
			<tr style="width: 961px;" id="details_<?=$key+2;?>"><td class="d_t_view"><?=$value['username'];?></td><td>
				<!-- <div class="sigline details_sigline"></div> -->
				<div class="fl">&nbsp;&nbsp;&nbsp;
				发表于：<?=$value['addtime'];?>
				</div>
				<form action="/helper/compiler/jump.php" method="post">
				<div class="fr">
				<!-- 沙发 -->
				<?php if($key == 0):?>
				沙发
				<?php elseif($key == 1):?>
				板凳
				<?php elseif($key == 2):?>
				地下室
				<?php endif;?>
				<!-- /沙发 -->

				&nbsp;&nbsp;电梯直达：&nbsp;&nbsp;&nbsp;<input type="text" name="elevator" class="form-control">&nbsp;&nbsp;
				<input type="hidden" name="tid" value="<?=$table['publish']['id'];?>">
				<input type="submit" class="btn btn-default elevator" value="" style="width:20px"></div></td></tr></form>
				<div class="clr"></div>
			</td></tr>
			<tr><td class="bor_none">
				<div>
					<img src="/public/img/logo.jpg" alt="头像" class="user_logo">
					<div>					
					<div class="d_D">
						<div class="d_dl"><?=$value['tcount'];?><br>帖子</div>
						<div class="d_dl"><?=$value['rewardscore'];?><br>经验</div>
						<div class="d_dl"><?=$value['gold'];?><br>金币</div>
						
					</div></div>
					<div class="d_D"><div class="clr"></div>
					<div class="d_dl d_g"><?=$table['publish']['groupName'];?></div></div>
					<div class="clr"></div>
					<div class="d_D"><div class="clr"></div>
					<div class="d_dl d_g"><img src="/public/img/new_pm.gif" alt="">发消息</div></div>
					
				</div>
			</td><td class="d_content"><?=$value['content'];?></td></tr>
			<tr><td></td><td></td></tr>
			<div class="clr"></div>
			<?php endforeach;?>
			<?php endif;?>
			<!-- 回复部分结束 -->
		</table>
		
		<div class="clr"></div>
	</div>
	<!-- 表格结束 -->
	<div class="page">
		<a href="publish.php?cid=<?=$table['publish']['classid'];?>"><button type="button" class="btn btn-default btn-lg">发帖<span class="glyphicon glyphicon-chevron-down down"></span></button></a>
		<a href="#reply"><button type="button" class="btn btn-default btn-lg">回复</button></a>
				<!-- 分页 -->
<nav aria-label="Page navigation" id="page" style="float: right;margin-right:40px">
  <ul class="pagination">
    <li>
      <a href="/helper/compiler/details.php?tid=<?=$table['publish']['id'];?>&page=<?=$prev;?>" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <?php for($i=1;$i<$count+1;$i++):?>
    <li><a href="/helper/compiler/details.php?tid=<?=$table['publish']['id'];?>&page=<?=$i;?>"><?=$i;?></a></li>
    <?php endfor;?>
    <li>
      <a href="/helper/compiler/details.php?tid=<?=$table['publish']['id'];?>&page=<?=$next;?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
<div class="clr"></div>
<!-- 分页结束 -->
	</div>

</div>
<div class="clr"></div>
<div class="reply" id="reply">
	<div class="r_t">
		<img src="<?=$_SESSION['picture'];?>" alt="头像">
	</div>
	
	<div class="editor">
	<form action="/helper/compiler/reply_verify.php?tid=<?=$_GET['tid'];?>" method="post">
		<script id="editor" name="content" type="text/plain">
	    </script>
	    <div class="clr"></div>
	    <input type="text" hidden value="<?=$_GET['tid'];?>" name="tid">
	
	</div>
	<input class="btn btn-default" type="submit" value="提交"></form>
	<div class="clr"></div>
	
	
    

    <script type="text/javascript">
        var ue = UE.getEditor('editor',{
        	 toolbars:[
        	['fullscreen', 'source', 'undo', 'redo','bold', 'italic', 'underline','snapscreen','horizontal', '|','fontborder', 'strikethrough', 'superscript']
        ]
        });
       
    </script>

</div>