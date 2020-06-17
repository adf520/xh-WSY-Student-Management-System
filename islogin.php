<!--实现编辑学生信息功能以及布局设计-->
<?php
//包含连接数据库文件
include_once("conn.php");
// 设置编码为utf-8
header('Content-type:text/html;charset=utf-8');
// 开启会话权限
session_start();
// 判断该用户是否登录
	if(isset($_SESSION["unc"]) && $_SESSION["unc"]!=""){
//自动跳转到首页
		
	}else{
		// 否则执行弹框“请先完成登录，谢谢合作”，并返回跳转到登录页面
		echo "<script>alert('请先完成登录，谢谢合作');location.href='login.php';</script>";
	}		



?>






























