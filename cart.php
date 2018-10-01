<?php  include("menu.php"); ?>
<!DOCTYPE html>
<html>
<body>
  <br/>
  <br/>
  <br/>

<div class="cart_info">
<table contenteditable="true">
        <tr>
            <td><b>Name</b></td>
            <td><b>Amount</b></td>
            <td><b>Price</b></td>
        </tr>
        <?php
        session_start();
        include('get_query.php');
        if($_SESSION[cart]){
            $cart = unserialize($_SESSION[cart]);
            foreach($cart as $key=>$value)
            {
                $item = get_item($key);
                echo "<tr><td><p>";
                echo $item[name];
                echo "</p></td><td><p>";
                echo $value;
                echo "</p></td><td><p>";
                echo $item[price] * $value;
                echo "</p></td></tr>";
            }
        }
        else{
                echo "<tr><td><p>0</p></td><td><p>0</p></td><td><p>0</p></td></tr>";
        }
        ?>

</table>
<div class="cart_total">
<table contenteditable="true">
        <tr>
            <td><b>Total price</b></td>
            <?php
                if($_SESSION[cart]){
                    $cart = unserialize($_SESSION[cart]);
                    foreach($cart as $key=>$value)
                    {
                        $item = get_item($key);
                        if(sum){
                            $sum += $item[price] * $value;
                        }
                        else{
                            $sum = $item[price] * $value;
                        }
                    }
                    echo "<td><p>";
                    echo $sum;
                    echo "</p></td>";
                }
                else{
                    echo "<td><p>0</p></td>";
                }
            ?>
        </tr>
</table>
</div>
<div class="cart_but">

<form><a href="finish_order.php"><button class="cart_button" type="button">Confirm</button></a></form>
<?php
  session_start();
  if($_SESSION[error]){
    if($_SESSION['error'] == 1){
        echo "<div class='finish_order'><p>Please log in or sign up to finish your order</p></div>";}
    if($_SESSION['error'] == 2){
        echo "<div class='finish_order'><p>Your order was recieved</p></div>";}
    if($_SESSION['error'] == 3){
        echo "<div class='finish_order'><p>Unfortunately, your order cannot be proceeded</p></div>";}
    if($_SESSION['error'] == 4){
        echo "<div class='finish_order'><p>No items in cart</p></div>";}
    $_SESSION['error'] = "";
   }
?>
</div>

</div>

</body>
</html>