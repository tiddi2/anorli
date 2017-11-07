<!DOCTYPE html>
<html>
    <head>
        <title>Admin login</title>
    </head>
    <body>
        <a href = "../index.php">Go back</a>
        <form method="post" action="loginProcess.php">
             Username:<input type="text" name="username"/> <br>
             Password: <input type="password" name="password"/>
            <input type="submit" value="Login!" name="submit">
        </form>
        <?php
        if(isset($_GET["loginStatus"])) {
          echo "Wrong username or password";
        }
        
        ?>
    </body>
</html>