<?php

    include_once 'user_session.php';

    $userSession = new UserSession();
    $userSession->closeSession();

    header("location: ../../Vista/index.php");

?>