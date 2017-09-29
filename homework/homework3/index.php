<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Homework 4</title>
        <link rel="stylesheet" href="css/style.css" type="text/css" />
    </head>
    <body>
        <header>
        
            <form>
        <input type="text" id="searchBox" name="Search" value="<?=$_GET['Search']?>"/>
        Safe Search: <input type="checkbox" value="true" name="SS"/> 
        <div id="radioWrapper">
            <input type="radio" name="orientation" checked="checked" value="all"> All <br>
            <input type="radio" name="orientation" value="horizontal"> horizontal <br>
            <input type="radio" name="orientation" value="vertical"> vertical <br>
        </div>
        Results<select name="number">
            <option value="10" selected="selected">10</option>
            <option value="20">20</option>
            <option value="30">30</option>
            <option value="40">40</option>
            <option value="50">50</option>
            <option value="60">60</option>
            <option value="70">70</option>
            <option value="80">80</option>
            <option value="90">90</option>
            <option value="100">100</option> 
        </select> 
        <select name="type">
            <option value="all">All</option>
            <option value="photo">Photo</option>
            <option value="illustration">illustration</option>
            <option value="vector">vector</option>
        </select> 
        Sort by:<select name="order">
            <option value="popular">Popular</option>
            <option value="latest">latest</option>
        </select>
    <input type="submit" id="searchButton" value=" "/>
    </form> 
        </header>
   
    <div id="imageWrapper">
        
    <?php
    if($_GET['Search']) {
        $safeSearch;
        if(!$_GET['SS']) {
            $safeSearch = false;
        }
        include 'pixabayAPI.php';
        $imageURL = getImageURLsFromPixabay($_GET['Search'],$_GET['orientation'],$_GET['number'],$safeSearch,$_GET['type'],$_GET['order']);
        for($i = 0; $i < count($imageURL); $i++) {
            //if($imageURL[$i] !== null ) {
                echo "<img class='image' src='" . $imageURL[$i] ."''>";
            //}
        }
    } else {
        echo "Please enter a search word";
    }
    
?>
    </div>
    </body>
</html>