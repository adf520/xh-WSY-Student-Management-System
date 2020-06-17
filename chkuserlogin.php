
<!--用户登录判断-->
<?php
//开启session会话
session_start();
// 编码格式为utf-8
 header( 'Content-type:text/html;charset:utf-8' );
//包含连接数据库文件
include_once("conn.php");
$username=$_POST['usernc'];//获取用户名（用户输入的数据）
$userpwd=$_POST['userpwd'];//获取用户密码（用户输入的数据）
//用户名和密码不为错时，则执行弹框登录成功！否则登录失败！
if($username=="wzks"&&$userpwd=="666666"){
	//将执行用户昵称赋值给会话用户昵称来保留数据
	$_SESSION["unc"]=$_POST["usernc"];
	//输出弹出对话框“登录成功”且返回首页
	echo "<script>alert('登录成功！');window.location.href='index.php';</script>";
}else{
	//否则弹出“登录失败”，返回上个历史记录页面
  	echo "<script>alert('登录失败！');history.back();</script>";
}
?>