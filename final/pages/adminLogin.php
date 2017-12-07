<!DOCTYPE html>
<html>
    <head>
        <title>Admin login</title>
        <style type="text/css">
            form {
                border: 3px solid #f1f1f1;
                width: 40%;
                margin: 200px auto 0 auto;
                padding: 20px;
                
            }
            
            input[type=text], input[type=password] {
                width: 100%;
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                box-sizing: border-box;
            }
            
            input[type=submit] {
                background-color: #4CAF50;
                color: white;
                padding: 14px 20px;
                margin: 8px 0;
                border: none;
                cursor: pointer;
                width: 100%;
            }
            
            input[type=submit]:hover {
                opacity: 0.8;
            }
            
            a {
                width: auto;
                padding: 5px 18px;
                background-color: #f44336;
                text-decoration: none;
                color: white;
            }
            
        </style>
    </head>
    <body>
        <form method="post" action="loginProcess.php">
             Username:<input type="text" name="username"/> <br>
             Password: <input type="password" name="password"/>
            <input type="submit" value="Login!" name="submit">
            <a href = "../index.php">Go back</a>
        </form>
        <?php
        if(isset($_GET["loginStatus"])) {
          echo "Wrong username or password";
        }
        
        ?>
    </body>
</html>