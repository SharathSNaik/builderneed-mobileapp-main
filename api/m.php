
<?php
include '../access/connect.php';

$select = mysqli_query($connection, "SELECT * FROM bn_project");
while ($row = mysqli_fetch_assoc($select)) {
    $img = $row['image_source'];
    $pid = $row['builder_id'];
    $update = mysqli_query($connection, "UPDATE bn_agents SET logo='$img' WHERE project_id='$pid'");
}

// $insert =  mysqli_query($connection, "INSERT INTO bn_agents(project_id,bn_ag_phone,name,email)VALUES(2,9611544511,"Tamil Vanan","tamil@sarithadevelopers.com")");



