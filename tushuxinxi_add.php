<?php
session_start();
include_once 'conn.php';
$ndate =date("Y-m-d");
$addnew=$_POST["addnew"];
if ($addnew=="1" )
{
	$tushudaima=$_POST["tushudaima"];$tushumingcheng=$_POST["tushumingcheng"];$tushufenlei=$_POST["tushufenlei"];$tushuzuozhe=$_POST["tushuzuozhe"];$chubanshe=$_POST["chubanshe"];$chubanriqi=$_POST["chubanriqi"];$yeshu=$_POST["yeshu"];$jiage=$_POST["jiage"];$tupian=$_POST["tupian"];$heshinianlingduan=$_POST["heshinianlingduan"];$dianjilv=$_POST["dianjilv"];$beizhu=$_POST["beizhu"];
	ischongfu("select id from tushuxinxi where tushudaima='".$tushudaima."'");
	$sql="insert into tushuxinxi(tushudaima,tushumingcheng,tushufenlei,tushuzuozhe,chubanshe,chubanriqi,yeshu,jiage,tupian,heshinianlingduan,dianjilv,beizhu) values('$tushudaima','$tushumingcheng','$tushufenlei','$tushuzuozhe','$chubanshe','$chubanriqi','$yeshu','$jiage','$tupian','$heshinianlingduan','$dianjilv','$beizhu') ";
	mysql_query($sql);
	echo "<script>javascript:alert('��ӳɹ�!');location.href='tushuxinxi_add.php';</script>";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�ޱ����ĵ�</title><script language="javascript" src="js/Calendar.js"></script><link rel="stylesheet" href="css.css" type="text/css">
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
<p>���ͼ����Ϣ�� ��ǰ���ڣ� <?php echo $ndate; ?></p>
<script language="javascript">
	function check()
{
	if(document.form1.tushudaima.value==""){alert("������ͼ�����");document.form1.tushudaima.focus();return false;}if(document.form1.tushumingcheng.value==""){alert("������ͼ������");document.form1.tushumingcheng.focus();return false;}if(document.form1.jiage.value==""){alert("������۸�");document.form1.jiage.focus();return false;}
}
	function gow()
	{
		location.href='peixunccccailiao_add.php?jihuabifffanhao='+document.form1.jihuabifffanhao.value;
	}
</script>
 <?php
//islbdq $sql="select * from melieibaoduqubiaoiguo where id=".$_GET["id"];
//islbdq $query=mysql_query($sql);
//islbdq $rowscount=mysql_num_rows($query);
//islbdq if($rowscount>0)
//islbdq {
//islbdq 	lelelelelele
//islbdq }
?>
<form id="form1" name="form1" method="post" action="">
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="border-collapse:collapse">    
	<tr><td>ͼ����룺</td><td><input name='tushudaima' type='text' id='tushudaima' value='' style='border:solid 1px #000000; color:#666666' />&nbsp;*</td></tr><tr><td>ͼ�����ƣ�</td><td><input name='tushumingcheng' type='text' id='tushumingcheng' value='' size='50' style='border:solid 1px #000000; color:#666666'  />&nbsp;*</td></tr><tr><td>ͼ����ࣺ</td><td><select name='tushufenlei' id='tushufenlei'><?php getoption("shangpinleibie","leibie")?></select></td></tr><tr><td>ͼ�����ߣ�</td><td><input name='tushuzuozhe' type='text' id='tushuzuozhe' value='' style='border:solid 1px #000000; color:#666666' /></td></tr><tr><td>�����磺</td><td><input name='chubanshe' type='text' id='chubanshe' value='' size='50' style='border:solid 1px #000000; color:#666666'  /></td></tr><tr><td>�������ڣ�</td><td><input name='chubanriqi' type='text' id='chubanriqi' value='' onclick="getDate(form1.chubanriqi,'2')" need="1" style='border:solid 1px #000000; color:#666666' /></td></tr><tr><td>ҳ����</td><td><input name='yeshu' type='text' id='yeshu' value='' style='border:solid 1px #000000; color:#666666' /></td></tr><tr><td>�۸�</td><td><input name='jiage' type='text' id='jiage' value='' style='border:solid 1px #000000; color:#666666' />&nbsp;*</td></tr><tr><td>ͼƬ��</td><td><input name='tupian' type='text' id='tupian' value='' size='50' style='border:solid 1px #000000; color:#666666'  />&nbsp;<a href="javaScript:OpenScript('upfile.php?Result=tupian',460,180)"><img src="Images/Upload.gif" width="30" height="16" border="0" align="absmiddle" /></a></td></tr><tr><td>��������Σ�</td><td><select name='heshinianlingduan' id='heshinianlingduan' style='border:solid 1px #000000; color:#666666'>
	<option value="1-7">1-7</option>
	    <option value="8-16">8-16</option>
	    <option value="17-40">17-40</option>
	    <option value="41����">41����</option>
	</select></td></tr><tr><td>��棺</td>
	<td><input name='dianjilv' type='text' id='dianjilv' value='' style='border:solid 1px #000000; color:#666666' /></td></tr><tr><td>��ע��</td><td><textarea name='beizhu' cols='50' rows='8' id='beizhu' style='border:solid 1px #000000; color:#666666'></textarea></td></tr>

    <tr>
      <td>&nbsp;</td>
      <td><input type="hidden" name="addnew" value="1" />
        <input type="submit" name="Submit" value="���" onclick="return check();"  style='border:solid 1px #000000; color:#666666' />
      <input type="reset" name="Submit2" value="����" style='border:solid 1px #000000; color:#666666' /></td>
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
			echo "<script>javascript:alert('�Բ��𣬸�ͼ������Ѿ����ڣ��뻻����ͼ�����!');history.back();</script>";
		}
		
	}
?>
</body>
</html>

