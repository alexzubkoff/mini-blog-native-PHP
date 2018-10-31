<?php
/**
 * Created by PhpStorm.
 * User: alexz
 * Date: 31.10.2018
 * Time: 14:25
 */

require_once "lib/db.php";
require_once "lib/base.php";


new app(substr($_SERVER['REQUEST_URI'],2));