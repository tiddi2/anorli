<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Homework 3</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css" type="text/css" />
    </head>
    <body>
        <nav class="navbar">
        <form class="form-inline .navbar-nav">
        <input type="text" id="searchBox" class="form-control" name="Search" value="<?=$_GET['Search']?>"/>
        <span class=".navbar-text">Safe Search:</span>
        <input type="checkbox" value="true" name="SS"/> 
        <div id="radioWrapper" class= ".form-inline">
            <input type="radio" name="orientation" value="all" id="orientation_all"   checked="checked">
            <label for="orientation.all"> All </label><br />
            <input type="radio" name="orientation" value="horizontal" id="orientation_hor">
            <label for="orientation_hor"> horizontal </label><br />
            <input type="radio" name="orientation" value="vertical" id="orientation_ver"> 
            <label for="orientation_ver"> vertical </label><br />
        </div>
        <span class=" space"></span>
        <span class=".navbar-text">Results: </span>
        <select name="number">
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
        <span class=" space"></span>
        <select name="type">
            <option value="all">All</option>
            <option value="photo">Photo</option>
            <option value="illustration">illustration</option>
            <option value="vector">vector</option>
        </select>
        
        <span class=" space"></span>
        <span class=".navbar-text">Sort by:</span>
        <span class=" space"></span>
        <select name="order">
            <option value="popular">Popular</option>
            <option value="latest">latest</option>
        </select>
        <span class=" space"></span>
        <button class="btn btn-primary" type="submit">Search</button>
    </form> 
    </nav>
   
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
            echo "<img class='image' src='" . $imageURL[$i] ."''>";
        }
        if(count($imageURL) == 0) {
            echo "<h3> No results for that search</h3>";
        }
    } else {
        echo "<h3> Please enter a search word</h3>";
    }
    
?>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    </body>
</html>