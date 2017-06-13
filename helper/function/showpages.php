<?php

	// 分页函数
	// 能写出来吗
	include '../../common.php';

	$data = showpages($link,1,'bbs_tiezi',"where cid=1");
	var_dump($data);
	/**
	 * 分页函数（直接纯属出html内容）
	 * @param  连接 $link  [description]
	 * @param  [type] $sheet [description]
	 * @param  [string] $where 哪个板块下的内容
	 * @return array        返回一个包含值的数组
	 * 	 */
	function showpages($link,$data){
		// $data = select($link,'count(*) as count',$sheet,$where);

		// 帖子总数
		// 
		global $count;
		$count = $data[0]['count'];

		// 每页个数
		$step = 3;
		// 总页数 $pages
		
		global $pages;
		$pages = ceil($count / $step);
		// 当前页$page
		global $page;
		@$_GET['page'] != null?$page = $_GET['page']:$page=1;
		// 上一页
		
		global $pre;
		$pre = $page -1;
		if($pre<1){
			$pre =1;
		}
		
		// 下一页
		
		global $next;
		$next = $page +1;
		if($next>$pages){
			$next = $pages;
		}
		// 偏移量
		$offset = ($page-1) * $step;
		$offset = "limit $offset,$step";
		// $uid = "where uid = $uid";
		$data = select($link,'*' ,'bbs_tiezi as a,bbs_userdata as b ',"where a.cid=$cid and b.uid=a.uid ",'','',$offset);

		return $data;
	


	}


		
?>


<!-- 试验的分页效果 -->
<html>
	<style type="text/css">
		.page li{
			list-style: none;
			float:left;
			padding-right: 20px;
		}
		.page{
			float:right;
		}
	.post_submit{
		float:left;
	}
		.clr{
			clear:both;
		}
	</style>
	<div>

	<!-- 上分页 -->
	<button class="post_submit">发帖</button>
	<ul class="page">
		<li><a href="?page='.<?$page?>">返回</a></li>
		<li><a href="?page=<?=$pre?>">上一页</a></li>
		
	<?php 
	// 如果页数小于等于4 分页的html
	// var_dump($pages);
	if($pages<'4'){
		for($i=1;$i<=$pages;$i++){
			echo "<li><a href='?page=$i'>".$i.'</a></li>';
		}
	}
	// 如果页数大于4
	else{
		// 当前页数小于3
		if($page<3){
			for($i=1;$i<4;$i++){
				echo "<li><a href='?page=$i'>".$i.'</a></li>';

			}
			echo "<li><a href='?page=$pages'>...".$pages.'</a></li>';


		}else{
			// 当前页数大于3
			echo '<li><a href="?page=1">1...</a></li>';
			if($page<$pages){
				// 出了最后一页需要处理
				for($i=$page-1;$i<$page+2;$i++){
					echo "<li><a href='?page=$i'>".$i.'</a></li>';
				}
				// 尾页
				if($page<$pages-1){
					echo "<li><a href='?page=$pages'>...".$pages.'</a></li>';
				}
			}else{
				// 处理最后一页的样式
				for($i=$page-2;$i<$page+1;$i++){
					echo "<li><a href='?page=$i'>".$i.'</a></li>';
				}
			}
			
		}
	}
	
		
	?>
	<li><a href="?page=<?=$next?>">下一页</a></li>
	</ul>
	<div class="clr"></div>
	<table>
	<?php
	
		echo '<th>主题</th><th>内容</th><th>作者</th>';
		foreach ($data as $key => $value) {
			echo '<tr>';
			echo '<td>'.$value['title'].'</td>';
			echo '<td>'.$value['text'].'</td>';
			echo '<td>'.$value['username'].'</td>';
			echo '<td>'.$value['tid'].'</td>';
			echo '</tr>';

		}

	?>
	</table>
	<div class="clr"></div>
	
	<!-- // 如果页数小于等于4 -->
	<!-- // var_dump($pages); -->
	<ul class="page">
		<li><a href="?page='.<?$page?>">返回</a></li>
		<li><a href="?page=<?=$pre?>">上一页</a></li>
		
	<?php 
	// 如果页数小于等于4 分页的html
	// var_dump($pages);
	if($pages<'4'){
		for($i=1;$i<=$pages;$i++){
			echo "<li><a href='?page=$i'>".$i.'</a></li>';
		}
	}
	// 如果页数大于4
	else{
		// 当前页数小于3
		if($page<3){
			for($i=1;$i<4;$i++){
				echo "<li><a href='?page=$i'>".$i.'</a></li>';

			}
			echo "<li><a href='?page=$pages'>...".$pages.'</a></li>';


		}else{
			// 当前页数大于3
			echo '<li><a href="?page=1">1...</a></li>';
			if($page<$pages){
				// 出了最后一页需要处理
				for($i=$page-1;$i<$page+2;$i++){
					echo "<li><a href='?page=$i'>".$i.'</a></li>';
				}
				// 尾页
				if($page<$pages-1){
					echo "<li><a href='?page=$pages'>...".$pages.'</a></li>';
				}
			}else{
				// 处理最后一页的样式
				for($i=$page-2;$i<$page+1;$i++){
					echo "<li><a href='?page=$i'>".$i.'</a></li>';
				}
			}
			
		}
	}
	
		echo '</table>';
		
	?>
	<li><a href="?page=<?=$next?>">下一页</a></li>
	</ul>
	<div class="clr"></div>
	<?php var_dump($_SERVER);?>
	
	<!-- 帖子内容 -->
	

	<!-- 下分页 -->
</div>
</html>
<!-- 分页内容结束 -->