<?php 
    require 'database.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: main.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM safety where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Incident</h3>
                    </div>
                     
                    <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">Incident Number</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['ins_n'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">explanation Address</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['explanation'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">date Number</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['date'];?>
                            </label>
                        </div>
                      </div>
                        <div class="form-actions">
                          <a class="btn" href="main.php">Back</a>
                       </div>
                     
                      
                    </div>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>