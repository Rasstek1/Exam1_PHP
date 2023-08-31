<?php

namespace helpers;

class Validation
{
    private $data;
    private $errors = [];

    public function __construct($data) {
        $this->data = $data;
    }

    public function isValid() {
        $allFields = ['nom', 'prix', 'quantite', 'photo'];
        $allFieldsFilled = true;

        foreach ($allFields as $field) {
            if (empty($this->data[$field])) {
                $allFieldsFilled = false;
                break;
            }
        }

        if (!$allFieldsFilled) {
            $this->errors[] = 'Tous les champs sont requis.';
        }

        return $allFieldsFilled;
    }


    public function getErrors() {
        return $this->errors;
    }
}

//code a mettre dans le fichier formulaire.php pour la validation coté client
/*<div class="container">
    <?php if (isset($_SESSION['errors'])): ?>
        <div class="alert alert-danger">
            <?php foreach ($_SESSION['errors'] as $error): ?>
                <p><?php echo $error; ?></p>
            <?php endforeach; ?>
        </div>
        <?php unset($_SESSION['errors']); ?>
    <?php endif; ?>
</div>*/