<?php
//��֤��½��Ϣ

include_once 'conn.php';
//if($_POST['submit']){
	$id=$_GET["id"];
	$tushudaima=$_GET['tushudaima'];
	$jieyongshuliang=$_GET['jieyongshuliang'];
	
	//$userpass=md5($userpass);
	$sql="update jieyuejilu set shifouguihuan='��',guihuanshijian='".date('Y-m-d H:i:s',time())."' where id=".$id;
	//echo $sql;
	 	mysql_query($sql);
	$sql="update tushuxinxi set dianjilv=dianjilv+".$jieyongshuliang." where tushudaima='".$tushudaima."'";
		 	mysql_query($sql);

		$comewhere=$_SERVER['HTTP_REFERER'];
		echo "<script language='javascript'>alert('�����ɹ���');location.href='$comewhere';</script>";
	
//}
?>