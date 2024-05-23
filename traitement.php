<?php
    session_start();

    if(isset($_GET['action'])){
        switch($_GET['action']){
            case "add":
            case "delete":
            case "clear":
            case "up-qtt":
            case "down-qtt":
        }
    }

    $_SESSION['MAJ'] = "";
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

            $_SESSION['MAJ'] = "Article ajouté(s)";
        } else {
            $_SESSION['MAJ'] = "Erreur";
        }

    } 

    header("Location:index.php");