<?php
$title_page = "profil de l'etudiant";

// verification de l'id
require_once('models/Model.php');

$student = get('student');

// capture
ob_start();
include('views/partials/studentPage.php/_show-student.php');

$content = ob_get_clean();
require('views/layout.php');
