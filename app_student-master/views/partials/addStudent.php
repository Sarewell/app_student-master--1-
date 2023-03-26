<?php
include_once('helpers/functions.php');
require_once('models/model.php');

// validation du formulaire
// 1-creation de mes variables
$error = [];
$errMsgRequire = "<span class='text-red-500'>Ce champs est obligatoire</>";
$success = "false";

// 2-Je vérifie si le formualire est soumis
if (!empty($_POST['submitted'])) {
    require_once('app_student-master/helpers/_validateform.php');
    //créé un nv étudiant et stock en bdd
    create($fname, $lname, $email, $age, $formation);
}  
?>

<div class="m-auto mt-6 text-center p-8 flex-shrink-0 w-full max-w-sm bg-fuchsia-100 shadow-xl- rounded-lg">
    <form method="POST" >

        <!--  firstname -->
        <div class="form-control  ">
            <label class="label" for="fName">
                <span class="label-text font-black">Votre Prénom</span>
            </label>
            <label class="input-group">
                <span>Prénom</span>
                <input type="text" placeholder="Type here" class="input input-bordered " name="fName" id ="prenom" value="<?php showInputValue('fName')?>" />
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
                <input type="text" placeholder="Type here" class="input input-bordered " name="lName" id ="nom" value="<?php showInputValue('lName')?>" />
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
                <input type="text" placeholder="exemple@gmail.com" class="input input-bordered " name="email" value="<?php showInputValue('email')?>" />
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
                <input type="number" placeholder="" class="input input-bordered " name="age" id ="age" value="<?php showInputValue('age')?>"/>
            </label>
            <p><?php errorMsg('age')?></p>
        </div>


        <!--  formation -->
        <?php
            $formationOptions =[
                ["name" => "Dev React",],
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
                        <option value="<?= $item['name']?>" <?php showSelectValue("formation", $item['name'])?>>
                        <?= $item['name'] ?>
                        </option>
                        <?php endforeach ?>
                    </select>
                </label>
            <p><?php errorMsg('formation')?></p>
        </div>

        <!-- btn submit -->
        <input type="submit" class="btn btn-active btn-secondary mt-5 font-black" name="submitted"
        value="envoyer"   >

    </form>
</div>