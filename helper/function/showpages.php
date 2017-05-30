<?php

	// 分页函数
	// 能写出来吗
	include '../../common.php';





	showpages($link,3);

	var_dump($count);
	function showpages($link,$cid){
		$data = select($link,'count(*) as count','bbs_tiezi',"where cid=$cid");
		// 帖子总数
		global $count;
		$count = $data[0]['count'];

		var_dump($count);
		// 每页个数
		$step = 3;
		// 总页数 $pages
		$pages = ceil($count / $step);
		global $pages;
		// 当前页$page
		@$_GET['page'] != null?$page = $_GET['page']:$page=1;
		// 上一页
		$pre = $page -1;
		global $pre;
		// 下一页
		$next = $page +1;
		global $next;
		// 偏移量
		$offset = ($page-1) * $step;
		$offset = "limit $offset,$step";
		// $cid = "where cid = $cid";
		$data = select($link,'*' ,'bbs_tiezi',"where cid=$cid",'','',$offset);
		echo '<table>';
		echo '<th>主题</th><th>内容</th><th>作者</th>';
		foreach ($data as $key => $value) {
			echo '<tr>';
			echo '<td>'.$value['title'].'</td>';
			echo '<td>'.$value['text'].'</td>';
			echo '<td>'.$value['author'].'</td>';
			echo '</tr>';

		}
		echo '</table>';


	}
	
?>
<html>
	<div>

	<!-- 上分页 -->
	<button>发帖</button>
	<ul>
		<li><a href="?page='.<?$page?>">返回</a></li>
		<li><a href="?page=<?=$pre?>">上一页</a></li>
		
	<?php 
	// 如果页数小于等于4
	var_dump($pages);
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
</html>