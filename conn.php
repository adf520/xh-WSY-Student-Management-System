<?php
$conn = mysqli_connect("localhost", "root", "root", "pmlx"); //连接数据库服务器（“连接服务器IP地址”、“数据库用户名”、“密码”、“数据库仓库”）
mysqli_query($conn, "set names utf-8"); //设置页面编码格式为gb2312
?>