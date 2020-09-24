<?php 

$projectFolder = '/vqlick_assignment';

$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

define('URL', $protocol . $_SERVER['HTTP_HOST'] . $projectFolder);

?>