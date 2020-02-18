<?php
/*
 * This will open the database through the openSQL.php.
 * It will then render the songs' page title and header two.
 *
 * From the database, it will create the summary and select distinct artists, convert the seconds into
 * minute and second, and lastly get each song related to the artist's ID. This will combine the artist
 * and song tables together.
 *
 * It will check on whether the database is connected or not.
 * If it fails to connect, it will show an error message otherwise it will render each of the
 * related song's title, artist's name and the duration of the song through a while loop.
 *
 * After loading what it needs from the database, it will then close it.
 */
require_once 'includes/openSQL.php';

$page_title = "Songs";
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

if ($result === false) {
    echo mysqli_error($link);
}

while ($row = mysqli_fetch_assoc($result)) {
    echo '<p class="breakpoint">Song: </p>' . ' ' . htmlentities($row['song']) . '<br>'. '<p>Artist: </p>' . ' ' . htmlentities($row['artist']) . '<br>' .'<p>Duration of the song: </p>' . ' ' . htmlentities($row['time']) . '<br>';
}

require_once 'includes/closeSQL.php';