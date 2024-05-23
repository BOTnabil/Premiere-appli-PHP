<?php
    session_start();

    $_SESSION['MAJindex'] = " ";
    $_SESSION['MAJrecap'] = " ";

    if(isset($_GET['action'])){
        switch($_GET['action']){
            case "add":     
                if(isset($_POST['submit'])){

                $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
                $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);
        
                if($name && $price && $qtt){
                    
                    $product = [
                        "name" => $name,
                        "price" => $price,
                        "qtt" => $qtt,
                        "total" => $price*$qtt
                    ];
                    
                    $_SESSION['products'][] = $product;
        
                    $_SESSION['MAJindex'] = "Article ajouté(s)";
                } else {
                    $_SESSION['MAJindex'] = "Erreur";
                }
                header("Location:index.php");
        
                } 
                break;
            case "delete": 
                if(isset($_GET["id"])){
                    unset($_SESSION["products"][$_GET["id"]]);
                }
                $_SESSION['MAJrecap'] = "L'article a bien été supprimé";
                header("Location:recap.php");
                break;
            case "clear":
                unset($_SESSION["products"]);
                header("Location:recap.php");
                $_SESSION['MAJrecap'] = "Tout les articles ont été supprimés";
                break;
            case "up-qtt":
                    if (isset($_GET["id"])) {
                        if (isset($_SESSION["products"][$_GET["id"]])) {
                            $_SESSION["products"][$_GET["id"]]["qtt"]++;
                        }
                    }
                header("Location:recap.php");
                break;
            case "down-qtt":
                if (isset($_GET["id"])) {
                    if (isset($_SESSION["products"][$_GET["id"]]) && $_SESSION["products"][$_GET["id"]]["qtt"]>0) {
                        $_SESSION["products"][$_GET["id"]]["qtt"]--;
                    }
                    if ($_SESSION["products"][$_GET["id"]]["qtt"]==0){
                        unset($_SESSION["products"][$_GET["id"]]);
                        $_SESSION['MAJrecap'] = "L'article a bien été supprimé";
                    }
                }
                header("Location:recap.php");
                break;
        }
    }