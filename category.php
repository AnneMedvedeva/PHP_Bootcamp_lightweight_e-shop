<?php  include("menu.php"); ?>
<!DOCTYPE html>
<html>
<body>
    <div class="store_logo_name"><h1>UNIT Factory unofficial store</h1><p>We have the lowest prices here ;)</p></div>
  <div class="category">
    <?php
        include("get_query.php");
        echo "<br/>";
        echo "<h2>Categories :</h2>";
        echo "<form method='get' action='category.php'>";
        $res = get_catigories_name();
        foreach ($res as $elem)
        {
            echo "<input type='checkbox' name='".$elem."'";
            if (array_key_exists($elem, $_GET))
            {
                echo " checked='checked'";
            }
                echo "> ".$elem."";
        }       
        echo "<input type='submit' name = 'submit' value='Submit' />";
        echo "</form>";
    ?>
  </div>

    <?php
    session_start();
    echo "<h1 class='name_store'>Products</h1>";
    echo "<div class='itym'>";
    $res = get_catigories_name();
    foreach($res as $check)
    {
        if (array_key_exists($check, $_GET)){
            $items_id = get_category_items($check);
            foreach($items_id as $one){
                $item = get_item($one);
                echo "<div class='item'>";
                echo "<img src=".$item[img]." alt='item' />";
                echo "<h2>".$item[name]."</h2>";
                echo "<p>Price: <em>".$item[price]."</em></p>";
                echo "<a href='item.php?id=$item[id]'><button class='add-to-cart' type='button'>View</button></div></a>";
            }
        }
    }
    ?>
</body>
</html>