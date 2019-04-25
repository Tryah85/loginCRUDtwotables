<?php
require 'database.php';

$id = null;
if ( !empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

if ( null==$id ) {
    header("Location: main.php");
}

if ( !empty($_POST)) {
    // keep track validation errors
    $ins_nError = null;
    $explanationError = null;
    $dateError = null;
    
    // keep track post values
    $ins_n = $_POST['ins_n'];
    $explanation = $_POST['explanation'];
    $date = $_POST['date'];
    
    // validate input
    $valid = true;
    if (empty($ins_n)) {
        $ins_nError = 'Please enter Incident Number.';
        $valid = false;
    }
    
    if (empty($explanation)) {
        $explanationError = 'Please enter explanation Address';
        $valid = false;
    }
    
    if (empty($date)) {
        $dateError = 'Please enter date Number';
        $valid = false;
    }
    
    // update data
    if ($valid) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE safety  set ins_n = ?, explanation = ?, date =? WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($ins_n,$explanation,$date,$id));
        Database::disconnect();
        header("Location: main.php");
    }
} else {
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM safety where id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $ins_n = $data['ins_n'];
    $explanation = $data['explanation'];
    $date = $data['date'];
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
                        <h3>Update</h3>
                    </div>
             
                    <form class="form-horizontal" action="update.php?id=<?php echo $id?>" method="post">
                      <div class="control-group <?php echo !empty($ins_nError)?'error':'';?>">
                        <label class="control-label">Incident Number</label>
                        <div class="controls">
                            <input name="ins_n" type="text"  placeholder="Incident Number" value="<?php echo !empty($ins_n)?$ins_n:'';?>">
                            <?php if (!empty($ins_nError)): ?>
                                <span class="help-inline"><?php echo $ins_nError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($explanationError)?'error':'';?>">
                        <label class="control-label">Explanation</label>
                        <div class="controls">
                            <input name="explanation" type="text" placeholder="explanation Address" value="<?php echo !empty($explanation)?$explanation:'';?>">
                            <?php if (!empty($explanationError)): ?>
                                <span class="help-inline"><?php echo $explanationError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($dateError)?'error':'';?>">
                        <label class="control-label">Date</label>
                        <div class="controls">
                            <input name="date" type="text"  placeholder="Date accured" value="<?php echo !empty($date)?$date:'';?>">
                            <?php if (!empty($dateError)): ?>
                                <span class="help-inline"><?php echo $dateError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Update</button>
                          <a class="btn" href="main.php">Back</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>