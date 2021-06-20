<?php
require "../views/header.php";
require "../controllers/connectiondb.php";


if (empty($_GET["id"]))
{
    die();
}
$id = checkInput($_GET["id"]);
$db = ConnexionDB::connect();
$stmt = $db->prepare("SELECT products.id, products.name, products.image, products.description, products.price, categories.name AS category 
                        FROM products LEFT JOIN categories ON products.category = categories.id
                        WHERE products.id = ?");
$stmt->execute(array($id));
$product = $stmt->fetch();
ConnexionDB::disconnect();


/**************security input************************/
function checkInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
/***************************************************/


?>

<div class="container viewProductUser">
    <div class="row">
        <div class="col-sm-6">
            <form>
                <div class="form-group">
                    <h1 class="viewProductUSer"><label><?php echo ' '. $product["name"]; ?></h1>
                </div>
            </form>
            <br>
            <form>
                <div class="form-group">
                    <label>Description : </label><?= $product['description'] ?>
                </div>
                <div class="form-group">
                    <label>Prix : </label><?= number_format((float)$product['price'],2,'.',''). " €"; ?>
                </div>
                <div class="form-group">
                    <label>Catégorie : </label><?= $product['category'] ?>
                </div>
                
            </form>
            <br>
            <div class="form-actions">
                <a class="btn btn-dark" href="indexAdmin.php">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5.5a.5.5 0 0 0 0-1H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5z"/>
                    </svg>
                    Retour
                </a>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="thumbnail">
                <img src="<?= $product['image'] ?>" alt="image">
                <div class="<?php echo number_format((float)$product['price'],2,'.',''). " €"; ?>"></div>
                <div class="caption">
                    <h4><?php echo $product["name"]; ?></h4>
                    <p><?php echo $product["description"]; ?></p>
                    <a href="" class="btn btn-success" role="button">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                        </svg>
                        COMMANDER
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>