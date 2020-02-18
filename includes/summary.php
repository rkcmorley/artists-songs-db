<?php
/*
 * From the database, this will count each song and distinct artist ID from the song table.
 *
 * If it fails to get the result, it will show an error message.
 *
 * If it's successful in getting the result, it will render the data in a while loop.
 */
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
