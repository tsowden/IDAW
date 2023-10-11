<!DOCTYPE html>
<html>

<head>
</head>

<body>
    <?php
    $users = array(
        // login => password
        'riri' => 'fifi',
        'yoda' => 'maitrejedi'
    );
    $login = "anonymous";
    $errorText = "";
    $successfullyLogged = false;
    if (isset($_POST['login']) && isset($_POST['password'])) {
        $tryLogin = $_POST['login'];
        $tryPwd = $_POST['password'];
        // si login existe et password correspond
        if (array_key_exists($tryLogin, $users) && $users[$tryLogin] == $tryPwd) {
            $successfullyLogged = true;
            $login = $tryLogin;
            session_start();
            $_SESSION["s_login"] = $login;
            $_SESSION["s_pwd"] = $tryPwd;
        } else
            $errorText = "Erreur de login/password";
    } else
        $errorText = "Merci d'utiliser le formulaire de login";
    if (!$successfullyLogged) {
        echo $errorText;
    } else {
        echo "<h1>Bienvenue " . $login . "</h1>";
        echo "Votre mot de passe est " . $tryPwd . " !";
        echo '<p>Ouvrir la page Index : <a href="index.php">ici</a></p>';
    }
    ?>
</body>