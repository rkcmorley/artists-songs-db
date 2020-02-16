<?php
if (mysqli_connect_errno()) {
    exit(mysqli_connect_error());
} else {
    $table = $_GET['page'];
    $table_escaped = mysqli_real_escape_string($link, $table);
    $sql = "SELECT * FROM " . $table_escaped;
}