<?php
session_start();

?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�ޱ����ĵ�</title>
<link rel="stylesheet" href="skin/css/base.css" type="text/css" />
<link rel="stylesheet" href="skin/css/menu.css" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<script language='javascript'>var curopenItem = '1';</script>
<script language="javascript" type="text/javascript" src="skin/js/frame/menu.js"></script>
<base target="main" />
</head>

<body target="main">
<table width='99%' height="100%" border='0' cellspacing='0' cellpadding='0'>
  <tr>
    <td style='padding-left:3px;padding-top:8px' valign="top">
	<!-- Item 1 Strat -->
      <dl class='bitem'>
        <dt onClick='showHide("items1_1")'><b>ϵͳ�û�����</b></dt>
        <dd style='display:block' class='sitem' id='items1_1'>
          <ul class='sitemu'>
            <li>
              <div class='items'>
                <div class='fllct'><a href='yhzhgl.php' target='main'>ϵͳ����Ա����</a></div>
              </div>
            </li>
            <li><a href='yonghuzhuce_add.php' target='main'>��ͨ�û����</a> </li>
			<li><a href='yonghuzhuce_list.php' target='main'>��ͨ�û�����</a> </li>
            <li>
              <div class='items'>
                <div class='fllct'><a href='mod.php' target='main'>�޸ĸ�������</a></div>
              </div>
            </li>
          </ul>
        </dd>
      </dl>
      <!-- Item 1 End -->
      <!-- Item 2 Strat -->
      <dl class='bitem'>
        <dt onClick='showHide("items2_1")'><b>ͼ��������</b></dt>
        <dd style='display:block' class='sitem' id='items2_1'>
          <ul class='sitemu'>
            <li><a href='shangpinleibie_add.php' target='main'>ͼ��������</a></li>
            <li><a href='shangpinleibie_list.php' target='main'>ͼ������ѯ</a></li>
          </ul>
        </dd>
      </dl>
	  
	  <dl class='bitem'>
        <dt onClick='showHide("items3_1")'><b>ͼ����Ϣ����</b></dt>
        <dd style='display:block' class='sitem' id='items3_1'>
          <ul class='sitemu'>
            <li><a href='tushuxinxi_add.php' target='main'>ͼ����Ϣ���</a></li>
            <li><a href='tushuxinxi_list.php' target='main'>ͼ����Ϣ��ѯ</a></li>
          </ul>
        </dd>
      </dl>
	  
	  <dl class='bitem'>
        <dt onClick='showHide("items4_1")'><b>���Ĺ���</b></dt>
        <dd style='display:block' class='sitem' id='items4_1'>
          <ul class='sitemu'>
            <li><a href='jieyuejilu_list.php' target='main'>���ļ�¼�鿴</a></li>
           <li><a href='tushuxinxi_list2.php' target='main'>����ͳ��</a></li>
          </ul>
        </dd>
      </dl>
	  
	 <!-- <dl class='bitem'>
        <dt onClick='showHide("items5_1")'><b>ϵͳ����</b></dt>
        <dd style='display:block' class='sitem' id='items5_1'>
          <ul class='sitemu'>
            <li><a href='http://www.865171.cn' target='main'>�ٷ���վ</a></li>
            <li><a href='http://www.865171.cn/admin-templates/' target='main'>�����̨ģ��</a></li>
          </ul>
        </dd>
      </dl>
	  
	  <dl class='bitem'>
        <dt onClick='showHide("items6_1")'><b>ϵͳ����</b></dt>
        <dd style='display:block' class='sitem' id='items6_1'>
          <ul class='sitemu'>
            
            <li><a href='youqinglianjie_add.php' target='main'>�����������</a></li>
            <li><a href='youqinglianjie_list.php' target='main'>�������Ӳ�ѯ</a></li>
            <li><a href='liuyanban_list.php' target='main'>���Թ���</a></li>
            <li><a href='dx.php?lb=ϵͳ���' target='main'>ϵͳ�������</a></li>
            <li><a href='dx.php?lb=ϵͳ����' target='main'>ϵͳ��������</a></li>

          </ul>
        </dd>
      </dl>-->
      <!-- Item 2 End -->
	  </td>
  </tr>
</table>
</body>
</html>