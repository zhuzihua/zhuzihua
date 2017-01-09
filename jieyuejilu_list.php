<?php 
include_once 'conn.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>借阅记录</title><script language="javascript" src="js/Calendar.js"></script><link rel="stylesheet" href="css.css" type="text/css">
</head>

<body>

<p>已有借阅记录列表：</p>
<form id="form1" name="form1" method="post" action="">
  图书代码
    <input name="tushudaima" type="text" id="tushudaima" size="15" />
图书名称
<input name="tushumingcheng" type="text" id="tushumingcheng" size="15" />
图书分类
<input name="tushufenlei" type="text" id="tushufenlei" size="15" />
图书作者
<input name="tushuzuozhe" type="text" id="tushuzuozhe" size="15" />
是否归还
<select name='shifouguihuan' id='shifouguihuan' style='border:solid 1px #000000; color:#666666'>
  <option value="">所有</option>
  <option value="否">否</option>
  <option value="是">是</option>
</select>
 借阅人
 <input name="jieyueren" type="text" id="jieyueren" size="15" />
  <input type="submit" name="Submit" value="查找" style='border:solid 1px #000000; color:#666666' />
</form>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="border-collapse:collapse">  
  <tr>
    <td width="25" bgcolor="#CCFFFF">序号</td>
    <td bgcolor='#CCFFFF'>图书代码</td><td bgcolor='#CCFFFF'>图书名称</td><td bgcolor='#CCFFFF'>图书分类</td><td bgcolor='#CCFFFF'>图书作者</td><td bgcolor='#CCFFFF'>库存</td><td bgcolor='#CCFFFF'>借用数量</td><td bgcolor='#CCFFFF'>预借天数</td><td bgcolor='#CCFFFF'>是否归还</td><td bgcolor='#CCFFFF'>归还时间</td><td bgcolor='#CCFFFF'>备注</td><td bgcolor='#CCFFFF'>借阅人</td><td bgcolor='#CCFFFF' width='80' align='center'>是否审核</td>
    <td width="120" align="center" bgcolor="#CCFFFF">添加时间</td>
    <td width="70" align="center" bgcolor="#CCFFFF">操作</td>
  </tr>
  <?php 
    $sql="select * from jieyuejilu where 1=1";
  
if ($_POST["tushudaima"]!=""){$nreqtushudaima=$_POST["tushudaima"];$sql=$sql." and tushudaima like '%$nreqtushudaima%'";}
if ($_POST["tushumingcheng"]!=""){$nreqtushumingcheng=$_POST["tushumingcheng"];$sql=$sql." and tushumingcheng like '%$nreqtushumingcheng%'";}
if ($_POST["tushufenlei"]!=""){$nreqtushufenlei=$_POST["tushufenlei"];$sql=$sql." and tushufenlei like '%$nreqtushufenlei%'";}
if ($_POST["tushuzuozhe"]!=""){$nreqtushuzuozhe=$_POST["tushuzuozhe"];$sql=$sql." and tushuzuozhe like '%$nreqtushuzuozhe%'";}
if ($_POST["shifouguihuan"]!=""){$nreqshifouguihuan=$_POST["shifouguihuan"];$sql=$sql." and shifouguihuan like '%$nreqshifouguihuan%'";}
if ($_POST["jieyueren"]!=""){$nreqjieyueren=$_POST["jieyueren"];$sql=$sql." and jieyueren like '%$nreqjieyueren%'";}
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
    <td><?php echo mysql_result($query,$i,tushudaima);?></td><td><?php echo mysql_result($query,$i,tushumingcheng);?></td><td><?php echo mysql_result($query,$i,tushufenlei);?></td><td><?php echo mysql_result($query,$i,tushuzuozhe);?></td><td><?php echo mysql_result($query,$i,kucun);?></td><td><?php echo mysql_result($query,$i,jieyongshuliang);?></td><td><?php echo mysql_result($query,$i,yujietianshu);?></td><td><?php echo mysql_result($query,$i,shifouguihuan);?></td><td><?php echo mysql_result($query,$i,guihuanshijian);?></td><td><?php echo mysql_result($query,$i,beizhu);?></td><td><?php echo mysql_result($query,$i,jieyueren);?></td><td width='80' align='center'><a href="sh.php?id=<?php echo mysql_result($query,$i,"id") ?>&yuan=<?php echo mysql_result($query,$i,"issh")?>&tablename=jieyuejilu" onclick="return confirm('您确定要执行此操作？')"><?php echo mysql_result($query,$i,"issh")?></a></td>
    <td width="120" align="center"><?php
echo mysql_result($query,$i,"addtime");
?></td>
    <td width="70" align="center"><a href="del.php?id=<?php
		echo mysql_result($query,$i,"id");
	?>&tablename=jieyuejilu" onclick="return confirm('真的要删除？')">删除</a> <a href="jieyuejilu_updt.php?id=<?php
		echo mysql_result($query,$i,"id");
	?>">修改</a></td>
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
<p align="center"><a href="jieyuejilu_list.php?pagecurrent=1">首页</a>, <a href="jieyuejilu_list.php?pagecurrent=<?php echo $pagecurrent-1;?>">前一页</a> ,<a href="jieyuejilu_list.php?pagecurrent=<?php echo $pagecurrent+1;?>">后一页</a>, <a href="jieyuejilu_list.php?pagecurrent=<?php echo $pagecount;?>">末页</a>, 当前第<?php echo $pagecurrent;?>页,共<?php echo $pagecount;?>页 </p>

<p>&nbsp; </p>

</body>
</html>

