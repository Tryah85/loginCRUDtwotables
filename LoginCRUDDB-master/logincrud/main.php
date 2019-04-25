<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
</head>
 
<body>
    <div class="container">
            <div class="row">
                <h3>Safety Incdents</h3>
            </div>
            <div class="row">
                <p>
                    <a href="create.php" class="btn btn-success">Add</a>
                </p>
                <p>
                    <a href="login/logout.php"class="btn btn-danger" name="logout" />Log Out</a>
                </p>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Number</th>
                      <th>Explanation</th>
                      <th>Date Accured</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   include 'database.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM saftey ORDER BY id DESC';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['ins_n'] . '</td>';
                            echo '<td>'. $row['explanation'] . '</td>';
                            echo '<td>'. $row['date'] . '</td>';
                            echo '<td width=250>';
                            echo '<a class="btn" href="read.php?id='.$row['id'].'">Read</a>';
                            echo ' ';
                            echo '<a class="btn btn-success" href="update.php?id='.$row['id'].'">Update</a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="delete.php?id='.$row['id'].'">Delete</a>';
                            echo '</td>';
                            echo '</tr>';
                   }
                   Database::disconnect();
                  ?>
                  </tbody>

            </table>
        </div>
    </div> <!-- /container -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

  </body>
</html>