
<!--�û���¼�ж�-->
<?php
//����session�Ự
session_start();
// �����ʽΪutf-8
 header( 'Content-type:text/html;charset:utf-8' );
//�����������ݿ��ļ�
include_once("conn.php");
$username=$_POST['usernc'];//��ȡ�û������û���������ݣ�
$userpwd=$_POST['userpwd'];//��ȡ�û����루�û���������ݣ�
//�û��������벻Ϊ��ʱ����ִ�е����¼�ɹ��������¼ʧ�ܣ�
if($username=="wzks"&&$userpwd=="666666"){
	//��ִ���û��ǳƸ�ֵ���Ự�û��ǳ�����������
	$_SESSION["unc"]=$_POST["usernc"];
	//��������Ի��򡰵�¼�ɹ����ҷ�����ҳ
	echo "<script>alert('��¼�ɹ���');window.location.href='index.php';</script>";
}else{
	//���򵯳�����¼ʧ�ܡ��������ϸ���ʷ��¼ҳ��
  	echo "<script>alert('��¼ʧ�ܣ�');history.back();</script>";
}
?>