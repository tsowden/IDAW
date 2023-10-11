<?php
$selectedStyle = isset($_COOKIE['selected_style']) ? $_COOKIE['selected_style'] : 'style1';

if (isset($_GET['css'])) {
    $selectedStyle = $_GET['css'];
    setcookie('selected_style', $selectedStyle);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Changer le style</title>
    <link rel="stylesheet" type="text/css" href="<?php echo $selectedStyle . '.css'; ?>">
</head>
<body>
    <header>
    Login : <?php 
    session_start();
    if (isset($_SESSION["s_login"])) {
        echo $_SESSION["s_login"];
    }
    else {
        echo "Non connecté";
    }
    ?>
    </header>
    <form id="style_form" action="index.php" method="GET">
        <select name="css">
            <option value="style1" <?php if ($selectedStyle === 'style1') echo 'selected'; ?>>style1</option>
            <option value="style2" <?php if ($selectedStyle === 'style2') echo 'selected'; ?>>style2</option>
        </select>
        <input type="submit" value="Appliquer" />
    </form>
    <h1>Choix du style</h1>
    <p>Se déconnecter : <a href="logout.php">ici</a></p>

</body>
</html>
