<?php 

include('../templates/header.php');

$db = new PDO("mysql:host=" . DB_HOSTNAME . ";dbname=" . DB_DATABASE, "root", "root");

$query = $db->prepare("SELECT * FROM matelas");
$query->execute();

$matelasArray = array();

while ($matela = $query->fetch()) {
    $matelasArray[] = $matela;
}

?>

<div class="matelas-global-container">

<?php 
for ($i=0; $i < count($matelasArray); $i++) { 
    ?>
    <div class="matelas-container">
        
        <img src="<?= $matelasArray[$i]['img']?>" alt="Photo du matela" srcset="">
        <div class="matelas-text-container">
            <div class="left-side">
                <p><?= $matelasArray[$i]['marque']?></p>
                <p>Matelas <?= $matelasArray[$i]['name'] ?></p>
            </div>

            <div class="right-side">
                <p><?= $matelasArray[$i]['size'] ?></p>
                <?php
                    if($matelasArray[$i]['solde'] != 0){
                        ?>

                        <p class="nosolde"><?= $matelasArray[$i]['price']?>€</p>
                        <p class="price"><?= $matelasArray[$i]['price'] - $matelasArray[$i]['solde']?>€</p>

                        <?php
                    }else{
                        ?>
                            <p class="price"><?= $matelasArray[$i]['price']?>€</p>
                        <?php
                    }
                ?>
            </div>
        </div>


    
    </div>
    <?php
}
?>

</div>



<?php

include('../templates/footer.php');
