<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keyword" content="postbomb">
    <meta name="description" content="Postbomb home">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Staatliches|Viga" rel="stylesheet">


    <title><?= $title;?></title>
    <link rel="shortcut icon" href="<?= base_url()?>assets/img/postbomb.png">
    <link rel="stylesheet" href="<?= base_url()?>assets/css/admin.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url()?>main/home">Postbomb</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                <a class="nav-item nav-link active" href="<?= base_url()?>main/upload"><img src="<?php echo base_url()?>assets/img/upload.png" width="30" height="30" alt="Upload"></a>
                <a class="nav-item nav-link" href="<?= base_url()?>main/profil"><img src="<?php echo base_url()?>assets/img/profil.png" width="30" height="30" alt="Profile"></a>
                <a class="nav-item nav-link" href="<?= base_url()?>main/notifikasi"><img src="<?php echo base_url()?>assets/img/notification.png" width="30" height="30" alt="Notification"></a>
                <a class="nav-item nav-link" href="<?= base_url()?>main/pencarian"><img src="<?php echo base_url()?>assets/img/search.png" width="30" height="30" alt="Search"></a>
                </div>
                <a class="nav-item nav-link disabled" href="<?= base_url()?>main/keluar"><img src="<?php echo base_url()?>assets/img/keluar.png" width="30" height="30" alt="Log Out"></a>
                </div>
            </div>
        </div>
    </nav>