<?php

    require_once "rb.php";

    R::setup( 'mysql:host=127.0.0.1;dbname=login',
    'root', '' );

    session_start();
