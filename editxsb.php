<!--实现编辑学生信息表功能以及布局设计-->
<?php
//包含连接数据库文件
include_once("conn.php");
//判断id是否存在，如果存在将得到id复制给变量id，否则将空复制给变量id
$id=isset($_GET["考生号"])?$_GET["考生号"]:"";
//判断用户提交的信息是否存在且提交的信息不能为空
if(isset($_POST["submit"]) && $_POST["submit"]!=""){
	//如果以上条件都能满足则执行连接数据库更新学生信息表（考生号、姓名、性别、专业、班级代号、总成绩）
  if(mysqli_query($conn,"update xsb set ksid='".$_POST["ksid"]."',name='".$_POST["name"]."' ,sex='".$_POST["sex"]."',zy='".$_POST["zy"]."' ,classid='".$_POST["classid"]."',nsum='".$_POST["nsum"]."'             where id='".$_POST["考生号"]."'")){
	  //如果以上条件都能满足，执行弹出框"学生信息更改成功！"
    echo "<script>alert('学生信息记录更改成功！');window.opener.location.reload();window.close();</script>";
  }else{
	  //否则执行弹出框“学生信息记录更改失败！”
    echo "<script>alert('学生信息记录更改失败！');history.back();</script>";    
  }
 exit;//退出
}
//连接数据库选择留言表数据库所有信息查询
$sql=mysqli_query($conn,"select * from xsb where id='".$id."'");
$info=mysqli_fetch_array($sql);
?>

<!--编辑学生表布局设计-->
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>编辑留言</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<!--设置上下左右外边距为0-->
<body topmargin="0" leftmargin="0" bottommargin="0">
	<!--表格布局设置宽450、高200 边框0 水平居中 单元格外间距0 单元格间隔1 边框颜色为白色  背景颜色为浅蓝色-->
<table width="450" height="200" border="0" align="center" cellpadding="0" cellspacing="1" bordercolor="#FFFFFF" bgcolor="#3399FF">
 <!--通过JavaScript来判断，编辑提交响应功能-->
 <script language="javascript">
  function chkinput(form){
	  //如果表单中标题的值为空
    if(form.title.value==""){
	//将执行弹出框留言主题不能为空
	  alert("留言主题不能为空！");
	//表单中主题聚焦
	  form.title.focus();
	//返回为false
	  return(false);
	
	}
	  //如果表单中内容的值为空
	 if(form.content.value==""){
	//将执行弹出框留言内容不能为空
	  alert("留言内容不能为空！");
		 //表单中主题聚焦
	  form.content.focus();
		 //返回为false
	  return(false);
	
	}
	  //返回为true
   return(true);
  
  }
 
 </script>
 <!--编辑留言表单布局设计-->
 <form name="form1" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>" onSubmit="return chkinput(this)">
 
  <tr>
    <td height="25" colspan="2" background="images/dh_back_1.gif" bgcolor="#FFFFFF">&nbsp;&nbsp;&nbsp;<img src="images/biao.gif">&nbsp;编辑留言</td>
  </tr>
  <tr>
    <td width="76" height="25" bgcolor="#FFFFFF"><div align="center">留言主题：</div></td>
    <td width="371" bgcolor="#FFFFFF">&nbsp;<input name="title" type="text" class="inputcss" size="45" value="<?php echo $info['title'];?>"></td>
  </tr>
  <tr>
    <td height="200" bgcolor="#FFFFFF"><div align="center">留言内容：</div></td>
    <td height="200" bgcolor="#FFFFFF">&nbsp;<textarea name="content" cols="52" rows="12" class="inputcss"><?php echo $info['content'];?></textarea></td>
  </tr>
  <tr>
    <td height="25" colspan="2" bgcolor="#FFFFFF"><div align="center">
		<!--隐藏于设置id-->
		<input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
		<!--编辑提交控件-->
		<input type="submit" value="编辑" class="buttoncss" name="submit">&nbsp;&nbsp;
		<!--取消重置控件-->
		<input type="reset" value="取消" class="buttoncss"></div></td>
  </tr>
  </form>
  
</table>
</body>
</html>
