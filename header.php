<!-- 

    888b:::::d888:::::::::::::::::::d8b::::::::::::::::::::::d8888::.d888:::::::::
    8888b:::d8888:::::::::::::::::::Y8P:::::::::::::::::::::d88888:d88P"::::::::::
    88888b.d88888::::::::::::::::::::::::::::::::::::::::::d88P888:888::::::::::::
    888Y88888P888::.d88b.::88888b.::888::.d88b.::888d888::d88P:888:888888:.d88b.::
    888:Y888P:888:d88""88b:888:"88b:888:d8P::Y8b:888P":::d88P::888:888:::d88P"88b:
    888::Y8P::888:888::888:888::888:888:88888888:888::::d88P:::888:888:::888::888:
    888:::":::888:Y88..88P:888::888:888:Y8b.:::::888:::d8888888888:888:::Y88b:888:
    888:::::::888::"Y88P"::888::888:888::"Y8888::888::d88P:::::888:888::::"Y88888:
    ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::888:
    :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::Y8b:d88P:
    ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::"Y88P"::

-->

<?php
    // app config
    require_once("config.php");

    // database connection
    require_once("connect.php");

    // functions
    require_once("includes/functions/inputs_functions.php");

    // get current timestamp
    $time = time();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monier Assignment</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?=URL?>/vendors/bootstrap-4.5.2-dist/css/bootstrap.min.css" >

    <!-- Fontawesome CSS -->
    <link href="<?=URL?>/vendors/fontawesome-5.14.0/css/all.min.css" rel="stylesheet">

    <!-- App CSS -->
    <link rel="stylesheet" href="<?=URL?>/css/app.css" >
</head>
    <body>

    
        <header>
            <nav class="navbar navbar-expand-lg navbar-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="#">Logo</a>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About Us</a>
                        </li>
                    </ul>
                    <a href="#" class="btn btn-outline-primary mr-sm-2">Login</a>
                </div>
            </nav>
        </header>

    <div class="container">

    
    
    