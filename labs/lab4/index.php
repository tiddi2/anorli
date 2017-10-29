<?php
if (isset($_GET['keyword']) ) {
    $keyword = $_GET['keyword'];
    if (!empty($_GET['category']) ) {  //an option was selected in drop down menu
        $keyword = $_GET['category'];
    }
    
    include 'api/pixabayAPI.php';
    $imageURLs = (isset($_GET['layout']))?getImageURLs($keyword, $_GET['layout']):getImageURLs($keyword);
    $backGroundImage = $imageURLs[rand(0,count($imageURLs))];
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <style>
        @import url("css/styles.css");
          body {
            background-image: url('<?php echo (empty($backGroundImage))?"img/sea.jpg":$backGroundImage; ?>');
          }
        </style>
    </head>
    <body>
      <br/> <br/>
      <form>
        <input type="text" name="keyword" placeholder="Keyword">
        <div id="layoutDiv">
          <input type="radio" name="layout" value="horizontal" id="layout_h" />
          <label for="layout_h"> Horizontal </label><br />
          <input type="radio" name="layout" value="vertical" id="layout_v"   />
           <label for="layout_v"> Vertical </label><br />
        </div>
        <br />
        <select name="category" style="color:black; font-size:1.5em">
          <option value=""> - Select One - </option>
          <option value="ocean"  > Sea </option>
          <option > Mountains </option>
          <option > Forest </option>
          <option > Sky </option>
        </select><br /><br />
        
             
        </form>
        
      <?php
        
        if (!isset($_GET["keyword"])) {
            echo "<h2>Type a keyword to display a slideshow with random images from Pixabay.com</h2>";
        } 
        else {
          if (empty($_GET['keyword']) && empty($_GET['category']) )  {
            echo "<h2 style='color:red'> ERROR: You must select a category or type a keyword</h2>";
            exit; 
          }
      ?>
            
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" >
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <?php
                  for($i = 0; $i < 7;$i++) {
                    echo "<li data-target='#carousel-example-generic' data-slide-to='$i' ";
                    echo ($i == 0)?"class='active'":"";
                    echo "></li>";
                  }
                ?>
              </ol>
              
              <!-- Wrapper for slides -->
              <div class="carousel-inner" role="listbox">
               <?php
                  for($i = 0; $i < 7;$i++) {
                   do {
                     $randomIndex = rand(0, count($imageURLs));
                   }
                   while( !isset($imageURLs[$randomIndex]));
                   echo '<div class="item ';
                   echo($i==0)? "active":"";
                   echo '">';
                   echo '<img src="' . $imageURLs[$randomIndex] . '">';
                   echo '</div>';
                   unset($imageURLs[$randomIndex]);
                  }
                ?>
                
                  
                ...
              </div>
            
              <!-- Controls -->
               <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
            
        <?php    
            
        } 
        
        ?>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>