<?php
/*
 * This will open the database through its credentials with the config.php.
 *
 * It will then check on what page it's at, by default, it should be at the home page.
 *
 * This will also render all the links that the user can choose.
 *
 * It will also render the footer of each page.
 */
require_once 'includes/config.php';

if (!isset($_GET['page'])) {
    $id = 'home';
} else {
    $id = $_GET['page'];
}

switch ($id) {
    case 'home' :
        include 'views/home.php';
        break;
    case 'artists' :
        include 'views/artists.php';
        break;
    case 'songs' :
        include 'views/songs.php';
        break;
    default :
        include 'views/404.php';
}

include_once 'templates/footer.html';

