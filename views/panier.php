<?php require '../views/header.php'; ?>

<?php include_once ("../controllers/connectiondb.php");
//echo "essai 2";
$connection = ConnexionDB::connect();
//echo "essai 3";

//var_dump($connection->query('SELECT * FROM products'));

?>

<!doctype html>
<html lang="en">

<body>

<div class="home">
        <div class="row">
            <div class="wrap">
                <?php $products = $connection->query('SELECT * FROM products'); ?>
                <?php foreach ($products as $product): ?>

                    <div class="box">
                        <div class="product full">
                            <a href="#">
                                <img src="img/<? $product->id ?>.jpeg">
                            </a>
                        <div class="description">
                        <?php $product->name; ?>
                            <a href="#" class="price"><?php number_format($product->prix, 2, ',', ' '); ?> €</a>
                            </div>
                            <div class="add" href="#">add</a>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
    

</body>


<?php require '../views/footer.php'; ?>
</html>
