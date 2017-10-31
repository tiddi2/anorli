<!DOCTYPE html>
<html>
    <head>
        <title>Lab 7: Admin login</title>
        <link rel="stylesheet" type="text/css" href="css/styles.css" />
    </head>
    <body>
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