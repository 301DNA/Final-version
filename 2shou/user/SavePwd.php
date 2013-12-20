<?PHP
ob_start();
include('isUser.php');
?>
<html>
<head>
<title>用户密码修改</title>
</head>
<body>
<?PHP
  session_start();
  $OriPwd=$_POST["OriPwd"];
  $Pwd=$_POST["Pwd"];
  //设置SQL语句，判断是否存在此用户
  include_once '..\Class\Users.php';
  $objUser = new Users();
  $objUser->UserId = $_GET["uid"];
  $objUser->UserPwd = $OriPwd;
  if($objUser->CheckUser()==false)
  {
    print ("不存在此用户名或密码错误！");
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
     echo "<script>alert('密码修改成功！');</script>";
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