<?php
require_once ('include/includes.php');

$s = "";
if(isset($_POST["search-data"])){
    $search_query = Query::escape_string($_POST["search-data"]);
    $query = new Query("SELECT user_id, email, firstname, lastname, phone, cellphone, birthday, major, pledgeclass, shirtsize FROM apo_users
				WHERE CONCAT(firstname,' ',lastname) LIKE '$search_query%' ORDER BY user_id DESC LIMIT 20");
    $s.= "
    </ br>
    </ br>
    <table style='width: 100%;'>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Contact</th>
        <th>Cellphone</th>
        <th>Birthday</th>
        <th>Major</th>
        <th>Pledgeclass</th>
        <th>Shirt Size</th>
      </tr>";
    while($row = $query->fetch_row()) {
        $fullname = $row['firstname'] . ' ' . $row['lastname'];
        $user_id = $row["user_id"];
        $email = $row["email"];
        $phone = $row["phone"];
        $cell = $row["cellphone"];
        $bday = $row["birthday"];
        $major = $row["major"];
        $pc = $row["pledgeclass"];
        $shirt = $row["shirtsize"];
        $s.= "
        <tr>
            <td><a href='profile.php?user_id=$user_id'>$fullname</a></th>
            <td>$email </td>
            <td>$phone </td>
            <td>$cell </td>
            <td>$bday </td>
            <td>$major </td>
            <td>$pc </td>
            <td>$shirt </td>
        </tr>";
    }
    $s.= "</table>";
}
echo $s; 
?>
