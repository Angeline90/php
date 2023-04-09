<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/style.css">
    <title>Validation</title>
</head>

<body>
    
    <header>
        <img class="logo" src="../public/assets/logo.png" alt="Logo">
    </header>

    <?php
    $errors = [];
    $uploadDir = '../public/uploads/';
    $uploadFile = $uploadDir . basename($_FILES['avatar']['name']);
    $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
    $authorizedExtensions = ['jpg', 'png', 'gif', 'webp'];
    $maxFileSize = 1000000;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!isset($_POST['name']) || trim($_POST['name']) === '') {
            $errors[] = 'Le nom est obligatoire';
        }
        if (!isset($_POST['firstname']) || trim($_POST['firstname']) == '') {
            $errors[] = 'Le prénom est obligatoire';
        }
        if (!isset($_POST['birthdate'])) {
            $errors[] = 'Une date de naissance valide est obligatoire';
        }
        if (!in_array($extension, $authorizedExtensions)) {
            $errors[] = 'Veuillez selectionner une image de type jpg, png, gif ou webp';
        }

        if (file_exists($_FILES['avatar']['tmp_name']) && filesize($_FILES['avatar']['tmp_name']) > $maxFileSize) {
            $errors[] = 'Votre fichier doit faire moins de  1 Mo';
        }

        if (empty($errors)) {
            move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadFile);
            echo '<img src="' . $uploadFile . '"alt="avatar">' . '<br>';
            echo 'Merci ' . $_POST['firstname'] . ' ' . $_POST['name'] . ' votre profil a bien été crée. <br>';
            echo '<form action="delete.php" method="post">';
            echo '<input type="hidden" name="filename" value="' . basename($uploadFile) . '">';
            echo '<button class="delete" type="submit">Supprimer l\'image</button>';
            echo '</form>';
        } else {
            foreach ($errors as $error) {
                echo $error;
            }
        }
    }

    ?>
</body>

</html>