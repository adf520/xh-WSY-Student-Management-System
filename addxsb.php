<?php
// 连接包含用户判断登录访问权限模块
include_once("islogin.php");
// 连接数据库模块
include_once("conn.php");

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
	  
		<table width="1034" border="1" cellpadding="0" cellspacing="0" bordercolor="gray" class="headxsb">
			<tbody>
				<tr>
					<td width="180" align="center">考生号</td>
					<td width="100" align="center">姓名</td>
					<td width="100" align="center">性别</td>
					<td width="200" align="center">专业</td>
					<td width="120" align="center">班级代号</td>
					<td width="100" align="center">总成绩</td>
					<td width="100" align="center">出生日期</td>
				</tr>
			</tbody>
		</table>
		












		
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
		
		
		
		
		
		
		 
		







<!--实现添加学生信息布局设计-->

     <div class="addxsxinxi">
	
<form name="form1" method="post" action="saveaddxsb.php">
	  <table width="960" border="0" align="center">
  <tbody>
    <tr >
		<td ><input type="number" style="height:60px;background:rgba(0,1,0,0.6);color:white;border:2px solid #ffffff;" name="xsid" height="60"size="16" placeholder="输入学生号" ></td>
		<td ><input type="text" style="height:60px;background:rgba(0,1,0,0.6);color:white;border:2px solid #ffffff;" name="name" size="6"placeholder="输入姓名" ></td>
		<td ><input type="text" style="height:60px;background:rgba(0,1,0,0.6);color:white;border:2px solid #ffffff;" name="sex" size="6"placeholder="输入性别" ></td>
		<td ><input type="text" style="height:60px;background:rgba(0,1,0,0.6);color:white;border:2px solid #ffffff;"  name="zy"   size="18"placeholder="输入专业" ></td>
		<td ><input type="text" style="height:60px;background:rgba(0,1,0,0.6);color:white;border:2px solid #ffffff;"  name="bjid" size="8"placeholder="输入班级代号" ></td>
		<td ><input type="number" style="height:60px;background:rgba(0,1,0,0.6);color:white;border:2px solid #ffffff;"  name="zcj" size="8" placeholder="输入总成绩" ></td>
	    <td ><input type="datetime" style="height:60px;background:rgba(0,1,0,0.6);color:white;border:2px solid #ffffff;"  name="datetime" size="14" placeholder="输入出生日期" ></td>


    </tr>
	  <tr align="center">
	  	<td align="center"><input type="reset" name="reset" value="取消" ></td>
		<td align="center"><input type="submit" name="submit" value="添加" ></td>
	  </tr>
  </tbody>
</table>
</form>
    </div>
  </div>
	
	
	
	
	<!--底部版权banner-->
</div>
<div class="bottom"></div>
</body>
</html>
</body>
</html>