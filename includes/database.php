<?php

$connect = mysqli_connect( 
    "localhost", // Host
    "root", // Username
    "root", // Password
    "5225cms" // Database
);

mysqli_set_charset( $connect, 'UTF8' );
