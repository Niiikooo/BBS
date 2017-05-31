
<!-- 帖子和分页 -->

<div>
	<?php $page = 10;$pages = 30;$next = $page+1;$pre = $page -1;?>
	<!-- 上分页 -->
	<button>发帖</button>
	<ul>
		<li><a href="?page='.<?$page?>">返回</a></li>
		<li><a href="?page=<?=$pre?>">上一页</a></li>
		
	<?php 
	// 如果页数小于等于4
	if($pages<'4'){
		for($i=1;$i<=$pages;$i++){
			echo "<li><a href='?page=$i'>".$i.'</a></li>';
		}
	}
	// 如果页数大于4
	else{
		if($page==1){
			for($i=1;$i<4;$i++){
				echo "<li><a href='?page=$i'>".$i.'</a></li>';
			}

		}else{
			echo '<li><a href="?page=1">1...</a></li>';
		
			for($i=$page-1;$i<$page+2;$i++){
				echo "<li><a href='?page=$i'>".$i.'</a></li>';
			}
			if($page<$pages-1){
				echo "<li><a href='?page=$pages'>...".$pages.'</a></li>';
		}}
	}
	?>
		<li><a href="?page=<?=$next?>">下一页</a></li>
	</ul>
	<!-- 帖子内容 -->
	

	<!-- 下分页 -->
</div>
