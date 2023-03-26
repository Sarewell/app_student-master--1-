<?php
// recupere la conexion a la bdd
require_once('database.php');
require_once('helpers/_function.php');
// je stok la conexion dans $pdo
$pdo = pdo();
/**
 * get all items in DBB
 */
function getAll($table, $order="")
{
    global $pdo;
    $sql = "SELECT * FROM $table"; 

    if ($order){
        $sql .=" ORDER BY " . $order;
    }

    $query = $pdo->prepare($sql);

    $query->execute();

    $items = $query->fetchAll();

    return $items;
}
function getId()
{
    if(!empty($_GET['id']) && isset($_GET['id'])  && is_numeric($_GET['id']))
    {
        //on netoye notre id
        $id = cleanInput($_GET['id']);
    }else{
        $_SESSION['error']= "etudiant inconu";
        header('location:index.php');
    }
    return $id;
}

function get($table)
{
    global $pdo;
    $id =getId();


    //on fai la requette 
    $sql = "SELECT * FROM $table where id= :id";
      //prepare la requete
    $query = $pdo->prepare($sql);
    //on asocie la requette a un parametre
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    //exedcute la requette
    $query->execute();
    $item = $query->fetch();
    // debug_array($student);
    //pas de students redirect

    if(!$item){
        $_SESSION['error']= "etudiant inconu";
        header('location:index.php');
    }
    return $item;
}
function delete($table)
{
    global $pdo;
    $id = getId();
    //on fai la requette 
    $sql = "DELETE FROM student where id= :id";
      //prepare la requete
    $query = $pdo->prepare($sql);
    //on asocie la requette a un parametre
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    //exedcute la requette
    $query->execute();

    $_SESSION['success'] = "element suprimer avec succées!";
    
    header('location:index.php');

}
function create($fname, $lname, $email, $age, $formation,) 
{
    //require_once('helpers/validate-input/validateInput.php');

    global $pdo;
    global $error;
    global $success;
    if(count($error)== 0){
        $success = true;

        //1-la requette
        
        $sql = "INSERT INTO student(fname, lname, email, age, formation,) VALUES(:fname, :lname, :email, :age, :formation)";
        
        //2-prépare la requette
        $query = $pdo->prepare($sql);
        //3- associé chaque parametre à sa valeur
        $query->bindValue(':fname', $fname,PDO::PARAM_STR);
        $query->bindValue(':lname', $lname,PDO::PARAM_STR);
        $query->bindValue(':email', $email,PDO::PARAM_STR);
        $query->bindValue(':age', $age,PDO::PARAM_INT);
        $query->bindValue(':formation', $formation,PDO::PARAM_STR);


        //4_ execute la query
        $query-> execute();

        //5- redirect
        $_SESSION["success"] = "L'élément a été ajouté";

    header('location: index.php');

    }
}
// * Update item in bd
//  */
function update($fName, $lName, $email, $age, $formation, $date_of_birth, $status ) 
{
    //require_once('helpers/validate-input/validateInput.php');
    $id= getId();
    global $pdo;
    global $error;
    global $success;
    if(count($error)== 0){
        $success = true;

        //1-la requette
        
        $sql = "UPDATE students SET fName=:fName, lName=:lName, email=:email, age=:age, formation=:formation, date_of_birth=:date_of_birth, status=:status, updated_at= NOW() WHERE id=:id ";
        //2-prépare la requette
        $query = $pdo->prepare($sql);
        //3- associé chaque parametre à sa valeur
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->bindValue(':fName', $fName, PDO::PARAM_STR);
        $query->bindValue(':lName', $lName, PDO::PARAM_STR);
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        $query->bindValue(':age', $age, PDO::PARAM_INT);
        $query->bindValue(':formation', $formation, PDO::PARAM_STR);
        $query->bindValue(':date_of_birth', $date_of_birth, PDO::PARAM_STR);
        $query->bindValue(':status', $status, PDO::PARAM_INT);

        //4_ execute la query
        $query-> execute();

        //5- redirect
        $_SESSION["success"] = "Etudiant ajouté";

        header('location: index.php');

    }
}