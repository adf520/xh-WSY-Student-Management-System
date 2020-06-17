

<?php

// 连接包含用户判断登录访问权限模块
include_once("islogin.php");

// 连接数据库模块
include_once("conn.php");
// 定义显示10条信息记录
$pagesize=10;
// 查询连接数据库 统计学生表数据
$result=mysqli_query($conn,"SELECT COUNT(*) from xsb");
// 执行查询数据库中所有的数据
$row=mysqli_fetch_row($result);
// 获取总留言条数
$sumcout=$row[0];
// 用总留言条数/每页显示的数据来获取总页数
$pagecount=ceil($sumcout/$pagesize);
// 定义当前访问的页数
$dqpage=isset($_GET['page'])?$_GET['page']:1;
// 判断当前访问的页数大于总页数（超出范围）
if($dqpage>$pagecount){
	$dqpage=1;
}
?>
<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head>
	<title>武生院学生信息管理系统</title>
	<!-- 导入style.css样式文件 -->
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<!-- top样式设置banner图 -->
<div class="top">
	<table  width="400" border="0" align="right" class="exit" >
		<tbody>
			<tr>
				<td align="right"> 
					<!-- 超链接绑定退出登录功能 -->
					<a href="logout.php">退出登录</a>
				</td>

			</tr>
		<tr>
      
		  <!--实现跑马灯效果欢迎用户登录-->
        <td height="100" width="300">&nbsp;<marquee scrollamount="2" scrolldelay="80" style="color: while">
		<!--判断用户是否存在，且用户名不能为空-->
			<?php
		 if(isset($_SESSION["unc"]) && $_SESSION["unc"]!=""){
		 //满足以上条件将执行“欢迎您登录XXX”
		    echo "欢迎您登录：".$_SESSION["unc"];
		
		 }
		?></marquee>
		</td>
      </tr>
		</tbody>
	</table>
</div>



<!-- 导航栏布局 -->
<div class="nav" >
	<table class="menu" bordercolor="white" border="1">
		<tbody>
			<tr>
				<td align="center">2020-6-10</td>
				<td align="center"><a href="index.php">浏览学生信息</a></td>
				<td align="center"><a href="addxsb.php">添加学生信息</a></td>
				<td align="center"><a href="queryxsb.php">简单查询</a></td>
				<td align="center"><a href="http://www.quanbk.cn/a">小浩留言板</a></td>
				<td align="center"><a href="fzqueryxsb.php">分组统计查询</a></td>

			</tr>
		</tbody>
	</table>
</div>


<!-- 学生信息表记录布局 -->
<div class="bj">
	<div class="xsb" align="center">
		<table width="1034" border="1" cellpadding="0" cellspacing="0" bordercolor="gray" class="headxsb">
			<tbody>
				<tr>
					<td width="180" align="center">考生号</td>
					<td width="100" align="center">姓名</td>
					<td width="100" align="center">性别</td>
					<td width="200" align="center">专业</td>
					<td width="120" align="center">班级代号</td>
					<td width="100" align="center">总成绩</td>
					<td width="140" align="center">出生日期</td>
					<td width="100" align="center">操作</td>
				</tr>
			</tbody>
		</table>
		






<!--实现学生信息表内容输出（每页输出10条学生信息记录）-->

 <?php
	  //链接数据库，获取留言数据[(当前页数-1)*每页显示的留言数]，进行分页处理       
	  $re=mysqli_query($conn,"select * from xsb limit ".($dqpage-1)*$pagesize.",".$pagesize);  
		//循环输出学生表中记录内容
	  while($row=mysqli_fetch_array($re)){
		  echo '<div class="xsxinxi">
    <table width="960"  height="60" border="1"cellspacing="0" bordercolor="FFFFFF">
      <tbody>
        <tr>
          <td width="180" align="center">'.$row["考生号"].'</td>
          <td width="100" align="center">'.$row["姓名"].'</td>
          <td width="100" align="center">'.$row["性别"].'</td>
          <td width="200" align="center">'.$row["专业"].'</td>
          <td width="120" align="center">'.$row["班级代号"].'</td>
          <td width="100" align="center">'.$row["总成绩"].'</td>
		  <td width="140" align="center">'.$row["出生日期"].'</td>
          <td width="100" align="center">
          <a href="deletexsb.php?delid='.$row["考生号"].'">删除</a>/
          <a href="upxsb.php?id='.$row["考生号"].'">修改</a></td>
        </tr>            
      </tbody>
    </table>
  </div>';
	  }
		  
		  ?>





		
		
		
		
		
		
		
		
		 
		







<!--实现分页布局以及功能绑定-->

    <div class="fy">
	  <table width="960" border="0" align="center">
  <tbody>
    <tr>
		<td width="290" align="left">共有<?php echo $sumcout?>条记录 第<?php echo $dqpage?>页/共<?php echo $pagecount?>页</td>
		
      <td width="80" align="center"><a href="?page=1">首页</a></td>    
      <!--通过插入超链接，将页码设成第一页，实现回到首页的功能-->
		<?php        //判断当前页是否小大于1，如果大于1才能进行上一页操作
		if($dqpage>1){    
		?>                 
		              <!--执行上一页操作-->
		<td width="80" align="center"><a href="?page=<?php echo $dqpage-1;?>">上一页</a></td>    
		<?php } ?>
		
      <td width="70" align="center">
		  <?php for($i=1;$i<=$pagecount;$i++)          //通过循环，将页码依次输出
		{
			if($i==$dqpage)    //判断当前页数是否为当前选择的页面
			{
				echo "<b>$i</b>&nbsp";      //如果是当前页数，则输出一个不用点击的链接
			}else{
			echo "<a href=?page=$i>$i</a>&nbsp;";    //如果不是当前页，则输出当前页
			}    
		} ?></td>
		<?php           //判断当前页是否小于总页数，如果小于总页数才能进行下一页操作
		if($dqpage<$pagecount){
	    ?>             
		                <!--执行下一页操作-->
	<td width="80" align="center"><a href="?page=<?php echo $dqpage+1?>">下一页</a></td>
		<?php } ?>
		
      <td width="80" align="center"><a href="?page=<?php echo $pagecount;?>">尾页</a></td>   <!--通过插入超链接，将页码设成最后一页，实现跳到最后一页的功能-->
		<td width="290"></td>
    </tr>
  </tbody>
</table>
    </div>
  </div>
  
	
	
	
	
	<!--底部版权banner-->
</div>
<div class="bottom"></div>
</body>
</html>
</body>
</html>