<?php
 if (isset($_GET['addForm'])) {

    include "../../dbConnection.php";
    $sql = "INSERT INTO `q_author` 
    (`firstName`, `lastName`, `gender`, `dob`, `dod`, `profession`, `country`, `picture`, `biography`)
    VALUES (':fName', ':lName', ':gender', ':dob', ':dod', ':profession', ':country', ':pic', ':bio')";
    
    $np = array();
    $np[':fName'] = $_GET["firstName"];
    $np[':lName'] = $_GET["lastName"];
    $np[':gender'] = $_GET["gender"];
    $np[':dob'] = $_GET["dob"];
    $np[':dod'] = $_GET["dod"];
    $np[':profession'] = $_GET["profession"];
    $np[':country'] = $_GET["country"];
    $np[':pic'] = $_GET["url"];
    $np[':bio'] = $_GET["bio"];

    insertWithParameter($sql,$np);
}
?>


<!DOCTYPE html>
<html>
    <head>
        <title> Adding New Author</title>
    </head>
    <body>

        <h1> Add New Author </h1>
        
        <fieldset>
            
            <legend> Adding New Author </legend>
            
            <form>
                
                First Name: <input type="text" name="firstName"/> <br />
                Last Name: <input type="text" name="lastName"/> <br />
                Gender <input type= "radio" name="gender" value="F">F
                <input type= "radio" name="gender" value="M">M<br />
                Date of birth<input type="date" name="dob"/><br />
                Date of death<input type="date" name="dod"/><br />
                Profession<input type="text" name="profession"/><br />
                Country 
                <select>
                    <option>England</option>
                    <option>USA</option>
                    <option>Germany</option>
                    <option>India</option>
                    <option>Poland</option>
                </select> <br />
                Picture <input type="text" name="url"/><br />
                Biography <input type="textarea" name="bio"/> <br/>
                <input type="submit" name="addForm" value="Add New Author" />
                
            </form>
            
        </fieldset>
    </body>
</html>