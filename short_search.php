<?php
require_once ('include/includes.php');

$s = "";
if(isset($_POST["search-data"])){
    $search_query = Query::escape_string($_POST["search-data"]);
    $query = new Query("SELECT user_id, email, firstname, lastname, phone, cellphone, major, pledgeclass, shirtsize FROM apo_users
				WHERE CONCAT(firstname,' ',lastname) LIKE '$search_query%' ORDER BY user_id DESC LIMIT 20");
    $can_view_id = $g_user->is_logged_in() && $g_user->permit("admin add users");
    $id_axis = $can_view_id ? "<th>User Id </th>" : "";
    $s.= "
    </ br>
    </ br>
    <table style='width: 100%; text-align: center;'>
      <tr>
        <th>Name</th>
        $id_axis
        <th>Email</th>
        <th>Contact</th>
        <th>Cellphone</th>
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
        $major = $row["major"];
        $pc = $row["pledgeclass"];
        $shirt = $row["shirtsize"];
        $id = $can_view_id ? "<td>$user_id </td>" : "";
        $s.= "
        <tr>
            <td><a href='profile.php?user_id=$user_id'>$fullname</a></th>
            $id
            <td>$email </td>
            <td>$phone </td>
            <td>$cell </td>
            <td>$major </td>
            <td>$pc </td>
            <td>$shirt </td>
        </tr>";
    }
    $s.= "</table>";
}
echo $s; 
?>
