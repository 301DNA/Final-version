<html>
<head>
<title>�鿴��Ʒ��Ϣ</title>
<link href=style.css rel=STYLESHEET type=text/css>
</head>
<body background="Image/bg/25.jpg">
<center>
<?PHP 
  include('Class/Goods.php');
  $gid=$_GET["gid"];
  $obj = new Goods();
  $obj->Add_ClickTimes($gid);  // ���ӵ������
  $obj->GetGoodsInfo($gid);  // ��ȡ��Ʒ��Ϣ
  include('Class/Users.php');
  //��ȡ������Ϣ
  $objUser = new Users();
  $objUser->GetUsersInfo($obj->OwnerId);
  //��ȡ��Ʒ����
  include('Class/GoodsType.php');
  $objType = new GoodsType();
  $objType->GetGoodsTypeInfo($obj->TypeId);
  print $objType->TypeId;
?>
<center><?PHP if($obj->ImageURL=="")
{
?>
	<img src="images/noImg.jpg" width=180 height=100 border=0>
<?PHP 
}
  else
{
?>
	<img src="user/images/<?PHP   echo($obj->ImageURL); ?>" height=200 border=0>
<?PHP 
} 
?>
</center>
<table align=center cellpadding=0 cellspacing=0 width=90% border=1 bordercolorlight="#4DA6FF" bordercolordark="#ECF5FF">
<tr><td align=center width=100% colspan=3 bgcolor=#eeeeee height=28><font color=#0000ff>
	��Ʒ��Ϣ</font></td></tr>
<tr><td align=right width=25% bgcolor=#eeeeee>��Ʒ���ƣ�</td><td align=left><?PHP echo($obj->GoodsName); ?></td></tr>
<tr><td align=right bgcolor=#eeeeee>�� �� �ߣ�</td><td align=left><?PHP echo($objUser->Name); ?></td></tr>
<tr><td align=right bgcolor=#eeeeee>����ʱ�䣺</td><td align=left>
	<?PHP echo($obj->StartTime); ?></td></tr>
<tr><td align=right bgcolor=#eeeeee>��Ʒ�۸�</td><td align=left><?PHP echo($obj->Price); ?></td></tr>
<tr><td align=right bgcolor=#eeeeee>�¾ɳ̶ȣ�</td><td align=left><?PHP echo($obj->OldNew); ?>&nbsp;</tr>
<tr><td align=right bgcolor=#eeeeee>��ϵ��ʽ��</td><td align=left><?PHP echo($objUser->Phone); ?>&nbsp;</td></tr>
<tr><td align=right bgcolor=#eeeeee>��Ʒ������</td>
<td align=left><textarea rows="2" name="adetail" cols="40"><?PHP echo($obj->GoodsDetail); ?></textarea></td></tr>
</table>
</form>
</center>
</body>
</html>