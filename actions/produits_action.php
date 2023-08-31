<?php
ob_start(); // Permet de stocker les données dans le tampon de sortie
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use helpers\Validation;

require_once __DIR__ . '/../models/Produit.php';
require_once __DIR__ . '/../helpers/Validation.php';




session_start();

function CreateProfileProduit()
{




// Téléchargement de la photo
    $targetDir = __DIR__ . "/../fichiers/photos/";//Emplacement du fichier pour la photo

// Assurez-vous que le répertoire existe
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    $photo = $_FILES["photo"];
    $photoName = time() . '.' . pathinfo($photo["name"], PATHINFO_EXTENSION);
    $targetPath = $targetDir . $photoName;

    if (!move_uploaded_file($photo["tmp_name"], $targetPath)) {
        $_SESSION["error"] = "Erreur lors du téléchargement du fichier.";
        header('Location: /Exam_1/views/index.php');

        exit;
    }

    // Création de l'objet Personne
    var_dump($_POST);
    $Produits = new Produit(
        $_POST['nom'],
        $_POST['prix'],
        $_POST['quantite'],
        $photoName

    );


    // Stockez ici l'objet Produit dans la session
    $_SESSION['produit'][] = serialize($Produits);

    $_SESSION['targetPath'] = $targetPath;





    // Redirection
    header('Location: /Exam_1/views/index.php');

    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    CreateProfileProduit();
}


