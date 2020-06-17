<!--实现编辑学生信息功能以及布局设计-->
<?php
// 连接包含用户判断登录访问权限模块
include_once("islogin.php");
//包含连接数据库文件
include_once("conn.php");
// 设置编码为utf-8
header('Content-type:text/html;charset=utf-8');
//判断id是否存在，如果存在将得到id复制给变量id，否则将空复制给变量id
$id=isset($_GET["id"])?$_GET["id"]:"";
//判断用户提交的信息是否存在且提交的信息不能为空
if(isset($_POST["submit"]) && $_POST["submit"]!=""){
	//如果以上条件都能满足则执行连接数据库更新学生信息（考生号、姓名、性别、专业、班级代号、总成绩、出生日期）
	    $id = $_POST['考生号'];
        $name = $_POST['姓名'];
        $datatime = $_POST['出生日期'];
        $sex = $_POST['性别'];
        $class = $_POST['专业'];
        $bjid = $_POST['班级代号'];
        $grade = $_POST['总成绩'];
  if(mysqli_query($conn,"update xsb set 考生号 = '$id' , 姓名 = '$name', 出生日期 = '$datatime', 性别 = '$sex', 专业 = '$class', 班级代号 = '$bjid' , 总成绩 = '$grade' where 考生号 = '$id'")){
	  //如果以上条件都能满足，提示"修改成功"点击这里返回首页
    echo "修改成功,点击<a href='index.php'>这里</a>查看";
  }else{
	  //否则执行弹出框“修改失败！”返回上个页面
    echo "<script>alert('修改失败！');history.back();</script>";    
  }
 exit;//退出
}


//连接数据库选择留言表数据库所有信息查询
$sql=mysqli_query($conn,"select * from xsb where 考生号='".$id."'");
$info=mysqli_fetch_array($sql);

?>




















































<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head>
	<title>修改</title>
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
				<td align="center"><a href="http://www.quanbk.cn/a/">小浩留言板</a></td>
				<td align="center"><a href="fzqueryxsb.php">分组统计查询</a></td>

			</tr>
		</tbody>
	</table>
</div>


<!-- 学生信息表记录布局 -->
<div class="bj">
  <div class="xsb" align="center">
	  
		<table width="1034"  cellpadding="0" cellspacing="0" >
			<tbody>
				<tr>
					


























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
//如果表单中总成绩的值为空
			  if(form.datetime.value==""){
			      //请输入出生日期！”
			    alert("请输入出生日期！");
				  //表单内容聚焦状态
				form.name.focus();
				   //返回为false
				return(false);
			  }

			  //返回为true
			  return(true);
			 }
		   
		   </script>
		
		
		
		
		
		
		 
		
	






<!-- 修改学生信息布局 -->


  </div>
	
  <p>&nbsp;</p>
  <form  name="form1" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>" onSubmit="return chkinput(this)">
  <table width="689" border="1" align="center"  style="color: white;font-size: 34px，"  bordercolor=" #FDFDFD" class="headxsb" >
    <tbody>
      <tr  >
        <td width="255" align="right">考生号：</td>
        <!-- 考生号文本编辑框 -->
        <td width="418"><input type="text" align="center" name="考生号" style="height: 40px" size="60px"value="<?php echo $info['考生号'];?>"></td>
      </tr>
      <tr>
        <td width="255" align="right">姓名：</td>
        <!-- 姓名文本编辑框 -->
        <td width="418"><input type="text" align="center" name="姓名" style="height: 40px"size="60px"value="<?php echo $info['姓名'];?>"></td>
      </tr>
      <tr>
        <td width="255" align="right">性别：</td>
        <!-- 性别文本编辑框 -->
        <td width="418"><input type="text" align="center" name="性别" style="height: 40px"size="60px"value="<?php echo $info['性别'];?>"></td>
      </tr>
      <tr>
      	<!-- 出生日期文本编辑框 -->
        <td width="255" align="right">出生日期：</td>
        <td width="418"><input type="datetime" align="center" name="出生日期" style="height: 40px"size="60px"value="<?php echo $info['出生日期'];?>"></td>
      </tr>
      <tr>
      	<!-- 专业文本编辑框 -->
        <td width="255" align="right">专业：</td>
        <td width="418"><input type="text" align="center" name="专业" style="height: 40px"size="60px"value="<?php echo $info['专业'];?>"></td>
      </tr>
      <tr>
      	<!-- 班级代号文本编辑框 -->
        <td width="255" align="right">班级代号：</td>
        <td width="418"><input type="text" align="center" name="班级代号" style="height: 40px"size="60px"value="<?php echo $info['班级代号'];?>"></td>
      </tr>
      <tr>
      	<!-- 总成绩文本编辑框 -->
        <td width="255" align="right">总成绩：</td>
        <td width="418"><input type="text" align="center" name="总成绩" style="height: 40px"size="60px"value="<?php echo $info['总成绩'];?>"></td>
      </tr>
      <tr colpan="2" align="center">
        <td></td>
        <td height="60px">

				<!--隐藏于设置id-->
		<input type="hidden" name="id" value="<?php echo $_GET['id'];?>">

				<!--修改（提交类型）  -->
        	<input type="submit" value="修改" name="submit" style="height: 60px;font-size: 34px" size="16">
        	<!-- 取消（重置类型） -->
          <input type="reset" value="取消" name="reset" style="height: 60px;font-size: 34px" size="16"></td>
      </tr>
    </tbody>
  </table>
  </form>
  <p>&nbsp;</p>
</div>
	

	
	<!--底部版权banner-->
</div>
<div class="bottom"></div>
</body>
</html>
</body>
</html>