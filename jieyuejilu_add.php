<?php
session_start();
include_once 'conn.php';
$ndate =date("Y-m-d");
$addnew=$_POST["addnew"];
if ($addnew=="1" )
{
	
	$tushudaima=$_POST["tushudaima"];$tushumingcheng=$_POST["tushumingcheng"];$tushufenlei=$_POST["tushufenlei"];$tushuzuozhe=$_POST["tushuzuozhe"];$kucun=$_POST["kucun"];$jieyongshuliang=$_POST["jieyongshuliang"];$yujietianshu=$_POST["yujietianshu"];$shifouguihuan=$_POST["shifouguihuan"];$guihuanshijian=$_POST["guihuanshijian"];$beizhu=$_POST["beizhu"];$jieyueren=$_POST["jieyueren"];
	if(floatval($jieyongshuliang)>floatval($kucun))
	{
		echo "<script>javascript:alert('对不起，库存不足，操作失败!');history.back();</script>";
	}
	else
	{
		//ischongfu("select id from jieyuejilu where jieyueren='".$jieyueren."'");
		$sql="insert into jieyuejilu(tushudaima,tushumingcheng,tushufenlei,tushuzuozhe,kucun,jieyongshuliang,yujietianshu,shifouguihuan,guihuanshijian,beizhu,jieyueren) values('$tushudaima','$tushumingcheng','$tushufenlei','$tushuzuozhe','$kucun','$jieyongshuliang','$yujietianshu','$shifouguihuan','$guihuanshijian','$beizhu','$jieyueren') ";
		mysql_query($sql);
		$sql="update tushuxinxi set dianjilv=dianjilv-".$jieyongshuliang." where tushudaima='$tushudaima'";
		mysql_query($sql);
		echo "<script>javascript:alert('操作成功!');location.href='jieyuejilu_list2.php';</script>";
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>无标题文档</title><script language="javascript" src="js/Calendar.js"></script><link rel="stylesheet" href="css.css" type="text/css">
</head>
<script language="javascript">
	
	
	function OpenScript(url,width,height)
{
  var win = window.open(url,"SelectToSort",'width=' + width + ',height=' + height + ',resizable=1,scrollbars=yes,menubar=no,status=yes' );
}
	function OpenDialog(sURL, iWidth, iHeight)
{
   var oDialog = window.open(sURL, "_EditorDialog", "width=" + iWidth.toString() + ",height=" + iHeight.toString() + ",resizable=no,left=0,top=0,scrollbars=no,status=no,titlebar=no,toolbar=no,menubar=no,location=no");
   oDialog.focus();
}
</script>
<body>
<p>添加借阅记录： 当前日期： <?php echo $ndate; ?></p>
<script language="javascript">
	function check()
{
	if(document.form1.tushudaima.value==""){alert("请输入图书代码");document.form1.tushudaima.focus();return false;}if(document.form1.tushumingcheng.value==""){alert("请输入图书名称");document.form1.tushumingcheng.focus();return false;}if(document.form1.tushufenlei.value==""){alert("请输入图书分类");document.form1.tushufenlei.focus();return false;}if(document.form1.tushuzuozhe.value==""){alert("请输入图书作者");document.form1.tushuzuozhe.focus();return false;}if(document.form1.kucun.value==""){alert("请输入库存");document.form1.kucun.focus();return false;}if(document.form1.jieyongshuliang.value==""){alert("请输入借用数量");document.form1.jieyongshuliang.focus();return false;}if(document.form1.yujietianshu.value==""){alert("请输入预借天数");document.form1.yujietianshu.focus();return false;}if(document.form1.jieyueren.value==""){alert("请输入借阅人");document.form1.jieyueren.focus();return false;}
}
	function gow()
	{
		location.href='peixunccccailiao_add.php?jihuabifffanhao='+document.form1.jihuabifffanhao.value;
	}
</script>
 <?php
 $sql="select * from tushuxinxi where id=".$_GET["id"];
 $query=mysql_query($sql);
 $rowscount=mysql_num_rows($query);
 if($rowscount>0)
 {
 	$tushudaima=mysql_result($query,0,tushudaima);
	$tushumingcheng=mysql_result($query,0,tushumingcheng);
	$tushufenlei=mysql_result($query,0,tushufenlei);
	$tushuzuozhe=mysql_result($query,0,tushuzuozhe);
	$kucun=mysql_result($query,0,dianjilv);

 }
?>
<form id="form1" name="form1" method="post" action="">
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="border-collapse:collapse">    
	<tr><td>图书代码：</td><td><input name='tushudaima' type='text' id='tushudaima' value='' style='border:solid 1px #000000; color:#666666' />&nbsp;*</td></tr><script language="javascript">document.form1.tushudaima.value='<?php echo $tushudaima?>';</script><tr><td>图书名称：</td><td><input name='tushumingcheng' type='text' id='tushumingcheng' value='' size='50' style='border:solid 1px #000000; color:#666666'  />&nbsp;*</td></tr><script language="javascript">document.form1.tushumingcheng.value='<?php echo $tushumingcheng?>';</script><tr><td>图书分类：</td><td><input name='tushufenlei' type='text' id='tushufenlei' value='' style='border:solid 1px #000000; color:#666666' />&nbsp;*</td></tr><script language="javascript">document.form1.tushufenlei.value='<?php echo $tushufenlei?>';</script><tr><td>图书作者：</td><td><input name='tushuzuozhe' type='text' id='tushuzuozhe' value='' style='border:solid 1px #000000; color:#666666' />&nbsp;*</td></tr><script language="javascript">document.form1.tushuzuozhe.value='<?php echo $tushuzuozhe?>';</script><tr><td>库存：</td><td><input name='kucun' type='text' id='kucun' value='' style='border:solid 1px #000000; color:#666666' />&nbsp;*</td></tr><script language="javascript">document.form1.kucun.value='<?php echo $kucun?>';</script><tr><td>借用数量：</td><td><input name='jieyongshuliang' type='text' id='jieyongshuliang' value='' style='border:solid 1px #000000; color:#666666' />&nbsp;*</td></tr><tr><td>预借天数：</td><td><input name='yujietianshu' type='text' id='yujietianshu' value='' style='border:solid 1px #000000; color:#666666' />&nbsp;*</td></tr><tr style="display:none"><td>是否归还：</td><td><select name='shifouguihuan' id='shifouguihuan' style='border:solid 1px #000000; color:#666666'>
	  <option value="否">否</option>
	  <option value="是">是</option>
	</select></td></tr><tr style="display:none"><td>归还时间：</td><td><input name='guihuanshijian' type='text' id='guihuanshijian' value='' style='border:solid 1px #000000; color:#666666' /></td></tr><tr><td>备注：</td><td><textarea name='beizhu' cols='50' rows='8' id='beizhu' style='border:solid 1px #000000; color:#666666'></textarea></td></tr><tr><td>借阅人：</td><td><input name='jieyueren' type='text' id='jieyueren' value='<?php echo $_SESSION['username'];?>' style='border:solid 1px #000000; color:#666666' />&nbsp;*</td></tr>

    <tr>
      <td>&nbsp;</td>
      <td><input type="hidden" name="addnew" value="1" />
        <input type="submit" name="Submit" value="添加" onclick="return check();"  style='border:solid 1px #000000; color:#666666' />
      <input type="reset" name="Submit2" value="重置" style='border:solid 1px #000000; color:#666666' /></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
<?php
	function ischongfu($sql)
	{
		$query=mysql_query($sql);
 		$rowscount=mysql_num_rows($query);
		if($rowscount>0)
		{
			echo "<script>javascript:alert('对不起，该借阅人已经存在，请换其他借阅人!');history.back();</script>";
		}
		
	}
?>
</body>
</html>

