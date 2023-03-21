<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>StoryTeller App</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="assets/css/styles.css" rel="stylesheet" />
        <style>
            .bg-pic{
                background: url(./images/bg.jpg);
            }
        </style>
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#!">StoryTeller</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="/stories.php">Stories</a></li>
                        <?php
                        if(isset($_SESSION["user"])) { 
                        if($_SESSION["user"] == "Admin") { ?>
                        <li class="nav-item"><a class="nav-link" href="/admin/dashboard">Dashboard</a></li>
                        <?php } else {
                            ?> 
                            <li class="nav-item"><a class="nav-link" href="/auth">Manage Stories</a></li> <?php
                        } ?>
                        <li class="nav-item"><a class="nav-link" href="/auth/logout.php">Logout</a></li>
                        <?php  } 
                        else { ?>
                        <li class="nav-item"><a class="nav-link" href="/auth">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="/auth/register.php">Register</a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>