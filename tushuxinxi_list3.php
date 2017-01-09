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

<p>已有图书信息列表：</p>
<form id="form1" name="form1" method="post" action="">
  搜索: 图书代码：<input name="tushudaima" type="text" id="tushudaima" /> 图书名称：<input name="tushumingcheng" type="text" id="tushumingcheng" /> 图书分类：<select name='tushufenlei' id='tushufenlei'><option value="">所有</option><?php getoption("shangpinleibie","leibie")?></select></select> 图书作者：<input name="tushuzuozhe" type="text" id="tushuzuozhe" /> 出版社：<input name="chubanshe" type="text" id="chubanshe" /> 出版日期：<input name="chubanriqi1" type="text" id="chubanriqi1"  value='' onclick="getDate(form1.chubanriqi1,'2')" size="10" need="1" />-<input name="chubanriqi2" type="text" id="chubanriqi2"  value='' onclick="getDate(form1.chubanriqi2,'2')" size="10" need="1" /> 合适年龄段：<select name='heshinianlingduan' id='heshinianlingduan'>
 <option value="">所有</option>
 <option value="1-7">1-7</option>
	    <option value="8-16">8-16</option>
	    <option value="17-40">17-40</option>
	    <option value="41以上">41以上</option>
  </select>
  <input type="submit" name="Submit" value="查找" style='border:solid 1px #000000; color:#666666' />
</form>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="border-collapse:collapse">  
  <tr>
    <td width="31" bgcolor="#CCFFFF">序号</td>
    <td width="75" bgcolor='#CCFFFF'>图书代码</td>
    <td width="75" bgcolor='#CCFFFF'>图书名称</td>
    <td width="75" bgcolor='#CCFFFF'>图书分类</td>
    <td width="75" bgcolor='#CCFFFF'>图书作者</td>
    <td width="58" bgcolor='#CCFFFF'>出版社</td>
    <td width="75" bgcolor='#CCFFFF'>出版日期</td>
    <td width="40" bgcolor='#CCFFFF'>页数</td>
    <td width="40" bgcolor='#CCFFFF'>价格</td>
    <td bgcolor='#CCFFFF'>图片</td><td width="93" bgcolor='#CCFFFF'>合适年龄段</td><td width="75" bgcolor='#CCFFFF'>库存</td>
    <td width="61" align="center" bgcolor="#CCFFFF">操作</td>
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
    <td width="31"><?php
	echo $i+1;
?></td>
    <td><?php echo mysql_result($query,$i,tushudaima);?></td><td><?php echo mysql_result($query,$i,tushumingcheng);?></td><td><?php echo mysql_result($query,$i,tushufenlei);?></td><td><?php echo mysql_result($query,$i,tushuzuozhe);?></td><td><?php echo mysql_result($query,$i,chubanshe);?></td><td><?php echo mysql_result($query,$i,chubanriqi);?></td><td><?php echo mysql_result($query,$i,yeshu);?></td><td><?php echo mysql_result($query,$i,jiage);?></td><td width='95'><a href="<?php echo mysql_result($query,$i,tupian) ?>" target='_blank'><img src='<?php echo mysql_result($query,$i,tupian) ?>' width='80' height='88' border='0'></a></td><td><?php echo mysql_result($query,$i,heshinianlingduan);?></td><td><?php echo mysql_result($query,$i,dianjilv);?></td>
    <td width="61" align="center"><a href="jieyuejilu_add.php?id=<?php echo mysql_result($query,$i,"id");?>">借书</a> <a href="tushuxinxi_detail.php?id=<?php echo mysql_result($query,$i,"id");?>">详细</a></td>
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
<p align="center"><a href="tushuxinxi_list3.php?pagecurrent=1">首页</a>, <a href="tushuxinxi_list3.php?pagecurrent=<?php echo $pagecurrent-1;?>">前一页</a> ,<a href="tushuxinxi_list3.php?pagecurrent=<?php echo $pagecurrent+1;?>">后一页</a>, <a href="tushuxinxi_list3.php?pagecurrent=<?php echo $pagecount;?>">末页</a>, 当前第<?php echo $pagecurrent;?>页,共<?php echo $pagecount;?>页 </p>

<p>&nbsp; </p>

</body>
</html>

