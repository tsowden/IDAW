<?php
header('Content-Type: application/json'); // Définir le type de contenu JSON

require_once('config.php');

// Gérer la méthode GET pour récupérer les informations d'un utilisateur par ID
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $user_id = $_GET['id']; // Récupérer l'ID de l'utilisateur depuis l'URL
    $user = get_user($pdo, $user_id);
    echo json_encode($user);
} else {
    echo json_encode(array('error' => 'L\'ID de l\'utilisateur n\'est pas spécifié dans la requête GET.'));
}

// Fonction pour obtenir les informations d'un utilisateur par ID
function get_user($pdo, $user_id)
{
    try {
        // Valider l'ID de l'utilisateur (assurez-vous qu'il s'agit d'un entier positif)
        if (!is_numeric($user_id) || $user_id <= 0) {
            return array('error' => 'L\'ID de l\'utilisateur n\'est pas valide.');
        }

        // Préparer la requête pour obtenir les informations de l'utilisateur par ID
        $selectQuery = "SELECT id, name, email FROM users WHERE id = :id";
        $selectStatement = $pdo->prepare($selectQuery);
        $selectStatement->bindParam(':id', $user_id, PDO::PARAM_INT);

        // Exécuter la requête de sélection
        $selectStatement->execute();

        // Récupérer les résultats
        $user = $selectStatement->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            return $user;
        } else {
            return array('error' => 'Utilisateur non trouvé.');
        }
    } catch (PDOException $e) {
        return array('error' => 'Erreur lors de la récupération des informations de l\'utilisateur : ' . $e->getMessage());
    }
}
