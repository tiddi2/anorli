<?php
include "../../dbConnection.php";
function getAuthorInfo() {
 $sql = "SELECT *
 FROM q_author 
 WHERE authorId = " . $_GET["authorId"];
 
 return exe($sql)[0];
}


if (isset($_GET['authorId'])) {
    
    $authorInfo = getAuthorInfo();    
    
}


?>


<!DOCTYPE html>
<html>
    <head>
        <title> Update Author's Info </title>
    </head>
    <body>

        <h1> Updating Author's Info </h1>
        
        
                <form>
                First Name: <input type="text" name="firstName" value= "<?= $authorInfo['firstName'] ?>" /> <br />
                Last Name: <input type="text" name="lastName" value= "<?= $authorInfo['lastName'] ?>"/> <br />
                Gender <input type= "radio" name="gender" value="F" 
                <?php if ($authorInfo['gender']=="F") {echo "checked";}?>
                >F
                <input type= "radio" name="gender" value="M"
                <?php if ($authorInfo['gender']=="M") {echo "checked";}?>
                >M<br />
                Date of birth<input type="date" name="dob"/><br />
                Date of death<input type="date" name="dod"/><br />
                Profession<input type="text" name="profession" value= "<?= $authorInfo['profession'] ?>"/><br />
                Country 
                <select>
                    <option>England</option>
                    <option>USA</option>
                    <option>Germany</option>
                    <option>India</option>
                    <option>Poland</option>
                </select> <br />
                Picture <input type="text" name="url" value= "<?= $authorInfo['picture'] ?>"/><br />
                Biography <input type="textarea" name="bio" value= "<?= $authorInfo['biography'] ?>"/> <br/>
                <input type="submit" name="updateForm" value="Update Author" />
                
            </form>
    </body>
</html>