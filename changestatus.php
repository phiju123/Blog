<?php
 $conn = new mysqli("localhost", "root", "", "myblog");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


	session_start();

  $id=$_REQUEST["id"];
   
 $sql="SELECT * from member WHERE memberid='$id'";
 $result=mysqli_query($conn,$sql);
 if($result){
    while($row = mysqli_fetch_assoc($result)) {
         if($row["permissions"]=="norights"){
         	$sql1="UPDATE member set permissions='1' WHERE memberid='$id'";	
         }else if($row["status"]=="staff"){
         	$sql1="UPDATE member set permissions='2' WHERE  memberid='$id'";
         }else{
         	$sql1="UPDATE member set permissions='0' WHERE memberid='$id'";
         }

         $re=mysqli_query($conn,$sql1);
         header("Location: {$_SERVER["HTTP_REFERER"]}");
   }
  }              


?>