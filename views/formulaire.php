<?php

session_start();

?>


<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .content {
            margin-bottom: 100px; /* Ou toute autre valeur qui correspond à la hauteur de votre footer */
        }

    </style>
</head>
<body>

<?php
include __DIR__ . '/header.php';
?>


<div class="container mt-5">
    <div class="card p-4 shadow">
        <div class="card-body">

            <h1 class="text-center mb-4">Creer un profil produit</h1>
            <form action="../actions/produits_action.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom" required>

                </div>
                <div class="mb-3">
                    <label for="prix" class="form-label">Prix</label>
                    <input type="number" class="form-control" id="prix" name="prix" step="0.01" required>
                </div>

                <div class="mb-3">
                    <label for="quantite" class="form-label">Quantite</label>
                    <input type="number" class="form-control" id="quantite" name="quantite" step="1" required>
                </div>
                <div class="mb-3">
                    <label for="photo" class="form-label">Photo de profil</label>
                    <input type="file" class="form-control" id="photo" name="photo" accept="image/*" required>
                </div>

                <button type="submit" class="btn btn-primary">Créer Produit</button>

            </form>

            <div class="mt-3 text-center">
                <a href="/views/index.php" class="btn btn-outline-secondary">Afficher les produits</a>
            </div>

        </div>
    </div>
</div>


<?php include __DIR__ . '/footer.php' ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
