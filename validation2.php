<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <script src="https://code.jquery.com/jquery-3.7.1.js"
                integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>
<body>
</body>
</html>
<?php
include ("config.php");

?>
<form method="post">
        <p>Name</p>
        <input type="text" name="name" id="nm1">
        <p id="nd"></p>

        <p>Contact</p>
        <input type="text" name="contact" id="nm3">
        <p id="co"></p>

        <p>Email</p>
        <input type="text" name="email" id="nm2">
        <p id="ed"></p>

        <p>Password</p>
        <input type="password" name="password" id="nm4">
        <p id="pa"></p>

        <input type="submit" name="submit">
</form>
<script>
      
        $(document).ready(function () {
                
                $("input:submit").click(function () {        
                        var regex ="/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}$/i";   
                        $("#nd").text("")
                        $("#co").text("")
                        $("#ed").text("")
                        $("#pa").text("")

                        var N = $("#nm1").val();
                        var C = $("#nm3").val();
                        var E = $("#nm2").val();
                        var P = $("#nm4").val();
                        alert(regex)
                        alert(P)
                        // alert("alert",P.test(regex))
                        if (N == "") {
                                console.log("hello");
                                $("#nd").text("NAME IS REQAIRE").css("color", "red")
                        }

                        else if (N.length < 5) {

                                $("#nd").text("NAME LENGTH").css("color", "red")

                        }
                        else if (C == "") {

                                $("#co").text("NUMBER IS REQAIRE").css("color", "red")

                        }
                        else if (C.length != 10) {

                                $("#co").text("NUMBER LENGTH").css("color", "red")

                        }
                        else if (E == "") {

                                $("#ed").text("EMAIL IS REQAIRE").css("color", "red")

                        }
                        else if (!E.match("@")) {

                                $("#ed").text("@ IS REQAIRE").css("color", "red")

                        }
                        else if (P == "") {

                                $("#pa").text("PASSWORD IS REQAIRE").css("color", "red")
                        }
                        else if (P.length <= 6) {
                                $("#pa").text("PASSWORD LENGTH").css("color", "red")
                        }
                        else if(P.match(regex)==null)
                        {
                                $("#pa").text("AT LIST ONE LETTER CAPITAL").css("color", "red")
                        }
                        else 
                        <?php
                                if (isset($_POST['submit'])) {
                                        $name = $_POST['name'];
                                        $password = $_POST['password'];
                                        $email = $_POST['email'];
                                        $contact = $_POST['contact'];

                                        $select = "select * from register1 where Email='$email'";
                                        $res = mysqli_query($connection, $select);

                                        $query = "insert into register1  (Name,Contact,Password,Email) values('$name','$contact','$email','$password')";
                                        $result = mysqli_query($connection, $query);
                                        if ($result) {
                                                echo "Submit";

                                        } else {
                                                 echo "not submit";
                                        }
                                }else{
                                        echo "Not submit";
                                }
                                ?>
                        
                        return false;
                })
        })
</script>