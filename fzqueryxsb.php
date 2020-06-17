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
	<title>分组查询</title>
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
				<td align="center"><a href="#">高级查询</a></td>
				<td align="center"><a href="fzqueryxsb.php">分组统计查询</a></td>

			</tr>
		</tbody>
	</table>
</div>














<!-- 分组查询功能实现 -->

<?php
     // 连接数据库模块
include_once("conn.php");
// 网页为utf-8编码
header('Content:text/html,charset=utf-8');
	    // 判断是否提交数据，且提交数据不能为空
if(isset($_POST["submit"]) && $_POST["submit"]!=""){
	     
	     // 获取用户选择下拉列表的班级代号
 $bjid=$_POST['type'];
         switch ($_POST['type']) {

         	// 通过连接数据库使用MYSQL语句获取班级代号、求出班级总人数、平均成绩、平均年龄
         	case '130101':
         	$sql=mysqli_query($conn,"select 班级代号,count(班级代号) AS 班级总人数,round(AVG(总成绩),2) AS 平均成绩, ceil(AVG(ROUND(DATEDIFF(CURDATE(), 出生日期)/365.2422))) AS 平均年龄  from xsb where 班级代号='$bjid'");
         		break;
         			case '130102':
         	$sql=mysqli_query($conn,"select 班级代号,count(班级代号) AS 班级总人数,round(AVG(总成绩),2) AS 平均成绩, ceil(AVG(ROUND(DATEDIFF(CURDATE(), 出生日期)/365.2422))) AS 平均年龄  from xsb where 班级代号='$bjid'");
         		break;
         			case '1301033':
         $sql=mysqli_query($conn,"select 班级代号,count(班级代号) AS 班级总人数,round(AVG(总成绩),2) AS 平均成绩, ceil(AVG(ROUND(DATEDIFF(CURDATE(), 出生日期)/365.2422))) AS 平均年龄  from xsb where 班级代号='$bjid'");
         		break;
         			case '130501':
         	$sql=mysqli_query($conn,"select 班级代号,count(班级代号) AS 班级总人数,round(AVG(总成绩),2) AS 平均成绩, ceil(AVG(ROUND(DATEDIFF(CURDATE(), 出生日期)/365.2422))) AS 平均年龄  from xsb where 班级代号='$bjid'");
         		break;
         			case '130601':
         	$sql=mysqli_query($conn,"select 班级代号,count(班级代号) AS 班级总人数,round(AVG(总成绩),2) AS 平均成绩, ceil(AVG(ROUND(DATEDIFF(CURDATE(), 出生日期)/365.2422))) AS 平均年龄  from xsb where 班级代号='$bjid'");
         		break;
         			case '130201':
         $sql=mysqli_query($conn,"select 班级代号,count(班级代号) AS 班级总人数,round(AVG(总成绩),2) AS 平均成绩, ceil(AVG(ROUND(DATEDIFF(CURDATE(), 出生日期)/365.2422))) AS 平均年龄  from xsb where 班级代号='$bjid'");
         		break;
         			case '130301':
         	$sql=mysqli_query($conn,"select 班级代号,count(班级代号) AS 班级总人数,round(AVG(总成绩),2) AS 平均成绩, ceil(AVG(ROUND(DATEDIFF(CURDATE(), 出生日期)/365.2422))) AS 平均年龄  from xsb where 班级代号='$bjid'");
         		break;
         			case '130109':
         $sql=mysqli_query($conn,"select 班级代号,count(班级代号) AS 班级总人数,round(AVG(总成绩),2) AS 平均成绩, ceil(AVG(ROUND(DATEDIFF(CURDATE(), 出生日期)/365.2422))) AS 平均年龄  from xsb where 班级代号='$bjid'");
         		break;
         			case '03':
         	$sql=mysqli_query($conn,"select 班级代号,count(班级代号) AS 班级总人数,round(AVG(总成绩),2) AS 平均成绩, ceil(AVG(ROUND(DATEDIFF(CURDATE(), 出生日期)/365.2422))) AS 平均年龄  from xsb where 班级代号='$bjid'");
         		break;
         	
         	default:
         	// 如果查询的班级代号不在选择下拉列表中，将执行弹出框提示“您查询的班级代号未被收录”，并且返回到上个历史页面
         		echo "<script>alert('您查询的班级代号未被收录');history.back();</script>";
         		break;
         }

         	// 查询连接数据库选择学生表中指定班级代号信息
		 $info=mysqli_fetch_array($sql);
		

        




		  }







		
	  ?>










	
	
<!-- 学生信息分组查询布局-->
<div class="bj"><!--底部版权banner-->
	<form name="form4" ction="<?php echo $_SERVER["PHP_SELF"];?> " onsubmit="return chkinput_search(this)" method="post">
	  <table width="200" border="1"  align="center">
	    <tbody>
	      <tr>
	        <td>
				<!--班级查询下拉列表布局-->
			  <select name="type" >
				<option value="">请选择班级</option>
				<option value="130101" >130101</option>
			    <option value="130102">130102</option>
				   <option value="1301033">130103</option>
				   <option value="130501">130501</option>
			    <option value="130601">130601</option>
			    <option value="130201">130201</option>
			    <option value="130301">130301</option>
			    <option value="130109">130109</option>
			    <option value="03">03</option>
			  </select>
			  
			  
			  
		    </td>
	        <td>
			  
			  <input type="submit" value="查询" name="submit" >
		    </td>
          </tr>
        </tbody>

<?php
// 输出表中对应的数据
echo '

      </table>
	  <table width="305" height="123" border="1" align="center"  class="headxsb" >
	    <tbody>
	      <tr>
	        <td>班级名称</td>
	        <td>班级人数</td>
	        <td>平均成绩</td>
	        <td>平均年龄</td>
          </tr>


	      <tr>
	        <td>'.$info["班级代号"].'</td>
	        <td>'.$info["班级总人数"].'   </td>
	        <td>'.$info["平均成绩"].' </td>
	        <td>'.$info["平均年龄"].' </td>
          </tr>
        </tbody>
      </table>
     ;
	 ' ?>
  </form>
</div>

}







<div class="bottom"></div>
</body>
</html>
</body>
</html>