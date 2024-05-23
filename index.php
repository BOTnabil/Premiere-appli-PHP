<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
        <title>Ajout produit</title>
    </head>
    <header>
        <nav>
            <a href="index.php">INDEX</a>
            <a href="recap.php">RECAP</a>
        </nav>
    </header>
    <body>

        <h1>Ajouter un produit</h1>
        <form action="traitement.php?action=add" method="post">
            <p>
                <label>
                    Nom du produit :
                    <input type="text" name="name">
                </label>
            </p>
            <p>
                <label>
                    Prix du produit :
                    <input type="number" step="any" name="price">
                </label>
            </p>
            <p>
                <label>
                    Quantité désirée :
                    <input type="number" name="qtt" value="1">
                </label>
            </p>
            <p>
                <input type="submit" name="submit" value="Ajouter le produit">
            </p>

        </form>
        <?php 
            $totalQtt = 0;
            foreach($_SESSION['products'] as $index => $product){
                $totalQtt += $product['qtt'];
            }
            echo "Quantité totale d'articles : $totalQtt<br>"; 

           echo $_SESSION['MAJ'];
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>