<?php require 'header.php'; ?>
    <div class="container mt-5">
        <h2 class="text-center">Générer un QR Code de Paiement</h2>
        <form action="generate_qr.php" method="post">
            <div class="form-group">
                <label for="amount">Montant :</label>
                <input type="text" class="form-control" id="amount" name="amount" required>
            </div>
            <div class="form-group">
                <label for="description">Description :</label>
                <input type="text" class="form-control" id="description" name="description" required>
            </div>
            <button type="submit" class="btn btn-primary">Générer QR Code</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php require 'footer.php'; ?>