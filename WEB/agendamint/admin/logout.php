<?php
    session_start();
    session_unset();
    session_destroy();
    header('location: frm_login.php');