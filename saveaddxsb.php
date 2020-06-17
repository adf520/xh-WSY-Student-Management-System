<?php

// 连接包含用户判断登录访问权限模块
include_once("islogin.php");


?>
<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head>
	<title>添加学生信息</title>
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
				<td align="center"><a href="http://www.quanbk.cn/a/">小浩留言板</a></td>
				<td align="center"><a href="fzqueryxsb.php">分组统计查询</a></td>


			</tr>
		</tbody>
	</table>
</div>


<!-- 学生信息表记录布局 -->
<div class="bj">
	<div class="xsb" align="center">
		
		












		
			<!--通过JavaScript实现判断发表学生信息功能-->  
		   <script language="javascript">
		     function chkinput(form){
				 //如果表单中学生号的值为空
			  if(form.xsid.value==""){
				  //将执行弹出框“请输入学生号！”
			    alert("请输入请输入学生号！");
				  //表单学生号聚焦状态
			    form.xsid.focus();
				  //返回为fals
				return(false);
			  }
			      //如果表单中姓名的值为空
			  if(form.name.value==""){
			      //请输入姓名！”
			    alert("请输入姓名！");
				  //表单内容聚焦状态
				form.name.focus();
				   //返回为false
				return(false);
			  }
			       //如果表单中性别的值为空
			  if(form.sex.value==""){
			      //请输入性别！”
			    alert("请输入性别！");
				  //表单内容聚焦状态
				form.name.focus();
				   //返回为false
				return(false);
			  }


     //如果表单中专业的值为空
			  if(form.zy.value==""){
			      //请输入专业！”
			    alert("请输入专业！");
				  //表单内容聚焦状态
				form.name.focus();
				   //返回为false
				return(false);
			  }
			  、

     //如果表单中班级代号的值为空
			  if(form.bjid.value==""){
			      //请输入班级代号！”
			    alert("请输入班级代号！");
				  //表单内容聚焦状态
				form.name.focus();
				   //返回为false
				return(false);
			  }
     //如果表单中总成绩的值为空
			  if(form.zcj.value==""){
			      //请输入总成绩！”
			    alert("请输入总成绩！");
				  //表单内容聚焦状态
				form.name.focus();
				   //返回为false
				return(false);
			  }


			  //返回为true
			  return(true);
			 }
		   
		   </script>
		
		
		
		
	
<?php
// 连接包含数据库
include_once("conn.php");
// 提交判断是否存在
if(isset($_POST['submit'])){
$xsid=$_POST['xsid'];
$name=$_POST['name'];
$sex=$_POST['sex'];
$zy=$_POST['zy'];
$bjid=$_POST['bjid'];
$zcj=$_POST['zcj'];
$datetime=$_POST['datetime'];

if (!($_POST['xsid'] and $_POST['datetime'] and $_POST['name']  and $_POST['zy'] and $_POST['bjid'] and $_POST['zcj'] and $_POST['sex'] )){
	echo "输入不允许为空。点击<a href='javascript:onclick=history.go(-1)'>这里</a> 返回";
}else{
	$sqlstr1 = "insert into xsb(考生号,姓名,性别,出生日期,专业,班级代号,总成绩) values('$xsid','$name','$sex','$datetime','$zy','$bjid','$zcj')";
	$result = mysqli_query($conn,$sqlstr1);
	if ($result){
		echo "添加成功,点击<a href='index.php'>这里</a>查看";
	}else{
		echo "<script>alert('添加失败');history.go(-1);</script>";
	}
}
}
?>
		 
		








    </div>
  </div>
	
	
	
	
	<!--底部版权banner-->
</div>
<div class="bottom"></div>
</body>
</html>
</body>
</html>