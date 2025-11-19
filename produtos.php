<?php

include_once 'backend/db.php';

$selectProduct = "SELECT 
  p.id_product, 
  p.name, 
  p.price, 
  i.src_img
FROM product AS p
INNER JOIN product_img AS i 
  ON i.id_product = p.id_product
  AND i.img_main = 1";
$resultProduct = $db->query($selectProduct);
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modesta WebStore</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <?php include_once 'partials/header.php';?>

  <main>

  <?php 
  
  $selectCategory = "SELECT 
    *
  FROM product_category
    WHERE status = 1";
  $resultCategory = $db->query($selectCategory);
  ?>
    <aside>
      <ul>
        <li>Categorias
          <?php if($resultCategory){
            while($obj = $resultCategory->fetch_object()){
              echo "
                <ul>
                  <li><a href='#'>{$obj->category_name}</a></li>
                </ul>
              ";
            }
          }?>
        </li>
        <li>Tamanhos</li>
        <li>Cores</li>
        <li>Preço</li>
      </ul>
    </aside>

    <section class='div-main'>
      <h2>Produtos</h2>

      <?php if($resultProduct){
        echo "<section class='produtos'>"; 
        while($obj = $resultProduct->fetch_object()){
          echo "
            <div class='card-produto'>
              <img src='{$obj->src_img}' alt='{$obj->name}'>
              <h3>{$obj->name}</h3>
              <p class='preco'>R$ {$obj->price}</p>
            </div>";
          }
        echo "</section>";
        }else {
          echo "Sem produtos no momento.";
      } ?>

    </section>

  </main>

    <?php include_once 'partials/footer.php';?>

</body>
</html>