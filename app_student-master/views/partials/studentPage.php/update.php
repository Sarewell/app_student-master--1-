<?php
include_once('helpers/functions.php');
require_once('models/model.php');

// validation du formulaire
// 1-creation de mes variables
$error = [];
$errMsgRequire = "<span class='text-red-500'>Ce champs est obligatoire</>";
$success = "false";

// 1- ressupere le student avec le bon ID
$student = get('students');
//debug_array($student);

// 2-Je vérifie si le formulaire est soumis
if (!empty($_POST['submitted'])) {
    require_once('helpers/validate-input/validateInput.php');
    update($fName, $lName, $email, $age, $formation, $date_of_birth, $status);
}

?>

<div class="text-center">
    <form method="POST" >

        <!--  firstname -->
        <div class="form-control  ">
            <label class="label" for="fName">
                <span class="label-text font-black">Votre Prénom</span>
            </label>
            <label class="input-group">
                <span>Prénom</span>
                <input type="text" placeholder="Type here" class="input input-bordered " name="fName" id ="prenom" value="<?= $student['fName']?>" />
            </label>   
            <p><?php errorMsg('fName')?></p>
        </div>

        <!-- lastname -->
        <div class="form-control">
            <label class="label" for="lName">
                <span class="label-text font-black"> Votre Nom</span>
            </label>
            <label class="input-group">
                <span>Nom</span>
                <input type="text" placeholder="Type here" class="input input-bordered " name="lName" id ="nom" value="<?= $student['lName']?>" />
            </label>
            <p><?php errorMsg('lName')?></p>
        </div>

        <!-- email-->
        <div class="form-control">
            <label class="label"- for="email">
                <span class="label-text font-black">Votre Email</span>
            </label>
            <label class="input-group">
                <span>Email</span>
                <input type="text" placeholder="exemple@gmail.com" class="input input-bordered " name="email" value="<?= $student['email']?>" />
            </label>
            <p><?php errorMsg('email')?></p>
        </div> 

        <!--  age -->
        <div class="form-control  ">
            <label class="label" for="age">
                <span class="label-text font-black">Votre Age</span>
            </label>
            <label class="input-group">
                <span>Age</span>
            <input type="number" placeholder="" class="input input-bordered " name="age" id ="age" value="<?= $student['age']?>"/>
            </label>
            <p><?php errorMsg('age')?></p>
        </div>

        <!-- Date de naissance -->
        <div class="form-control  ">
            <label class="label" for="age">
                <span class="label-text font-black">Date de naissance</span>
            </label>
            <label class="input-group">
                <span>Date</span>
                <input name="date_of_birth" type="date" class="input input-bordered " value="<?= $student['date_of_birth']?>" />
            </label>
            <p><?php errorMsg('date_of_birth')?></p>
        </div>

        <!-- Status -->
        <div class="flex space-x-8 m-4">
            <div class="form-control">
                <label class="label cursor-pointer " for="status">
                    <span class="label-text m-2">Inscrit</span> 
                    <input type="radio" value="1" name="status" class="radio checked:bg-red-500" <?php showUpdateRadioValue($student['status'],1)?>  />
                </label>
            </div>
            <div class="form-control">
                <label class="label cursor-pointer" for="status">
                    <span class="label-text m-2">Liste d'attente</span> 
                    <input type="radio" value="0" name="status"  class="radio checked:bg-blue-500" <?php showUpdateRadioValue($student['status'],0)?> />
                </label>
            </div>
            <p><?php errorMsg('status')?></p>   
        </div>

        <!--  formation -->
        <?php
            $formationOptions =[
                ["name" => "Dev React"],
                ["name" => "Dev Front"],
                ["name" => "Dev Back"],
                ["name" => "Dev Symfony"],
                ["name" => "Commerce international"],
            ]
        ?>
        <div class="form-control ">
            <label class="label">
                <span class="label-text font-black">Choisir ta formation</span>
            </label>
            <label class="input-group">
                <span>Formation</span>
                <select class="select select-bordered" name="formation">
                    <option disabled selected>Choisis une formation</option>
                    <?php foreach ($formationOptions as $item): ?>
                    <option value="<?= $item['name']?>" 
                    <?php showUpdateSelectValue($student['formation'], $item['name'])?>>
                    <?= $item['name'] ?>
                    </option>
                    <?php endforeach ?>
                </select>
            </label>
            <p><?php errorMsg('formation')?></p>
        </div>

        <input type="hidden" name="id" value="<?= $student['id']?>">
        <!-- btn submit -->
        <input type="submit" class="btn btn-active btn-secondary mt-5 font-black" name="submitted"
        value="envoyer"   >

    </form>
</div>