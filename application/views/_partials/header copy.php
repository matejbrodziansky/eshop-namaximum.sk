<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- css -->

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700,800&amp;subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/boostrap/bootstrap.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css') ?>" />

    <!-- script -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Namaximum</title>
</head>

<body>
    <div class="header container-fluid">
        <div class="container">
            <div class="row ">
                <div class="col">
                    <h1><a href=""> NAMAXIMUM>></a></h1>
                </div>

                <div class="col">
                    <div class="topnav">
                        <div class="search-container">
                            <form action="/action_page.php">
                                <input type="text" placeholder="Search.." name="search">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col justify-content-center align-self-center ">
                    <ul>
                        <li class="d-inline align-middle ">
                            <a class="" href="<?= base_url('auth/login') ?>">
                                <i style="color: #F86528;" class="fa fa-user"></i> <span class="">Prihlásenie</span>
                            </a>
                        </li>
                        <li class="d-inline align-middle">
                            <a href="<?= base_url('') ?>">
                                <i style="color: #F86528;" class="fa fa-heart"><span class="count"></span></i>
                                <span class="">Obľúbené</span>
                            </a>
                        </li>
                        <li class="d-inline align-middle">
                            <a href="<?= base_url('') ?>">
                                <i style="color: #F86528;" class="fa fa-shopping-basket"><span class="count"></span></i>
                                <span class="">Košík</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- NAVIGATION -->
    <div class="navigation container-fluid">
        <div class="container">
            <div class="row">
                <div class="col">
                    <nav class="navbar navbar-expand-lg navbar-light bg-lightt">

                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="navbar-nav">

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        DOPLNKY VÝŽIVY
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="<?= base_url('kategoria/proteins') ?>">PROTEÍNY, BIELKOVINY</a>
                                        <a class="dropdown-item" href="<?= base_url('kategoria/aminokyseliny') ?>">AMINOKYSELINY A BCAA</a>
                                        <a class="dropdown-item" href="<?= base_url('kategoria/spalovace') ?>">SPAĽOVAČE TUKOV</a>
                                        <a class="dropdown-item" href="<?= base_url('kategoria/vitaminy-mineraly') ?>">VITAMÍNY, MINERÁLY</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        ZDRAVÉ POTRAVINY
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        OBLEČENIE A PRÍSLUŠENSTVO
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        EKO DROGÉRIA
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        TVOJE CIELE
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <ul>
        <?php foreach ($products as $product) : ?>
            <?php if ($product['navigation_id'] == 0) : ?>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?= $product['name'] ;?>
                    </a>

                <?php endif; ?>
            <?php endforeach; ?>
    </ul>

    <?php
    foreach ($products as $product) {
        if ($product['navigation_id'] == 0) {
            echo $product['name'];
        }
    }

    
    // pre_r($products);
