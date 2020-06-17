<?php
// 连接包含数据库
include_once('conn.php');

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
	<table  width="100" border="0" align="right" class="exit">
		<tbody>
			<tr>
				<td> 
					<!-- 超链接绑定退出登录功能 -->
					<a href="logout.php">退出登录</a>
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
				<td align="center"><a href="#">高级查询</a></td>
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
		





<!-- 实现简单查询功能 -->

 <?php
 	// 连接包含数据库
	include_once('conn.php');
	// 设置编码为utf-8
header('Content-type:text/html;charset=utf-8');


if(isset($_POST["submit"]) && $_POST["submit"]!=""){
//获取用户输入的考生号信息
       $ksid=$_POST['考生号'];

	  //连接数据库查询学生表指定的学生号
	  $sql=mysqli_query($conn,"select * from xsb where 考生号 like '%".$ksid."%'"); 
      $info=mysqli_fetch_array($sql);
      // 判断查询的学生号是否存在，如果不存在
      if ($info==false) {
// 执行弹框'对不起，没有查找到您要查找的内容！'，并调转到查询页面
echo "<script>alert('对不起，没有查找到您要查找的内容！');window.location.href='queryxsb.php';</script>";


      
      }
      else{
    // 否则执行输出查询的指定考生号所有信息
       $ksid=$_POST['考生号'];

	  //链接数据库，获取留言数据[(当前页数-1)*每页显示的留言数]，进行分页处理       
	  $sql=mysqli_query($conn,"select * from xsb where 考生号 like '%".$ksid."%'"); 
      	
      	//循环输出学生表中记录内容
	  while($row=mysqli_fetch_array($sql)){
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
	
	  }
		}  
		  ?>



  
		
 
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