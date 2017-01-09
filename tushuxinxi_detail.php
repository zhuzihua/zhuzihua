<?php
session_start();
include_once 'conn.php';
$id=$_GET["id"];
//xuyaodenglxu if($_SESSION["username"]=="")
//xuyaodenglxu {
//xuyaodenglxu	echo "<script>javascript:alert('对不起，请您先登陆！');location.href='index.php';/script>";
//xuyaodenglxu	exit;
//xuyaodenglxu }
?>
<html>
<head>
<title>图书信息</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" href="css.css" type="text/css">
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<p>
  <?php
$sql="select * from tushuxinxi where id=".$id;
$query=mysql_query($sql);
$rowscount=mysql_num_rows($query);
if($rowscount>0)
{
?>
</p>
<p>&nbsp;</p>
<table width="70%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="border-collapse:collapse">
  <tr>
    <td width='11%' height=22>图书代码：</td>
    <td width='39%' height="22"><?php echo mysql_result($query,0,tushudaima);?></td>
    <td  rowspan=10 align=center><a href=<?php echo mysql_result($query,0,tupian);?> target=_blank><img src=<?php echo mysql_result($query,0,tupian);?> width=228 height=215 border=0></a></td>
  </tr>
  <tr>
    <td width='11%' height=22>图书名称：</td>
    <td width='39%' height="22"><?php echo mysql_result($query,0,tushumingcheng);?></td>
  </tr>
  <tr>
    <td width='11%' height=22>图书分类：</td>
    <td width='39%' height="22"><?php echo mysql_result($query,0,tushufenlei);?></td>
  </tr>
  <tr>
    <td width='11%' height=22>图书作者：</td>
    <td width='39%' height="22"><?php echo mysql_result($query,0,tushuzuozhe);?></td>
  </tr>
  <tr>
    <td width='11%' height=22>出版社：</td>
    <td width='39%' height="22"><?php echo mysql_result($query,0,chubanshe);?></td>
  </tr>
  <tr>
    <td width='11%' height=22>出版日期：</td>
    <td width='39%' height="22"><?php echo mysql_result($query,0,chubanriqi);?></td>
  </tr>
  <tr>
    <td width='11%' height=22>页数：</td>
    <td width='39%' height="22"><?php echo mysql_result($query,0,yeshu);?></td>
  </tr>
  <tr>
    <td width='11%' height=22>价格：</td>
    <td width='39%' height="22"><?php echo mysql_result($query,0,jiage);?></td>
  </tr>
  <tr>
    <td width='11%' height=22>合适年龄段：</td>
    <td width='39%' height="22"><?php echo mysql_result($query,0,heshinianlingduan);?></td>
  </tr>
  <tr>
    <td width='11%' height=22>库存：</td>
    <td width='39%' height="22"><?php echo mysql_result($query,0,dianjilv);?></td>
  </tr>
  <tr>
    <td width='11%' height=100  >备注：</td>
    <td width='39%' colspan=2 height=100 ><?php echo mysql_result($query,0,beizhu);?></td>
  </tr>
  <tr>
    <td colspan=3 align=center><input type=button name=Submit5 value=返回 onClick="javascript:history.back()" style='border:solid 1px #000000; color:#666666'  /></td>
  </tr>
</table>
<?php
	}
?>

</body>
</html>
