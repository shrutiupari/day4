<?php
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $expensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
    
      if(empty($errors)==true){
		  $target_Path = "/var/www/html/day4-master/";
	$target_Path = $target_Path.basename( $_FILES['userFile']['name'] );
     echo "Success.. File Uploaded";
         move_uploaded_file($file_tmp,"/var/www/html/day4-master".$file_name);
        
      }else{
         print_r($errors);
      }
   }
   $emailErr = $mobileErr= "";
   $email = $mobile = $address = "";
   
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required.";
  } else {
    $email = $_POST["email"];
  }
    
  if (empty($_POST["mobileno"])) {
    $mobileErr = "Mobile is required.";
  } else {
    $mobile = $_POST["mobileno"];
  }

  }

?>
<html>
	<body>
            <p>Your Name:<?php echo $_POST['uname'];?></p><br/>
            <p>Email:<?php echo $_POST['email'];?></p><br/>
            <p>Mobile Number:<?php echo $_POST['mobileno'];?></p><br/>
            <p>Address:<?php echo $_POST['address'];?><p><br/>
	</body>
</html>