<?php 
include_once 'conn.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>���ļ�¼</title><script language="javascript" src="js/Calendar.js"></script><link rel="stylesheet" href="css.css" type="text/css">
</head>

<body>

<p>���н��ļ�¼�б�</p>
<form id="form1" name="form1" method="post" action="">
  ͼ�����
    <input name="tushudaima" type="text" id="tushudaima" size="15" />
ͼ������
<input name="tushumingcheng" type="text" id="tushumingcheng" size="15" />
ͼ�����
<input name="tushufenlei" type="text" id="tushufenlei" size="15" />
ͼ������
<input name="tushuzuozhe" type="text" id="tushuzuozhe" size="15" />
�Ƿ�黹
<select name='shifouguihuan' id='shifouguihuan' style='border:solid 1px #000000; color:#666666'>
  <option value="">����</option>
  <option value="��">��</option>
  <option value="��">��</option>
</select>
 ������
 <input name="jieyueren" type="text" id="jieyueren" size="15" />
  <input type="submit" name="Submit" value="����" style='border:solid 1px #000000; color:#666666' />
</form>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="border-collapse:collapse">  
  <tr>
    <td width="25" bgcolor="#CCFFFF">���</td>
    <td bgcolor='#CCFFFF'>ͼ�����</td><td bgcolor='#CCFFFF'>ͼ������</td><td bgcolor='#CCFFFF'>ͼ�����</td><td bgcolor='#CCFFFF'>ͼ������</td><td bgcolor='#CCFFFF'>���</td><td bgcolor='#CCFFFF'>��������</td><td bgcolor='#CCFFFF'>Ԥ������</td><td bgcolor='#CCFFFF'>�Ƿ�黹</td><td bgcolor='#CCFFFF'>�黹ʱ��</td><td bgcolor='#CCFFFF'>��ע</td><td bgcolor='#CCFFFF'>������</td><td bgcolor='#CCFFFF' width='80' align='center'>�Ƿ����</td>
    <td width="120" align="center" bgcolor="#CCFFFF">���ʱ��</td>
    <td width="70" align="center" bgcolor="#CCFFFF">����</td>
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
  $pagelarge=10;//ÿҳ������
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
    <td><?php echo mysql_result($query,$i,tushudaima);?></td><td><?php echo mysql_result($query,$i,tushumingcheng);?></td><td><?php echo mysql_result($query,$i,tushufenlei);?></td><td><?php echo mysql_result($query,$i,tushuzuozhe);?></td><td><?php echo mysql_result($query,$i,kucun);?></td><td><?php echo mysql_result($query,$i,jieyongshuliang);?></td><td><?php echo mysql_result($query,$i,yujietianshu);?></td><td><?php echo mysql_result($query,$i,shifouguihuan);?></td><td><?php echo mysql_result($query,$i,guihuanshijian);?></td><td><?php echo mysql_result($query,$i,beizhu);?></td><td><?php echo mysql_result($query,$i,jieyueren);?></td><td width='80' align='center'><a href="sh.php?id=<?php echo mysql_result($query,$i,"id") ?>&yuan=<?php echo mysql_result($query,$i,"issh")?>&tablename=jieyuejilu" onclick="return confirm('��ȷ��Ҫִ�д˲�����')"><?php echo mysql_result($query,$i,"issh")?></a></td>
    <td width="120" align="center"><?php
echo mysql_result($query,$i,"addtime");
?></td>
    <td width="70" align="center"><a href="del.php?id=<?php
		echo mysql_result($query,$i,"id");
	?>&tablename=jieyuejilu" onclick="return confirm('���Ҫɾ����')">ɾ��</a> <a href="jieyuejilu_updt.php?id=<?php
		echo mysql_result($query,$i,"id");
	?>">�޸�</a></td>
  </tr>
  	<?php
	}
}
?>
</table>
<p>�������ݹ�<?php
		echo $rowscount;
	?>��,
  <input type="button" name="Submit2" onclick="javascript:window.print();" value="��ӡ��ҳ" style='border:solid 1px #000000; color:#666666' />
</p>
<p align="center"><a href="jieyuejilu_list.php?pagecurrent=1">��ҳ</a>, <a href="jieyuejilu_list.php?pagecurrent=<?php echo $pagecurrent-1;?>">ǰһҳ</a> ,<a href="jieyuejilu_list.php?pagecurrent=<?php echo $pagecurrent+1;?>">��һҳ</a>, <a href="jieyuejilu_list.php?pagecurrent=<?php echo $pagecount;?>">ĩҳ</a>, ��ǰ��<?php echo $pagecurrent;?>ҳ,��<?php echo $pagecount;?>ҳ </p>

<p>&nbsp; </p>

</body>
</html>

