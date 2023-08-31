<?php
// Importation des dépendances et configuration pour le débogage
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

// Inclusion des fichiers nécessaires
require __DIR__ . '/../actions/produits_action.php';

include __DIR__ . '/header.php';?>

<?php
// Vérifie si la variable de session 'targetPath' existe
if (!isset($_SESSION["targetPath"])) {
    die("Aucun profile pour l`instant!.");
}

// Vérifie si la variable de session 'profiles' existe
if (!isset($_SESSION["produit"])) {
    die("Erreur: La variable produit de la session est manquante.");
}

// Récupère et désérialise le premier profil de la session
$serializedProduits = $_SESSION["produit"][0];



// Vérifie le type de la variable sérialisée pour décider de la désérialisation
if (is_string($serializedProduits)) {
    $Produits = unserialize($serializedProduits);
} elseif (is_object($serializedProduits)) {
    $Personne = $serializedProduits;
} else {
    // Affiche des informations pour le débogage et arrête l'exécution du script
    var_dump($serializedProduits);
    die("La valeur à désérialiser n'est ni une chaîne ni un objet.");
}
?>



<body>
<div class="container mt-5">
    <h1>Produits</h1>
    <div class="produit-section">
        <?php if (isset($_SESSION["produit"])): ?>
            <?php foreach ($_SESSION["produit"] as $profileKey => $serializedProduits):
                $Produits = unserialize($serializedProduits); // Désérialisez l'objet ici

                ?>
                <div class="card p-3 shadow">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="/../fichiers/photos/<?php echo $Produits->getPhoto(); ?>" class="card-img" alt="Photo du produit">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $Produits->getNom(); ?></h4>
                                <!-- J'ai enlevé la div card-body imbriquée ici -->
                                <p><strong>Prix :</strong> <?php echo $Produits->getPrix(); ?>$Can</p>
                                <p><strong>Quantite :</strong> <?php echo $Produits->getQuantite(); ?></p>
                                <p><strong>Prix Total :</strong> <?php echo $Produits->getPrixTotal(); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Aucun produit n'a été créé pour le moment.</p>
        <?php endif; ?>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
<?php include __DIR__ . '/footer.php' ?>

