<?php 
include_once 'conn.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>ͼ����Ϣ</title><script language="javascript" src="js/Calendar.js"></script><link rel="stylesheet" href="css.css" type="text/css">
</head>

<body>

<p>����ͼ����Ϣ�б�</p>
<form id="form1" name="form1" method="post" action="">
  ����: ͼ����룺<input name="tushudaima" type="text" id="tushudaima" /> ͼ�����ƣ�<input name="tushumingcheng" type="text" id="tushumingcheng" /> ͼ����ࣺ<select name='tushufenlei' id='tushufenlei'><option value="">����</option><?php getoption("shangpinleibie","leibie")?></select></select> ͼ�����ߣ�<input name="tushuzuozhe" type="text" id="tushuzuozhe" /> �����磺<input name="chubanshe" type="text" id="chubanshe" /> �������ڣ�<input name="chubanriqi1" type="text" id="chubanriqi1"  value='' onclick="getDate(form1.chubanriqi1,'2')" size="10" need="1" />-<input name="chubanriqi2" type="text" id="chubanriqi2"  value='' onclick="getDate(form1.chubanriqi2,'2')" size="10" need="1" /> ��������Σ�<select name='heshinianlingduan' id='heshinianlingduan'>
 <option value="">����</option>
 <option value="1-7">1-7</option>
	    <option value="8-16">8-16</option>
	    <option value="17-40">17-40</option>
	    <option value="41����">41����</option>
  </select>
  <input type="submit" name="Submit" value="����" style='border:solid 1px #000000; color:#666666' />
</form>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="border-collapse:collapse">  
  <tr>
    <td width="31" bgcolor="#CCFFFF">���</td>
    <td width="75" bgcolor='#CCFFFF'>ͼ�����</td>
    <td width="75" bgcolor='#CCFFFF'>ͼ������</td>
    <td width="75" bgcolor='#CCFFFF'>ͼ�����</td>
    <td width="75" bgcolor='#CCFFFF'>ͼ������</td>
    <td width="58" bgcolor='#CCFFFF'>������</td>
    <td width="75" bgcolor='#CCFFFF'>��������</td>
    <td width="40" bgcolor='#CCFFFF'>ҳ��</td>
    <td width="40" bgcolor='#CCFFFF'>�۸�</td>
    <td bgcolor='#CCFFFF'>ͼƬ</td><td width="93" bgcolor='#CCFFFF'>���������</td><td width="75" bgcolor='#CCFFFF'>���</td>
    <td width="61" align="center" bgcolor="#CCFFFF">����</td>
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
    <td width="31"><?php
	echo $i+1;
?></td>
    <td><?php echo mysql_result($query,$i,tushudaima);?></td><td><?php echo mysql_result($query,$i,tushumingcheng);?></td><td><?php echo mysql_result($query,$i,tushufenlei);?></td><td><?php echo mysql_result($query,$i,tushuzuozhe);?></td><td><?php echo mysql_result($query,$i,chubanshe);?></td><td><?php echo mysql_result($query,$i,chubanriqi);?></td><td><?php echo mysql_result($query,$i,yeshu);?></td><td><?php echo mysql_result($query,$i,jiage);?></td><td width='95'><a href="<?php echo mysql_result($query,$i,tupian) ?>" target='_blank'><img src='<?php echo mysql_result($query,$i,tupian) ?>' width='80' height='88' border='0'></a></td><td><?php echo mysql_result($query,$i,heshinianlingduan);?></td><td><?php echo mysql_result($query,$i,dianjilv);?></td>
    <td width="61" align="center"><a href="jieyuejilu_add.php?id=<?php echo mysql_result($query,$i,"id");?>">����</a> <a href="tushuxinxi_detail.php?id=<?php echo mysql_result($query,$i,"id");?>">��ϸ</a></td>
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
<p align="center"><a href="tushuxinxi_list3.php?pagecurrent=1">��ҳ</a>, <a href="tushuxinxi_list3.php?pagecurrent=<?php echo $pagecurrent-1;?>">ǰһҳ</a> ,<a href="tushuxinxi_list3.php?pagecurrent=<?php echo $pagecurrent+1;?>">��һҳ</a>, <a href="tushuxinxi_list3.php?pagecurrent=<?php echo $pagecount;?>">ĩҳ</a>, ��ǰ��<?php echo $pagecurrent;?>ҳ,��<?php echo $pagecount;?>ҳ </p>

<p>&nbsp; </p>

</body>
</html>

