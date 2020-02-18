<?php
/*
 * This will open the database through the openSQL.php.
 * It will then render the artists' page title and header two.
 *
 * From the database, it will create the summary and select distinct artist and count each song
 * that's related to the artist's ID. It will join the artist and song tables through the artist's ID.
 *
 * It will check on whether the database is connected or not.
 * If it fails to connect, it will show an error message otherwise it will render each of the
 * artist's name and the number of songs related to the artist through a while loop.
 *
 * After loading what it needs from the database, it will then close it.
 */

require_once 'includes/openSQL.php';

$page_title = "Artists";
$page_headerTwo = "Artists";

include_once 'includes/header.php';
include_once 'includes/summary.php';

$sql = "SELECT DISTINCT artist.name AS artist, 
        COUNT(song.artist_id) AS numberOfSongs
        FROM song 
        JOIN artist 
        ON artist.id = song.artist_id 
        GROUP BY artist.name
        ORDER BY artist.name 
        ASC";
$result = mysqli_query($link, $sql);

if ($result === false) {
    echo mysqli_error($link);
}

while ($row = mysqli_fetch_assoc($result)) {
    echo '<p class="breakpoint">Artist: </p>' . ' ' . htmlentities($row['artist']) . '<br>' . '<p>Number of songs: </p>' . ' ' . htmlentities($row['numberOfSongs']) . '<br>';
}

require_once 'includes/closeSQL.php';




