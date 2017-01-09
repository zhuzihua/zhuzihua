<?php 
$id=$_GET["id"];
include_once 'conn.php';
$ndate =date("Y-m-d");
$addnew=$_POST["addnew"];
if ($addnew=="1" )
{

	$tushudaima=$_POST["tushudaima"];$tushumingcheng=$_POST["tushumingcheng"];$tushufenlei=$_POST["tushufenlei"];$tushuzuozhe=$_POST["tushuzuozhe"];$chubanshe=$_POST["chubanshe"];$chubanriqi=$_POST["chubanriqi"];$yeshu=$_POST["yeshu"];$jiage=$_POST["jiage"];$tupian=$_POST["tupian"];$heshinianlingduan=$_POST["heshinianlingduan"];$dianjilv=$_POST["dianjilv"];$beizhu=$_POST["beizhu"];
	$sql="update tushuxinxi set tushudaima='$tushudaima',tushumingcheng='$tushumingcheng',tushufenlei='$tushufenlei',tushuzuozhe='$tushuzuozhe',chubanshe='$chubanshe',chubanriqi='$chubanriqi',yeshu='$yeshu',jiage='$jiage',tupian='$tupian',heshinianlingduan='$heshinianlingduan',dianjilv='$dianjilv',beizhu='$beizhu' where id= ".$id;
	mysql_query($sql);
	echo "<script>javascript:alert('修改成功!');location.href='tushuxinxi_list.php';</script>";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>修改图书信息</title><link rel="stylesheet" href="css.css" type="text/css"><script language="javascript" src="js/Calendar.js"></script>
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
<p>修改图书信息： 当前日期： <?php echo $ndate; ?></p>
<?php
$sql="select * from tushuxinxi where id=".$id;
$query=mysql_query($sql);
$rowscount=mysql_num_rows($query);
if($rowscount>0)
{
?>
<form id="form1" name="form1" method="post" action="">
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="border-collapse:collapse"> 

      <tr><td>图书代码：</td><td><input name='tushudaima' type='text' id='tushudaima' value='<?php echo mysql_result($query,$i,tushudaima);?>' /></td></tr><tr><td>图书名称：</td><td><input name='tushumingcheng' type='text' id='tushumingcheng' size='50' value='<?php echo mysql_result($query,$i,tushumingcheng);?>' /></td></tr><tr><td>图书分类：</td><td><select name='tushufenlei' id='tushufenlei'><?php getoption("shangpinleibie","leibie")?></select></select></td></tr><script language="javascript">document.form1.tushufenlei.value='<?php echo mysql_result($query,$i,tushufenlei);?>';</script><tr><td>图书作者：</td><td><input name='tushuzuozhe' type='text' id='tushuzuozhe' value='<?php echo mysql_result($query,$i,tushuzuozhe);?>' /></td></tr><tr><td>出版社：</td><td><input name='chubanshe' type='text' id='chubanshe' size='50' value='<?php echo mysql_result($query,$i,chubanshe);?>' /></td></tr><tr><td>出版日期：</td><td><input name='chubanriqi' type='text' id='chubanriqi' value='<?php echo mysql_result($query,$i,chubanriqi);?>' onclick="getDate(form1.chubanriqi,'2')" need="1" /></td></tr><tr><td>页数：</td><td><input name='yeshu' type='text' id='yeshu' value='<?php echo mysql_result($query,$i,yeshu);?>' /></td></tr><tr><td>价格：</td><td><input name='jiage' type='text' id='jiage' value='<?php echo mysql_result($query,$i,jiage);?>' /></td></tr><tr><td>图片：</td><td><input name='tupian' type='text' id='tupian' size='50'  value='<?php echo mysql_result($query,$i,tupian);?>' /> &nbsp;<a href="javaScript:OpenScript('upfile.php?Result=tupian',460,180)"><img src="Images/Upload.gif" width="30" height="16" border="0" align="absmiddle" /></a></td></tr><tr><td>合适年龄段：</td><td><select name='heshinianlingduan' id='heshinianlingduan'>
	  <option value="1-7">1-7</option>
	    <option value="8-16">8-16</option>
	    <option value="17-40">17-40</option>
	    <option value="41以上">41以上</option>
	  </select></td></tr><script language="javascript">document.form1.heshinianlingduan.value='<?php echo mysql_result($query,$i,heshinianlingduan);?>';</script><tr><td>库存：</td>
	  <td><input name='dianjilv' type='text' id='dianjilv' value='<?php echo mysql_result($query,$i,dianjilv);?>' /></td></tr><tr><td>备注：</td><td><textarea name='beizhu' cols='50' rows='8' id='beizhu'><?php echo mysql_result($query,$i,beizhu);?></textarea></td></tr>
   
   
    <tr>
      <td>&nbsp;</td>
      <td><input name="addnew" type="hidden" id="addnew" value="1" />
      <input type="submit" name="Submit" value="修改" style='border:solid 1px #000000; color:#666666' />
      <input type="reset" name="Submit2" value="重置" style='border:solid 1px #000000; color:#666666' /></td>
    </tr>
  </table>
</form>
<?php
	}
?>
<p>&nbsp;</p>
</body>
</html>

