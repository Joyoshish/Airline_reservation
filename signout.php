<?php

    session_start();
    unset($_SESSION['loggedin']);
    unset($_SESSION['CNo']);
    unset($_SESSION['scno']);
    echo "<script type='text/javascript'>location.href = 'index.php';</script>";

?>