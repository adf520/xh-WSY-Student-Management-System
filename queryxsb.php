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
	<title>查询学生信息</title>
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
	<form action="queryxsb_ok.php" method="post">
      <table width="828" height="194" border="1" align="center"  class="headxsb">
        <tbody>
          <tr>
            <td width="816" height="97"  align="center"><input  placeholder="请输入您要查询的考生号" type="text" name="考生号" size="40" style="height: 50px"></td>
          </tr>
          <tr>
            <td align="center"><input type="submit" name="submit"  value="查询" size="60" style="height: 50px"></td>
          </tr>
        </tbody>
      </table>
</form>
</div>

<!--底部版权banner-->
<div class="bottom"></div>
</body>
</html>
</body>
</html>