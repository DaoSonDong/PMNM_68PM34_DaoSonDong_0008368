<?php
require_once "../App/middleware.php";
$middelware = new middleware();
$middelware->checklogin();
$app = new App();