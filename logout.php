
<!--账号注销模块-->
<?php
//开启session会话
session_start();
// 释放所有的会话变量
session_unset();
//销毁一个会话中的全部数据
session_destroy();
//通过JavaScript账号注销后将自动返回到用户登录界面
echo "<script>window.location.href='login.php'</script>";
?>