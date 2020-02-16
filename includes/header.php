<?php
$content = file_get_contents('templates/header.html');
$content = str_replace('[+page_title+]', $page_title, $content);
$content = str_replace('[+page_headerOne+]', $page_headerOne, $content);
$content = str_replace('[+page_headerTwo+]', $page_headerTwo, $content);
echo $content;