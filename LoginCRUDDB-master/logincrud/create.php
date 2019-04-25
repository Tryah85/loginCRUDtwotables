<?php 
     
    require 'database.php';
 
    if ( !empty($_POST)) {
        // keep track validation errors
        $ins_nError = null;
        $explantionError = null;
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
            $explanationError = 'Please explain saftey issue.';
            $valid = false;
        }
         
        if (empty($date)) {
            $dateError = 'Please enter date accured.';
            $valid = false;
        }
         
        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO safety (ins_n,explanation,date) values(?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($ins_n,$explanation,$date));
            Database::disconnect();
            header("Location: main.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
    
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Create Incident</h3>
                    </div>
             
                    <form class="form-horizontal" action="create.php" method="post">
                      <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
                        <label class="control-label">Incident Number</label>
                        <div class="controls">
                            <input name="ins_n" type="number"  placeholder="Incident Number" value="<?php echo !empty($ins_n)?$ins_n:'';?>">
                            <?php if (!empty($ins_nError)): ?>
                                <span class="help-inline"><?php echo $ins_nError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($explanationError)?'error':'';?>">
                        <label class="control-label">Expanation</label>
                        <div class="controls">
                            <input name="explanation" type="text" placeholder="Explanation" value="<?php echo !empty($explanation)?$explanation:'';?>">
                            <?php if (!empty($explanationError)): ?>
                                <span class="help-inline"><?php echo $explanationError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($dateError)?'error':'';?>">
                        <label class="control-label">Date Accued</label>
                        <div class="controls">
                            <input name="date" type="text"  placeholder="Date" value="<?php echo !empty($date)?$date:'';?>">
                            <?php if (!empty($dateError)): ?>
                                <span class="help-inline"><?php echo $dateError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Create</button>
                          <a class="btn" href="main.php">Back</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>
        