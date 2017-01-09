<?php 
include_once 'conn.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>图书信息</title><script language="javascript" src="js/Calendar.js"></script><link rel="stylesheet" href="css.css" type="text/css">
</head>

<body>

<p>借阅统计：</p>
<form id="form1" name="form1" method="post" action="">
  搜索: 图书代码：<input name="tushudaima" type="text" id="tushudaima" /> 图书名称：<input name="tushumingcheng" type="text" id="tushumingcheng" /> 图书分类：<select name='tushufenlei' id='tushufenlei'><option value="">所有</option><?php getoption("shangpinleibie","leibie")?></select></select>
  <input type="submit" name="Submit" value="查找" style='border:solid 1px #000000; color:#666666' />
</form>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="border-collapse:collapse">  
  <tr>
    <td width="25" bgcolor="#CCFFFF">序号</td>
    <td bgcolor='#CCFFFF'>图书代码</td><td bgcolor='#CCFFFF'>图书名称</td><td bgcolor='#CCFFFF'>图书分类</td>
    <td bgcolor='#CCFFFF'>第一季度</td>
    <td bgcolor='#CCFFFF'>第二季度</td>
    <td bgcolor='#CCFFFF'>第三季度</td>
    <td bgcolor='#CCFFFF'>第四季度</td>
    <td bgcolor='#CCFFFF'>总量</td>
  </tr>
  <?php 
    $sql="select * from tushuxinxi where 1=1";
  
if ($_POST["tushudaima"]!=""){$nreqtushudaima=$_POST["tushudaima"];$sql=$sql." and tushudaima like '%$nreqtushudaima%'";}
if ($_POST["tushumingcheng"]!=""){$nreqtushumingcheng=$_POST["tushumingcheng"];$sql=$sql." and tushumingcheng like '%$nreqtushumingcheng%'";}
if ($_POST["tushufenlei"]!=""){$nreqtushufenlei=$_POST["tushufenlei"];$sql=$sql." and tushufenlei like '%$nreqtushufenlei%'";}
if ($_POST["tushuzuozhe"]!=""){$nreqtushuzuozhe=$_POST["tushuzuozhe"];$sql=$sql." and tushuzuozhe like '%$nreqtushuzuozhe%'";}
if ($_POST["chubanshe"]!=""){$nreqchubanshe=$_POST["chubanshe"];$sql=$sql." and chubanshe like '%$nreqchubanshe%'";}
if ($_POST["chubanriqi1"]!=""){$nreqchubanriqi1=$_POST["chubanriqi1"];$sql=$sql." and chubanriqi >= '$nreqchubanriqi1'";}
if ($_POST["chubanriqi2"]!=""){$nreqchubanriqi2=$_POST["chubanriqi2"];$sql=$sql." and chubanriqi <= '$nreqchubanriqi2'";}
if ($_POST["heshinianlingduan"]!=""){$nreqheshinianlingduan=$_POST["heshinianlingduan"];$sql=$sql." and heshinianlingduan like '%$nreqheshinianlingduan%'";}
  $sql=$sql." order by id desc";
  
