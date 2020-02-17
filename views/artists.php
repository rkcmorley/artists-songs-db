<?php
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




