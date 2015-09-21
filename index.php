<?php include('header.php') ?>        
<?php
    $mysqli = mysqli_connect("localhost", "root", "root", "instasomething");
    $query = "SELECT * FROM Posts ORDER BY id DESC;";
    $result = mysqli_query($mysqli, $query);
    if (!$result) {
        exit("Database query error: mysql_error($mysqli) $query");
    }
?>

<div class="row">
    <div class="col-lg-12">
        <h1>Instasomething</h1>
        <p class="lead"><a href="new_photo.php">Add New Photo</a></p>
    </div>
</div>

<div class="row">
  <?php while ($record = mysqli_fetch_assoc($result)) { ?>
      <div class="col-lg-12">
          <img class="img-responsive center-block" 
               src="/uploads/<?= $record["file_path"]?>" width="300" alt="">
          <p>
              <span class="glyphicon glyphicon-time"></span> 
              <?= $record["post_date"]?>
          </p>
          <p class="lead">
              <?= $record["description"]?>
          </p>
          <hr>
      </div>
  <?php } ?>
</div>
<?php include('footer.php') ?>        
