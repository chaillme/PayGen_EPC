<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $amount = $_POST['amount'];
    $description = $_POST['description'];
    $status = $_POST['status'];
	require 'header.php'; 
    if ($status == 'success') {
        // Connexion à la base de données SQLite
        $db = new SQLite3('payments.db');

        // Créer la table si elle n'existe pas
        $db->exec("CREATE TABLE IF NOT EXISTS payments (id INTEGER PRIMARY KEY, amount TEXT, description TEXT, date DATE)");

		$date = date('d-m-Y');
		
        // Insérer les données de paiement
        $stmt = $db->prepare("INSERT INTO payments (amount, description, date) VALUES (:amount, :description, :date)");
        $stmt->bindValue(':amount', $amount, SQLITE3_TEXT);
        $stmt->bindValue(':description', $description, SQLITE3_TEXT);
		$stmt->bindValue(':date', $date);
        $stmt->execute();

        echo '<div class="container mt-5 text-center">';
        echo '<h3>Paiement enregistré avec succès !</h3>';
        echo '<a href="index.php" class="btn btn-primary">Retour au formulaire</a>';
        echo '</div>';
    } else {
        // Rediriger vers le formulaire en cas de status pas ok
        
		echo '<div class="container mt-5 text-center">';
        echo '<h3>Paiement est pas enregistré !</h3>';
        echo '<a href="index.php" class="btn btn-primary">Retour</a>';
        echo '</div>';
		
		
		//header('Location: index.php');
    }

require 'footer.php';
}



?>