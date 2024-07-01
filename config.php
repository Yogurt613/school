<?php
$servername = "localhost";  // MySQL 伺服器位址
$username = "root"; // MySQL 使用者名稱
$password = "takming"; // MySQL 密碼
$database = "ccc"; // 你的資料庫名稱

// 建立與 MySQL 資料庫的連線
$link = mysqli_connect($servername, $username, $password, $database);

// 檢查連線是否成功
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
else{
    return $link;
}
?>
