<?php
$title_page = "ajouter";
require_once('models/Model.php');
$students= getAll('student');

ob_start();
include('views\partials\studentPage.php\_add-student.php');


$content = ob_get_clean();
require('views/layout.php');

