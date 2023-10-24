<?php

include('../templates/header.php');

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
            header("Location: /dwwm_ecf_back/public");
        }
    }
}
?>

<form action="" method="post">

    <label for="id">Choisissez le matelas que vous voulez supprimer:</label>
    <select name="id" id="id">
        <option disabled selected>Matela a supprimer</option>
<?php 
    for ($i=0; $i < count($matelasArray); $i++) { 
    ?>

        <option value="<?= $matelasArray[$i]['id']?>"><?= $matelasArray[$i]['marque']?> - <?= $matelasArray[$i]['name']?></option>

    <?php
}
?>
    </select>

    <input type="submit" value="Supprimer">

</form>



<?php
include('../templates/footer.php');
?>