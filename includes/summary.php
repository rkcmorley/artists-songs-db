<?php

$sql = "SELECT COUNT(*) 
        AS songs,
        COUNT(DISTINCT artist_id) 
        AS artists
        FROM song";

$result = mysqli_query($link, $sql);

if ($result === false) {
    echo mysqli_error($link);
}

$row = mysqli_fetch_assoc($result);
echo '<p>Number of active artists: </p> '. htmlentities($row['artists']) . '<br>' .'<p>Number of songs: </p>'. htmlentities($row['songs']) . '<br>';
