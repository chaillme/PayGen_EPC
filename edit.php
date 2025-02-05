<?php
$db = new SQLite3('payments.db');
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $amount = $_POST['amount'];
    $description = $_POST['description'];
	$date = $_POST['date'];
    $db->exec("UPDATE payments SET amount='$amount', description='$description' , date='$date' WHERE id='$id'");
    header('Location: list.php');
}


$id = $_GET['id'];
$result = $db->query("SELECT * FROM payments WHERE id='$id'");
$row = $result->fetchArray();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Modifier l'enregistrement</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Modifier l'enregistrement</h1>
        <form action="edit.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <div class="form-group">
                <label>Amount</label>
                <input type="number" name="amount" class="form-control" value="<?php echo $row['amount']; ?>">
            </div>
            <div class="form-group">
                <label>description</label>
                <input type="test" name="description" class="form-control" value="<?php echo $row['description']; ?>">
            </div>
			<div class="form-group">
                <label>date</label>
                <input type="texte" name="date" class="form-control" readonly="readonly" value="<?php echo $row['date']; ?>">
            </div>
            <button type="submit" name="update" class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>
</body>
</html>