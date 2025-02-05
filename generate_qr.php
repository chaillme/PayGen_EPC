<?php
require 'phpqrcode/qrlib.php';



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require 'header.php'; 
	$amount = $_POST['amount'];
    $description = $_POST['description'];

    // Créer le contenu du QR code
    $qrContent = "Montant: $amount\nDescription: $description";

    // Générer le QR code
    QRcode::png($qrContent, 'qrcode.png');

?>


    <div class="container mt-5 text-center">
		<img src="qrcode.png" alt="QR Code de Paiement"><br><br>
        <?php echo $amount ?>
        <?php echo $description ?>
		<form action="process_payment.php" method="post">
			<input type="hidden" name="amount" value="<?php echo $amount ?>">
			<input type="hidden" name="description" value="<?php echo $description ?>">
			<button type="submit" name="status" value="success" class="btn btn-success">Paiement Réussi</button>
			<button type="submit" name="status" value="failed" class="btn btn-danger">Paiement Échoué</button>
		</form>
    </div>

<?php
require 'footer.php'; 
}
?>