<?php
include "../../dbConnection.php";

function getColumn($column,$from) {
    $sql = "SELECT DISTINCT($column)
            FROM $from
            ORDER BY $column";
    $records = exe($sql);

    for($i = 0; $i < count($records);$i++) {
        echo "<option";
        if($_GET[$column] == $records[$i][$column]) {
            echo " selected";
        }
        echo ">" . $records[$i][$column] . "</option>";
    }
}


function displayQuotes() {
    $sql = "SELECT DISTINCT(quote), firstName, lastName 
            FROM q_author
            NATURAL JOIN q_quote,q_category, q_cat_quote
            WHERE 1";
    $namedParameters = array();
    if (!empty($_GET['content'])) {      
           $sql = $sql . " AND quote LIKE :quoteContent";
           $namedParameters[":quoteContent"] = "%" . $_GET['content'] . "%";
    }
    if (!empty($_GET['gender'])) {
        $sql = $sql . " AND gender = :gender ";
        $namedParameters[':gender'] = $_GET['gender'];
    }
    if(!empty($_GET['country'])) {
        $sql = $sql . " AND country = :country ";
        $namedParameters[':country'] = $_GET['country'];
    }
    if (!empty($_GET['category'])) {
        $sql = $sql . " AND q_quote.quoteId in 
        (SELECT quoteId 
         FROM q_category natural join q_cat_quote
         WHERE category = :category
         )";
        $namedParameters[':category'] = $_GET['category'];
    }
    
    if (isset($_GET['orderBy'])) {
        if ($_GET['orderBy'] == 'orderByAuthor') {
           $sql = $sql . " ORDER BY lastName";
        } else if ($_GET['orderBy'] == 'orderByQuote') {
           $sql = $sql . " ORDER BY quote";
        }
    }
    $records = executeWithParameter($sql,$namedParameters);
    for($i = 0; $i < count($records);$i++) {
        echo $records[$i]["quote"] . " <span id ='name' >" . $records[$i]["firstName"]. " " . $records[$i]["lastName"] . "</span> <br>";
    }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Lab 6: Quote Finder</title>
        <link rel="stylesheet" type="text/css" href="css/styles.css" />
    </head>
    <body>
        <h1>Quote Finder</h1>
        <form method="get">
                <strong>Quote Content:</strong>
                <input type="text" name="content" value=<?= $_GET["content"]?>>
                <strong>Author's Gender:</strong>
                <input type="radio" name="gender" id="female" value="F"
                <?php
                if($_GET["gender"] == "F") {
                    echo "checked";
                }
                ?>
                >
                <label for="female">Female</label>
                <input type="radio" name="gender" id="male" value="M"
                
                <?php
                if($_GET["gender"] == "M") {
                    echo "checked";
                }
                ?>
                >
                <label for="male">Male</label>
                <strong>Author's Birthplace:</strong>
                <select name="country">
                    <option value="">Select a Country</option>
                    <?= getColumn("country","q_author") ?>
                </select>
                <strong>Category:</strong>  
                <select name="category">
                    <option value="">Select a Category</option>
                    <?= getColumn("category","q_category");?>
                </select>
                 Order by: 
                <input type="radio" name="orderBy" id="orderByAuthor" value="orderByAuthor"
                
                <?php
                if($_GET["orderBy"] == "orderByAuthor") {
                    echo "checked";
                }
                ?>
                >
                <label for="orderByAuthor">Author</label>
                <input type="radio" name="orderBy" id="orderByQuote" value="orderByQuote"
                <?php
                if($_GET["orderBy"] == "orderByQuote") {
                    echo "checked";
                }
                ?>
                >
                <label for="orderByQuote">Quote</label>
                <input type="submit" value="Filter" name="submit">
        </form>
        
        <hr />
        <main>
            
        <div class="quotes">
            <?=displayQuotes()?>
        </div>
        </main>
        
    </body>
</html>