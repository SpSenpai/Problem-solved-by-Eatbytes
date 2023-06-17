<?php
include 'config.php';

$sql = "SELECT logininfo.id, logininfo.name, logininfo.email, logininfo.address, logininfo.phone, logininfo.skill, logininfo.level, logininfo.image, logininfo.longitude, logininfo.latitude,logininfo.rating, logininfo.description  FROM logininfo";

$result = mysqli_query($conn, $sql);
$output = [];

if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        $output[] = $row;
    }
}else{
    $output['empty'] = ['empty'];
}

mysqli_close($conn);

echo json_encode($output);


?>