$query=mysql_query($sql);
  $rowscount=mysql_num_rows($query);
  if($rowscount==0)
  {}
  else
  {
  $pagelarge=10;//每页行数；
  $pagecurrent=$_GET["pagecurrent"];
  if($rowscount%$pagelarge==0)
  {
		$pagecount=$rowscount/$pagelarge;
  }
  else
  {
   		$pagecount=intval($rowscount/$pagelarge)+1;
  }
  if($pagecurrent=="" || $pagecurrent<=0)
{
	$pagecurrent=1;
}
 
if($pagecurrent>$pagecount)
{
	$pagecurrent=$pagecount;
}
		$ddddd=$pagecurrent*$pagelarge;
	if($pagecurrent==$pagecount)
	{
		if($rowscount%$pagelarge==0)
		{
		$ddddd=$pagecurrent*$pagelarge;
		}
		else
		{
		$ddddd=$pagecurrent*$pagelarge-$pagelarge+$rowscount%$pagelarge;
		}
	}

	for($i=$pagecurrent*$pagelarge-$pagelarge;$i<$ddddd;$i++)
{
  ?>
  <tr>
    <td width="25"><?php
	echo $i+1;
?></td>
    <td><?php echo mysql_result($query,$i,tushudaima);?></td><td><?php echo mysql_result($query,$i,tushumingcheng);?></td><td><?php echo mysql_result($query,$i,tushufenlei);?></td><td><?php echo getxsl("1",mysql_result($query,$i,tushudaima));?></td><td><?php echo getxsl("2",mysql_result($query,$i,tushudaima));?></td><td><?php echo getxsl("3",mysql_result($query,$i,tushudaima));?></td><td><?php echo getxsl("4",mysql_result($query,$i,tushudaima));?></td><td><?php echo getxslz(mysql_result($query,$i,tushudaima));?></td>
  </tr>
  	<?php
	}
}
?>
</table>
<p>以上数据共<?php
		echo $rowscount;
	?>条,
  <input type="button" name="Submit2" onclick="javascript:window.print();" value="打印本页" style='border:solid 1px #000000; color:#666666' />
</p>
<p align="center"><a href="tushuxinxi_list2.php?pagecurrent=1">首页</a>, <a href="tushuxinxi_list2.php?pagecurrent=<?php echo $pagecurrent-1;?>">前一页</a> ,<a href="tushuxinxi_list2.php?pagecurrent=<?php echo $pagecurrent+1;?>">后一页</a>, <a href="tushuxinxi_list2.php?pagecurrent=<?php echo $pagecount;?>">末页</a>, 当前第<?php echo $pagecurrent;?>页,共<?php echo $pagecount;?>页 </p>

<p>&nbsp; </p>
<?php
function getxsl($njd,$nbh)
{
	if ($njd=="1")
	{
		$hsgsql="select count(id) as ss from jieyuejilu where tushudaima='$nbh' and addtime >='".date('Y', strtotime(date("Y-m-d")))."-1-1' and addtime <='".date('Y', strtotime(date("Y-m-d")))."-3-31'";
	}
	if ($njd=="2")
	{
		$hsgsql="select count(id) as ss from jieyuejilu where tushudaima='$nbh' and addtime >='".date('Y', strtotime(date("Y-m-d")))."-4-1' and addtime <='".date('Y', strtotime(date("Y-m-d")))."-6-30'";
	}
	if ($njd=="3")
	{
		$hsgsql="select count(id) as ss from jieyuejilu where tushudaima='$nbh' and addtime >='".date('Y', strtotime(date("Y-m-d")))."-7-1' and addtime <='".date('Y', strtotime(date("Y-m-d")))."-9-30'";
	}
	if ($njd=="4")
	{
		$hsgsql="select count(id) as ss from jieyuejilu where tushudaima='$nbh' and addtime >='".date('Y', strtotime(date("Y-m-d")))."-10-1' and addtime <='".date('Y', strtotime(date("Y-m-d")))."-12-31'";
	}
	//echo $hsgsql;
	$query=mysql_query($hsgsql);
		$rowscount=mysql_num_rows($query);
		if($rowscount>0)
		{
			echo mysql_result($query,0,ss);
		}
}
function getxslz($nbh)
{
	
		$hsgsql="select count(id) as ss from jieyuejilu where tushudaima='$nbh' and addtime >='".date('Y', strtotime(date("Y-m-d")))."-1-1' and addtime <='".date('Y', strtotime(date("Y-m-d")))."-12-31'";
	
	//echo $hsgsql;
	$query=mysql_query($hsgsql);
		$rowscount=mysql_num_rows($query);
		if($rowscount>0)
		{
			echo mysql_result($query,0,ss);
		}
}
?>
</body>
</html>

