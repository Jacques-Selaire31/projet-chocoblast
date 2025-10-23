<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? "" ?></title>
</head>

<body>
    <h2>Connexion</h2>

    <form id="loginForm" action="" method="POST">
        <div class="form-group">
            <label for="email">Adresse email</label>
            <input type="email" id="email" name="email" required placeholder="votre@email.com">
        </div>

        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" required placeholder="Votre mot de passe">
        </div>

        <button type="submit" class="btn" name="submit">Se connecter</button>

        <div><?=$data["message"] ?? "" ?></div>
    </form>
</body>

</html>