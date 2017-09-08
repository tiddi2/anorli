<?php
    function generateRGBA () {
        return rand(0,255). "," . rand(0,255) . ",". rand(0,255) ."," . (rand(0,100)/100);

    }
    function generateRGB () {
        return rand(0,255). "," . rand(0,255) . ",". rand(0,255);

    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Random background color </title>
        <meta charset="utf-8" />
        <style type="text/css">
            body {
                background-color:rgba( <?=generateRGBA()?> );

            
            }
            h1 {
                color:rgba( <?=generateRGBA()?> );
                background-color:rgb(<?=generateRGB()?> );


            }
            h2 {
                background-color:rgba( <?=generateRGBA()?> ) ;
            }
        </style>
    </head>
    <body>
        <h1>Welcome</h1>
        <h2>Hello</h2>
    </body>
</html>