<link rel="stylesheet" href="style.css">
<?php

include('../templates/header.php');


$isDeleted = false;

$db = new PDO("mysql:host=" . DB_HOSTNAME . ";dbname=" . DB_DATABASE, "root", "root");

$query = $db->prepare("SELECT * FROM matelas");
$query->execute();

$matelasArray = array();

while ($matela = $query->fetch()) {
    $matelasArray[] = $matela;
}

if(!empty($_POST)){


    $id = trim(strip_tags($_POST["id"]));

    if(empty($errors)){
        $db = new PDO("mysql:host=". DB_HOSTNAME .";dbname=" . DB_DATABASE, "root", "root");


        $query = $db->prepare("DELETE FROM matelas WHERE id = :id");
        $query ->bindParam(":id", $id);

        if($query->execute()){
            header("Location: /dwwm_ecf_back/public/");
        }
    }
}
?>
    <?php 
    if($isDeleted){
?>

<p>Le matela n°<?= $id ?> à bien été supprimer.</p>

<?php
    }
    ?>
    <h2 for="id" class="delete-label">Choisissez le matelas que vous voulez supprimer:</h2>

<div class="delete-global-container">

    <?php

for ($i=0; $i < count($matelasArray); $i++) { 
?>
<form action="" method="post" class="form-delete">
    
    <div class="delete-container">
        <img src="<?= $matelasArray[$i]['img']?>" alt="Photo du matela" srcset="">
        <p><?= $matelasArray[$i]['marque']?> <?= $matelasArray[$i]['name'] ?></p>
        <input type="hidden" name="id" value="<?= $matelasArray[$i]['id'] ?>">  
        <input type="submit" value="Supprimer ce matelas"></input>

    </div>
</form>


    <?php
}   

?>

</div>







<?php
include('../templates/footer.php');
?>