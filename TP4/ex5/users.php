<?php
header('Content-Type: application/json'); // Définir le type de contenu JSON

require_once('config.php');

// Gérer la méthode GET pour récupérer tous les utilisateurs
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $users = get_users($pdo);
    echo json_encode($users);
}

// Gérer la méthode POST pour créer un nouvel utilisateur
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $inputData = json_decode(file_get_contents('php://input'), true);
    $result = create_user($pdo, $inputData);
    echo json_encode($result);
}

// Gérer la méthode DELETE pour supprimer un utilisateur
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    // Récupérer les données du corps de la requête DELETE
    $inputData = json_decode(file_get_contents('php://input'), true);

    if (isset($inputData['id'])) {
        $user_id = $inputData['id'];
        $result = delete_user($pdo, $user_id);
        echo json_encode($result);
    } else {
        echo json_encode(array('error' => 'L\'ID de l\'utilisateur n\'est pas spécifié dans le corps de la requête.'));
    }
}

// Gérer la méthode PUT pour mettre à jour un utilisateur
if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    // Récupérer les données du corps de la requête PUT
    $inputData = json_decode(file_get_contents('php://input'), true);

    if (isset($inputData['id'])) {
        $user_id = $inputData['id'];
        $result = update_user($pdo, $user_id, $inputData);
        echo json_encode($result);
    } else {
        echo json_encode(array('error' => 'L\'ID de l\'utilisateur n\'est pas spécifié dans le corps de la requête.'));
    }
}




// Fonction pour récupérer tous les utilisateurs
function get_users($pdo)
{
    $request = $pdo->prepare("SELECT * FROM users");
    $request->execute();
    $users = $request->fetchAll(PDO::FETCH_ASSOC);
    return $users;
}

// Fonction pour créer un nouvel utilisateur
function create_user($pdo, $data)
{
    try {
        // Valider les données d'entrée (assurez-vous que les champs requis sont présents)
        if (!isset($data['name']) || !isset($data['email'])) {
            return array('error' => 'Les champs name et email sont requis.');
        }

        $name = $data['name'];
        $email = $data['email'];

        // Préparer la requête d'insertion
        $insertQuery = "INSERT INTO users (name, email) VALUES (:name, :email)";
        $insertStatement = $pdo->prepare($insertQuery);

        // Associer les valeurs aux paramètres de la requête
        $insertStatement->bindParam(':name', $name);
        $insertStatement->bindParam(':email', $email);

        // Exécuter la requête d'insertion
        if ($insertStatement->execute()) {
            return array('message' => 'Nouvel utilisateur ajouté avec succès.');
        } else {
            return array('error' => 'Erreur lors de l\'ajout de l\'utilisateur.');
        }
    } catch (PDOException $e) {
        return array('error' => 'Erreur lors de l\'ajout de l\'utilisateur : ' . $e->getMessage());
    }
}


// Fonction pour supprimer un utilisateur
function delete_user($pdo, $user_id)
{
    try {
        // Valider l'ID de l'utilisateur (assurez-vous qu'il s'agit d'un entier positif)
        if (!is_numeric($user_id) || $user_id <= 0) {
            return array('error' => 'L\'ID de l\'utilisateur n\'est pas valide.');
        }

        // Préparer la requête de suppression
        $deleteQuery = "DELETE FROM users WHERE id = :id";
        $deleteStatement = $pdo->prepare($deleteQuery);

        // Associer l'ID aux paramètres de la requête
        $deleteStatement->bindParam(':id', $user_id, PDO::PARAM_INT);

        // Exécuter la requête de suppression
        if ($deleteStatement->execute()) {
            return array('message' => 'Utilisateur supprimé avec succès.');
        } else {
            return array('error' => 'Erreur lors de la suppression de l\'utilisateur.');
        }
    } catch (PDOException $e) {
        return array('error' => 'Erreur lors de la suppression de l\'utilisateur : ' . $e->getMessage());
    }
}

// Fonction pour mettre à jour un utilisateur
function update_user($pdo, $user_id, $new_data)
{
    try {
        // Valider l'ID de l'utilisateur (assurez-vous qu'il s'agit d'un entier positif)
        if (!is_numeric($user_id) || $user_id <= 0) {
            return array('error' => 'L\'ID de l\'utilisateur n\'est pas valide.');
        }

        // Préparer la requête de mise à jour en fonction des nouvelles données
        $updateQuery = "UPDATE users SET name = :name, email = :email WHERE id = :id";
        $updateStatement = $pdo->prepare($updateQuery);

        $updateStatement->bindParam(':id', $user_id, PDO::PARAM_INT);
        $updateStatement->bindParam(':name', $new_data['name']);
        $updateStatement->bindParam(':email', $new_data['email']);

        // Exécuter la requête de mise à jour
        if ($updateStatement->execute()) {
            return array('message' => 'Utilisateur mis à jour avec succès.');
        } else {
            return array('error' => 'Erreur lors de la mise à jour de l\'utilisateur.');
        }
    } catch (PDOException $e) {
        return array('error' => 'Erreur lors de la mise à jour de l\'utilisateur : ' . $e->getMessage());
    }
}


// Fermer la connexion à la base de données
$pdo = null;
