<?php require '../views/header.php';
include_once ("../controllers/connectiondb.php");
require "insertProduct.php";
//echo "hello";
$connection = ConnexionDB::connect();
?>

<!doctype html>
<html lang="en">

<body>
<?php

$req = "SELECT * FROM products";
// echo "salut1 ";
$stmt = $connection->prepare($req);
// echo "salut2 ";
$stmt->execute();
// echo "salut3 ";
$products = $stmt->fetchAll();
// echo "salut4 ";
// echo "<pre>";
// print_r($categories);



?>
<div class="containerModelArticle">
<?php foreach($products as $c) :?>
  <div class="container card">
        <img src="<?= $c['image'] ?>" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title"><?= $c['name'] ?></h5>
          <p class="card-text"><?= $c['description'] ?></p>
          <a href="viewProductUser.php?id=<?= $c['id'] ?>" class="btn btn-primary">Fiche Article</a>
        </div>
  </div>
  <?php endforeach;?>
</div>

<?php require '../views/footer.php'; ?>
</body>


</html>