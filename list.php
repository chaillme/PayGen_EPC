<?php
$db = new SQLite3('payments.db');
$result = $db->query('SELECT * FROM payments');
require 'header.php'; 

?>

    <div class="container">
        <h1>Tableau des données</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
					<th>ID</th>
                    <th>Montant</th>
                    <th>Description</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetchArray()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
					<td><?php echo $row['amount']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Modifier</a>
                        <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Supprimer</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>


<?php require 'footer.php'; ?>