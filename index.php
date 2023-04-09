<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
    <link rel="stylesheet" href="/public/css/style.css">
</head>
<body>
    <header>
        <img class="logo" src="public/assets/logo.png" alt="Logo">
    </header>
    
    <main>
        <form action="/src/form-valid.php" method="post" enctype="multipart/form-data">
    <div>
        <label for="name">Nom :</label>
        <input type="text" id="name" name="name">
    </div>
    <div>
        <label for="firstname">Prénom :</label>
        <input type="text" id="firstname" name="firstname">
    </div>
    <div>
        <label for="birthdate">Date de naissance :</label>
        <input type="date" id="birthdate" name="birthdate" value="2002-01-01">
    </div>
    <div>
        <label for="imageUpload">Ajouter une photo de profil :</label>
        <input type="file" name="avatar" id="imageUpload">
    </div>
    <div class="button">
        <button type="submit">Créez votre profil</button>
    </div>
        </form>
    </main>
</body>     
</html>