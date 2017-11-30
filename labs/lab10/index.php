<!DOCTYPE html>
<html>
    <head>
        <title>Image gallery</title>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.0.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="style.css" type="text/css" />    
    </head>
    <body>
        <h1>Photo Gallery</h1>
        <form method="POST" enctype="multipart/form-data">
            Upload file:
            <input type="file" name="file" id="file" /> </br>
            <input type="submit" value="Upload" name="uploadForm"/>
        </form>
        
    <?php
    if (isset($_POST['uploadForm'])) {
        if ($_FILES["file"]["error"] > 0) {
            if($_FILES["file"]["error"] == 4) {
                echo "No file selected <br>";
            } else {
                echo "Error: " . $_FILES["file"]["error"] . "<br>";
            }
        }
        else {
            if($_FILES['file']['size'] < 1000000) {
                move_uploaded_file($_FILES['file']['tmp_name'],"gallery/". $_FILES['file']['name']);
            } else {
                echo "File size is too big </br>";
            }
        } 
    }
    $files = scandir ( "gallery", 1);
    for ($i = 0; $i < count($files)-2; $i++  ) {
          echo "<img id='$i' src='gallery/".  $files[$i] . "' width='100' > <br />";
        }
    ?>
    
    <script>
        $("img").click(function(){
            if($(this).attr("width") != 500) {
                $(this).attr("width","500");
            } else {
                $(this).attr("width","100");
            }
        })
    </script>
    </body>
</html>