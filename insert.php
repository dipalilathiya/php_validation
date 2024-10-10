<?php 
     include("config.php");
     if(isset($_POST['submit']))
     {
      $name=$_POST['name'];
      $password=$_POST['password'];
      $email=$_POST['email'];
      $contact=$_POST['contact'];
      $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 
      $select="select * from register1 where Email='$email'";
      $res=mysqli_query($connection,$select);
    //    mysqli_num_rows($res);
      if(strlen($_POST['password'])<8)
      {
        echo "<h4>Password length</h4>";
      }
      if(strlen($_POST['contact'])<10)
      {
        echo "<h4>Contact length</h4>";
      }
      if(!preg_match("/[a-z]/i",$_POST['password']))
      {
        echo "<h4>At least one letter<br></h4>";
      }
      if(!preg_match("/[A-Z]/i",$_POST['password']))
      {
        echo "<h4>At least one Capital letter<br></h4>";
      }
      if(!preg_match("/[0-9]/i",$_POST['password']))
      {
        echo "<h4>At least one digit<br></h4>";
      }
      if(!preg_match($regex, $email))
      {   
        echo "<h4>@ reqvaire<br></h4 >";
      }
      if(!empty($name) &&  !empty($email) && !empty($passsword) && !empty($contact) && (strlen($_POST['password']>8)) && (strlen($_POST['contact']==10)) && (preg_match("/[a-z]/i",$_POST['password'])) && (preg_match("/[A-Z]/i",$_POST['password']))  && (preg_match("/[0-9]/i",$_POST['password'])))
      { 
          $query="insert into register1  (Name,Contact,Password,Email) values('$name','$contact','$email','$password')";
          $result=mysqli_query($connection,$query);
          if($result)
          {
            echo "Submit";
            
          }else{
            echo "not submit";
          }
    }
   } 
?>
<form method="post">
   <p>Name</p>
   <input type="text" name="name">
   <p>Contact</p>
   <input type="text" name="contact">
   <p>Email</p>
   <input type="text" name="email">
   <p>Password</p>
   <input type="password" name="password">
   <input type="submit" name="submit">
</form>
 