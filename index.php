<?php
    require_once "modeli/baza.php";

   $rezultat = $baza->query("SELECT * FROM proizvodi");
   $proizvodi = $rezultat->fetch_all(MYSQLI_ASSOC);

    /*
    [0]=>  ["id"]=> string(1) "1" ["ime"]=> string(8) "motorola" ["opis"]=> string(6) "masina" ["cena"]=> string(7) "3500.00" ["slika"]=> string(9) "[value-5]" ["kolicina"]=> string(1) "5" } 
    [1]=>  ["id"]=> string(1) "2" ["ime"]=> string(6) "bostan" ["opis"]=> string(6) "domaci" ["cena"]=> string(6) "600.00" ["slika"]=> string(9) "dinja.jpg" ["kolicina"]=> string(1) "1" } }
    */

    if(session_status() == PHP_SESSION_NONE)
    {
        session_start();
    }
   
?>

<!DOCTYPE html>

<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>
        <div>
            <a href="index.php">Glavna</a>

            <?php if( isset($_SESSION['ulogovan']) ): ?>

                <a href="logout.php">Logout</a>

            <?php else: ?>

                <a href="login.php">Login</a>

            <?php endif; ?>
        </div>

        <?php foreach($proizvodi as $proizvod):?>
            <div>
                <h1><?= $proizvod['ime']?></h1>
                <p><?= $proizvod['opis']?></p>
                <p>Cena proizvoda: <?= $proizvod['cena']?></p>
                <p>Na stanju: <?= $proizvod['kolicina']?></p>

                <?php if($proizvod['kolicina']==0): ?>

                    <p>Nema na stanju</p>

                <?php else: ?>

                    <p>Ima na stanju</p>
                    
                <?php endif; ?>

                <a href="proizvod.php?id=<?= $proizvod['id'] ?>">Pogledaj proizvod</a>
            </div>
           

        <?php endforeach; ?>
    </body>

</html>