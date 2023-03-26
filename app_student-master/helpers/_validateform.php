<?php

// validation du formulaire
// 1-creation de mes variables
$error = [];
$errMsgRequire = "<span class='text-red-500'>Ce champs est obligatoire</>";
$success = false;

// 2-Je vérifie si le formualire est soumis
if (!empty($_POST['submited'])) {
  // 3- protege contre faille xss
  ///////////////////////////////
    $fname = trim(htmlspecialchars($_POST['fname']));
    $lname = trim(htmlspecialchars($_POST['lname']));
    $Email = trim(htmlspecialchars($_POST['Email']));
    $age = trim(htmlspecialchars($_POST['age']));
    $formation = trim(htmlspecialchars($_POST['formation']));

  // 4- validation de chaque input
  /////////////////////////////////
  // nom
  if (!empty($fname)) {
    if (strlen($fname) <= 2) {
      $error['fname'] = "<span class='text-red-500'>3 caractères minimum</span>";
    } elseif (strlen($fname) > 20) {
      $error['fname'] = "<span class='text-red-500'>20 caractères maximum</span>";
    }
  } else {
    $error['fname'] = $errMsgRequire;
  }
  if (!empty($lname)) {
    if (strlen($lname) <= 2) {
      $error['lname'] = "<span class='text-red-500'>3 caractères minimum</span>";
    } elseif (strlen($lname) > 20) {
      $error['lname'] = "<span class='text-red-500'>20 caractères maximum</span>";
    }
  } else {
    $error['lname'] = $errMsgRequire;
  }}

  // age
  // verifie que user a bien rempli le champs
  if (!empty($age)) {
    // verifie que l'age est un nombre entier
    if (!is_numeric($age)) {
      $error['age'] = "<span class='text-red-500'>Merci de rentrer un age correct</span>";
      }

  } else {
    $error['age'] = $errMsgRequire;
  }
  if (!empty($email)){
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    
        $error['email']="<span class='text-red-500'>format invalide</>";
    }
}
else{
        $error['email'] = $errorMsgRequire;

  // formation
  if (!empty($formation)) {
    if (strlen($formation) <= 20) {
      $error['formation'] = "<span class='text-red-500'>20 caractères minimum</span>";
    } elseif (strlen($formation) > 300) {
      $error['formation'] = "<span class='text-red-500'>300 caractères maximum</span>";
    }
  } else {
    $error['formation'] = $errMsgRequire;
  }

  // 5- Pas d'erreur => Enregistrement en Base de donnée
  if (count($error) == 0) {
    $success = true;
    // enregistrement en BDD
  }
}



?>

<main class="pt-20">
  <form method="POST">
    <!-- input name -->
    <div class="form-control w-full max-w-xs">
      <label class="label" for="nom">
        <span class="label-text">Nom</span>
      </label>
      <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" name="nom" id="nom" value="<?php showInputValue('nom') ?>" />
      <p>
        <?php
        if (isset($error['nom'])) {
          echo $error['nom'];
        }
        ?>
      </p>
    </div>
    <!-- input age -->
    <div class="form-control w-full max-w-xs">
      <label class="label" for="age">
        <span class="label-text">Age</span>
      </label>
      <input type="number" placeholder="Type here" class="input input-bordered w-full max-w-xs" name="age" id="age" />
      <p>
        <?php
        if (isset($error['age'])) {
          echo $error['age'];
        }
        ?>
      </p>
    </div>
    <!-- input message -->
    <div class="form-control w-full max-w-xs">
      <label class="label" for="message">
        <span class="label-text">Message</span>
      </label>
      <textarea class="textarea textarea-bordered" placeholder="Bio" id="message" name="message"></textarea>
      <p>
        <?php
        if (isset($error['message'])) {
          echo $error['message'];
        }
        ?>
      </p>
    </div>
    <!-- input/btn submit -->
    <input class="btn bg-blue-600 text-white mt-6" type="submit" id="submited" name="submited" value="Envoyer" />
  </form>
</main>
<!-- footer -->
