
<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body>
        <form method="post" action="loginProcess.php">
            <input type="text" name="username"/>
            <input type="password" name="password"/>
            <input type="submit" value="Login"/>
        </form>
        <?php
        if(isset($_GET["loginStatus"])) {
          echo "Wrong username or password";
        }
        
        ?>
        <script type="text/javascript" src="script.js"></script>
    </body>
</html>