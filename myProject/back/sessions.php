<?php 

    if (isset($_SESSION['accountCreated'])) {
        echo $_SESSION['accountCreated'];
        unset($_SESSION['accountCreated']);
    }

    if (isset($_SESSION['accountExist'])) {
        echo $_SESSION['accountExist'];
        unset($_SESSION['accountExist']);
    }