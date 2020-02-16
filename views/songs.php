<?php
require_once 'includes/openSQL.php';

$page_title = "Songs";
$page_headerOne = "W1 Music";
$page_headerTwo = "Songs";

require_once 'includes/header.php';
require_once 'includes/summary.php';


$sql = "SELECT 
        DISTINCT artist.name AS artist, 
        song.title AS song, 
        RIGHT (sec_to_time(song.duration),5) AS time
        FROM song 
        JOIN artist 
        ON artist.id = song.artist_id 
        ORDER BY artist.name, song.title 
        ASC";

$result = mysqli_query($link, $sql);
/* check query */
if ($result === false) {
    echo mysqli_error($link);
}
/* fetch associative array */
while ($row = mysqli_fetch_assoc($result)) {
    echo '<p class="breakpoint">Song: </p>' . ' ' . htmlentities($row['song']) . '<br>'. '<p>Artist: </p>' . ' ' . htmlentities($row['artist']) . '<br>' .'<p>Duration of the song: </p>' . ' ' . htmlentities($row['time']) . '<br>';
}

require_once 'includes/closeSQL.php';