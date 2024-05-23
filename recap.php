<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <title>Récapitulatif des produits</title>
</head>
<header>
        <nav>
            <a href="index.php">INDEX</a>
            <a href="recap.php">RECAP</a>
        </nav>
    </header>
<body>
    <?php 
        if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
            echo "<p>Aucun produit en session...</p>";
        }
        else{
            echo "<table class='table'>",
                    "<thead>",
                        "<tr>",
                            "<th>#</th>",
                            "<th>Nom</th>",
                            "<th>Prix</th>",
                            "<th>Quantité</th>",
                            "<th>Total</th>",
                        "</tr>",
                    "<thead>",
                    "<tbody>";

            $totalGeneral = 0;
            foreach($_SESSION['products'] as $index => $product){
                echo "<tr>",
                        "<td>".$index."</td>",
                        "<td>".$product['name']."</td>",
                        "<td>".number_format($product['price'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                        "<td>".$product['qtt']."</td>",
                        "<td>".number_format($product['total'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                        "<td><form action='traitement.php?action=delete' method='get'>
                            <p> 
                            <input type='button' name='delete' value='Delete'> 
                            </p>
                        </form>",
                    "</tr>";
                    $totalGeneral+= $product['total'];
            }
            $totalQtt = 0;
            foreach($_SESSION['products'] as $index => $product){
                $totalQtt += $product['qtt'];
            }
            echo "<tr>",
                    "<td colspan=3>Quantité totale d'articles : </td>",
                    "<td>$totalQtt</td>",
                "</tr>",
                "<tr>",
                    "<td colspan=4>Total général : </td>",
                    "<td><strong>".number_format($totalGeneral, 2, ",", "&nbsp;")."&nbsp;€</strong></td>",
                "</tr>",
                "</tbody>",
                "</table>";
                
        }
    ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<!-- 
<form action="traitement.php?action=delete" method="get">
    <p> 
    <input type="button" name="delete" value="Delete"> 
    </p>
</form>
-->