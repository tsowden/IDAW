<?php

// Récupérer les données de config.php

require_once('config.php');

$connectionString = "mysql:host=" . _MYSQL_HOST;

if (defined('_MYSQL_PORT')) {
    $connectionString .= ";port=" . _MYSQL_PORT;
}

$connectionString .= ";dbname=" . _MYSQL_DBNAME;

$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
$pdo = NULL;

try {
    $pdo = new PDO($connectionString, _MYSQL_USER, _MYSQL_PASSWORD, $options);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $erreur) {
    echo 'Erreur : ' . $erreur->getMessage();
    exit;
}

// Sélectionner tous les utilisateurs
$request = $pdo->prepare("SELECT * FROM users");
$request->execute();

// Afficher les résultats dans un tableau HTML
echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>";

while ($row = $request->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>";
    echo "<a href='users.php?action=edit&id=" . $row['id'] . "'>Modifier</a> | ";
    echo "<a href='users.php?action=delete&id=" . $row['id'] . "'>Supprimer</a>";
    echo "</td>";
    echo "</tr>";
}

echo "</table>";

// Création d'un nouvel utilisateur
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ajouter'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $insertQuery = "INSERT INTO users (name, email) VALUES (:name, :email)";
    $insertStatement = $pdo->prepare($insertQuery);

    $insertStatement->bindParam(':name', $name);
    $insertStatement->bindParam(':email', $email);

    if ($insertStatement->execute()) {
        echo "Nouvel utilisateur ajouté avec succès.";
    } else {
        echo "Erreur lors de l'ajout de l'utilisateur.";
    }
    header("Location: users.php");
    exit;
}

// Suppression d'un utilisateur
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];

    $deleteQuery = "DELETE FROM users WHERE id = :id";
    $deleteStatement = $pdo->prepare($deleteQuery);

    $deleteStatement->bindParam(':id', $id);

    if ($deleteStatement->execute()) {
        echo "Utilisateur supprimé avec succès.";
    } else {
        echo "Erreur lors de la suppression de l'utilisateur.";
    }
    header("Location: users.php");
    exit;
}

// Form modification d'un utilisateur
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'edit' && isset($_GET['id'])) {
    $id = $_GET['id'];

    $selectUserQuery = "SELECT * FROM users WHERE id = :id";
    $selectUserStatement = $pdo->prepare($selectUserQuery);
    $selectUserStatement->bindParam(':id', $id);
    $selectUserStatement->execute();
    $user = $selectUserStatement->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        echo "Utilisateur non trouvé.";
    } else {
        // Affichez un formulaire de modification avec les informations de l'utilisateur préremplies.
        echo "<h2>Modifier l'utilisateur</h2>";
        echo "<form method='post' action='users.php'>";
        echo "<input type='hidden' name='id' value='" . $user['id'] . "'>";
        echo "Nom : <input type='text' name='name' value='" . $user['name'] . "' required><br>";
        echo "Email : <input type='text' name='email' value='" . $user['email'] . "' required><br>";
        echo "<input type='submit' name='modifier' value='Modifier utilisateur'>";
        echo "</form>";
    }
}

// Mise à jour de l'utilisateur
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['modifier'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    $updateUserQuery = "UPDATE users SET name = :name, email = :email WHERE id = :id";
    $updateUserStatement = $pdo->prepare($updateUserQuery);
    $updateUserStatement->bindParam(':name', $name);
    $updateUserStatement->bindParam(':email', $email);
    $updateUserStatement->bindParam(':id', $id);

    if ($updateUserStatement->execute()) {
        echo "Utilisateur mis à jour avec succès.";
    } else {
        echo "Erreur lors de la mise à jour de l'utilisateur.";
    }
    header("Location: users.php");
    exit;
}


// Actions possibles
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action'])) {
    if ($_GET['action'] === 'edit' && isset($_GET['id'])) {
        $id = $_GET['id'];
    } elseif ($_GET['action'] === 'delete' && isset($_GET['id'])) {
        $id = $_GET['id'];
    }
}

// Fermer la connexion à la base de données
$pdo = null;
?>

<!-- Formulaire pour ajouter un utilisateur -->
<form method="post" action="users.php">
    <h2>Ajouter un utilisateur</h2>
    <label for="name">Nom :</label>
    <input type="text" name="name" id="name" required>
    <br>
    <label for="email">Email :</label>
    <input type="text" name="email" id="email" required>
    <br>
    <input type="submit" name="ajouter" value="Ajouter un utilisateur">
</form>