<?php
include 'config.php';

$sql = "SELECT * FROM problems INNER JOIN logininfo ON problems.user_id = logininfo.id";

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