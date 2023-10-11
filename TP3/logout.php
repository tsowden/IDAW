<?php
session_start(); // Démarre la session
session_destroy(); // Détruit la session

// Redirigez l'utilisateur vers une page de votre choix (par exemple, la page d'accueil)
header("Location: index.php");
?>
