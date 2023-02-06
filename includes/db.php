<?php

    require_once "rb.php";

    R::setup( 'mysql:host=localhost;dbname=login',
    'root', '' );

    session_start();
