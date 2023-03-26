<?php
// session_start();
$title_page = "acceuil";

require_once('models/Model.php');

$students= getAll('student');

ob_start();
include('views/partials/studentPage.php/home-student.php');


$content = ob_get_clean();
require('views/layout.php');



