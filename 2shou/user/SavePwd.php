<?PHP
ob_start();
include('isUser.php');
?>
<html>
<head>
<title>�û������޸�</title>
</head>
<body>
<?PHP
  session_start();
  $OriPwd=$_POST["OriPwd"];
  $Pwd=$_POST["Pwd"];
  //����SQL��䣬�ж��Ƿ���ڴ��û�
  include_once '..\Class\Users.php';
  $objUser = new Users();
  $objUser->UserId = $_GET["uid"];
  $objUser->UserPwd = $OriPwd;
  if($objUser->CheckUser()==false)
  {
    print ("�����ڴ��û������������");
?>
	<Script Language="JavaScript">	
      setTimeout("history.go(-1)",1600);	  	  
  	</Script>
<?PHP  
  }
  else
  {
     $objUser->UserPwd = $Pwd;
	 $objUser->setpwd($objUser->UserId);
     echo "<script>alert('�����޸ĳɹ���');</script>";
     $_SESSION["UserPwd"]=trim($Pwd);
?>
    <Script Language="JavaScript">
      setTimeout("window.close()",1600);	
    </Script>
<?PHP  
} 
?>	
</body>
</html>