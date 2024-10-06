<?php
//access current session
session_start();
//empty current session
$_SESSION = [];
//redirect to main page
header("location: /");
