<?php 

include('../templates/header2.php');

if(isset($_GET['id'])){
    $id = trim(strip_tags($_GET['id']));
    $db = new PDO("mysql:host=". DB_HOSTNAME .";dbname=" . DB_DATABASE, "root", "root");
    $query = $db -> prepare("SELECT * FROM matelas WHERE id = :id");
    $query -> bindParam(":id", $id);
    $query -> execute();
    $result = $query->fetch();
    if(empty($result)){
        header('Location: ../');
    }else{
        $name = $result['name'];
        $marque = $result['marque'];
        $img = $result['img'];
        $size = $result['size'];
        $price = $result['price'];
        $solde = $result['solde'];
    };
}



if(!empty($_POST)){

    $errors = [];

    $marque = trim(strip_tags($_POST["marque"]));
    $name = trim(strip_tags($_POST["name"]));
    $price = trim(strip_tags($_POST["price"]));
    $solde = trim(strip_tags($_POST["solde"]));
    $size = trim(strip_tags($_POST["size"]));
    $img = trim(strip_tags($_POST["img"]));

    if(!filter_var($price, FILTER_VALIDATE_FLOAT)){
        $errors["price"] = "Le prix n'est pas valide";
    }
    if(!filter_var($solde, FILTER_VALIDATE_FLOAT)){
        if($solde != 0){
        $errors["solde"] = "Le solde n'est pas valide";
        }
    }
    if(!filter_var($img, FILTER_VALIDATE_URL)){
        $errors["img"] = "Le lien de l'image n'est pas valide";
    }

    if(empty($errors)){
        $db = new PDO("mysql:host=". DB_HOSTNAME .";dbname=" . DB_DATABASE, "root", "root");

        $query = $db->prepare("UPDATE matelas SET marque = :marque, name = :name, size = :size, price = :price, solde = :solde, img = :img WHERE id = :id");
        $query ->bindParam(":marque", $marque);
        $query ->bindParam(":name", $name);
        $query ->bindParam(":size", $size);
        $query ->bindParam(":price", $price);
        $query ->bindParam(":solde", $solde);
        $query ->bindParam(":img", $img);
        $query ->bindParam(":id", $id);

        if($query->execute()){
            header("Location: ../");
        }
    }
}
?>

<h1>Change</h1>

<h2>Données actuelles:</h2>

<form action="" method="POST">

<div>
        <label for="marque">Marque:</label>
        <select name="marque" id="marque">
            <option value="EPEDA" <?= $marque == "EPEDA" ? 'selected' : ""?> >Epeda</option>
            <option value="DEAMWAY" <?= $marque == "DEAMWAY" ? 'selected' : ""?> >Dreamway</option>
            <option value="BULTEX" <?= $marque == "BULTEX" ? 'selected' : ""?>  >Bultex</option>
            <option value="DORSOLINE" <?= $marque == "DORSOLINE" ? 'selected' : ""?>  >Dorsoline</option>
            <option value="MEMORYLINE" <?= $marque == "MEMORYLINE" ? 'selected' : ""?>  >MemoryLine</option>
        </select>
    </div>

    <div>
        <label for="name">Nom:</label>
        <input type="text" placeholder="Nom du matelas" name="name" value="<?= isset($name) ? $name : ""?>">
        <?php
                if(isset($errors['name'])){
                    ?>
                        <p class="error"><?= $errors["name"] ?></p>
                    <?php
                }
            ?>
    </div>

    <div>
        <label for="img">Image:</label>
        <input type="text" placeholder="Lien d'une image du matelas" name="img"  value="<?= isset($img) ? $img : ""?>">
    </div>

    <div>
        <label for="size">Taille:</label>
        <select name="size" id="size">
            <option value="90x190">90x190</option>
            <option value="140x190">140x190</option>
            <option value="160x200">160x200</option>
            <option value="180x200">180x200</option>
            <option value="200x200">200x200</option>
        </select>
    </div>

    <div>
        <label for="price">Prix:</label>
        <input type="number" placeholder="Prix du matelas" id="price" name="price" value="<?= isset($price) ? $price : ""?>">
        <?php
                if(isset($errors['price'])){
                    ?>
                        <p class="error"><?= $errors["price"] ?></p>
                    <?php
                }
            ?>
    </div>


    <div>
        <label for="solde">Solde:</label>
        <input type="number" placeholder="Solde du matelas" value="0" id="solde" name="solde" value="<?= isset($solde) ? $solde : ""?>">
        <p class="red">Si aucun solde, mettre 0</p>
        <?php
                if(isset($errors['solde'])){
                    ?>
                        <p class="error"><?= $errors["solde"] ?></p>
                    <?php
                }
            ?>
    </div>

    <input type="submit" value="Confirmer">

</form>

<?php 

include('../templates/footer.php');

?>