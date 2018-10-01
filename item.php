<?php  include("menu.php"); ?>
<!DOCTYPE html>
<html>

<body>
  <br/>
  <br/>
  <div class="item_info">
          <?php
            session_start();
            include('get_query.php');
            if ($_GET['id'])
            {
                $item = get_item($_GET['id']);
                echo "<div class='item_info_left'>";
                echo "<img src='";
                echo $item['img'];
                echo "'/></div>";
                echo "<div class='item_info_right'><h2>";
                echo $item['name'];
                echo "</h2><p>Price:<em>";
                echo $item['price'];
                echo "</em></p><form><div class='item_but'><a href='add_to_cart.php?id=$item[id]'><button class='item_button' type='button'>Add to cart</button></a></div><form></div></div>";
            }
            else
            {
              echo"<div class='error'><p>Error Occured</p></div>";
            }
        ?>
   </div>
    <?php
      session_start();
      if($_SESSION['error']){
        echo "<div id = 'hideMe' class='item_order'><p>Added 1 item in cart</p></div>";
        $_SESSION['error'] = "";
      }
    ?>
</body>
</html>