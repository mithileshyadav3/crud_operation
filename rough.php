<?php
require_once('connect.php');
$obj=new Database();
if(isset($_POST['updatusers']) ){
      $id=$_POST['id'];
      $fname=$_POST['fname'];
      $lname=$_POST['lname'];
      $email=$_POST['email'];
      $phone=$_POST['phone'];
      $obj->update($id,$fname,$lname,$email,$phone);


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
</head>
<body>
<div class="modal-body">
      <form action="" id="updateform" method="post">
      <input type="text" name="id" id="fname" class="form-control mb-2" >
      <input type="text" name="fname" id="fname" class="form-control mb-2" >
        <input type="text" name="lname" id="lname" class="form-control mb-2">
        <input type="text" name="email" id="email" class="form-control mb-2" >
        <input type="text" name="phone" id="phone" class="form-control mb-2" >
<input type="submit" name="updatusers" id="updateuser" value="update users" class=" btn btn-success">
      </form>
      </div>
</body>
</html>