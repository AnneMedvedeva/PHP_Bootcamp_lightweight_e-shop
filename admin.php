<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="stock_style.css">
</head>
<body>
<!-- wrapper -->

<div class = "header_image"></div>

<div id="menu">
    <ul>
      <li><a href="admin.php?action=user-modif">Modif Users</a></li>
      <li><a href='admin.php?action=users-add'>Add Users</a></li>
      <li><a href='admin.php?action=goods-modif'>Modif Goods</a></li>
      <li><a href="admin.php?action=goods-add">Add Goods</a></li>
      <li><a href="admin.php?action=category-modif">Modif Categories</a></li>
      <li><a href='admin.php?action=category-add'>Add Catigories</a></li>
      <li><a href='admin.php?action=coalition-modif'>Modif Coalitions</a></li>
      <li><a href="admin.php?action=coalition-add">Add Coalitions</a></li>
      <li><a href='admin.php?action=orders'>Orders</a></li>
      <li><a href='index.php'>Back to store</a></li>
    </ul>
</div>


  <br/>
  <br/>
  <br/>
<?php
  include('admin_query.php');
  include('get_query.php');
  if ($_GET['action'])
  {
    switch ($_GET['action'])
    {
      case 'user-modif':
        echo "<div class='table'><form action='admin_make_action.php' method='post'>";
        echo "<table><tr>";
        $headers = get_rows('users');
        foreach ($headers as $value) {
          if ($value != 'passwd')
            echo "<td>$value</td>";
        }
        echo "</tr>";
        echo "<tr>";
        $users = get_all_users();
        foreach ($users as $user){
          foreach ($headers as $value) {
            if ($value != 'passwd'){
              if ($value != 'id' && $value != 'login')
                echo "<td><div><input type='text' name='$value' value='$user[$value]'/></div></td>";
              else
                echo "<td><div><input type='text' readonly name='$value' value='$user[$value]'/></div></td>";
            }
          }
          echo "<td><div><input type='submit' name='action' value='modif_user'></input></div></td>";
          echo "<td><div><input type='submit' name='action' value='del_user'></input></div></td>";
          echo "</tr>";
        }
        echo "</table></div'></form></div>";
        break;
      case 'users-add':
        echo "<div class='table'><form action='admin_make_action.php' method='post'>";
        echo "<table><tr>";
        $headers = get_rows('users');
        foreach ($headers as $value) {
          if ($value != 'id')
            echo "<td>$value</td>";
        }
        echo "</tr>";
        echo "<tr>";
        foreach ($headers as $value) {
          if ($value != 'id')
            echo "<td><div><input type='text' name='$value' value=''/></div></td>";
        }
        echo "<td><div><input type='submit' name='action' value='add_user'></input></div></td>";
        echo "</tr>";
        echo "</div'></form></div>";
        break;
      case 'goods-modif':
        echo "<div class='table'><form action='admin_make_action.php' method='post'>";
        echo "<table><tr>";
        $headers = get_rows('goods');
        foreach ($headers as $value) {
            echo "<td>$value</td>";
        }
        echo "</tr>";
        echo "<tr>";
        $items = get_all_items();
        foreach ($items as $item) {
          foreach ($headers as $value) {
               echo "<td><div><input type='text' name='$value' value='$item[$value]'/></div></td>";
          }
          echo "<td><div><input type='submit' name='action' value='modif_item'></input></div></td>";
          echo "<td><div><input type='submit' name='action' value='del_item'></input></div></td>";
          echo "</tr>";
        }
        echo "</table></div'></form></div>";
        break;
      case 'goods-add':
        echo "<div class='table'><form action='admin_make_action.php' method='post'>";
        echo "<table><tr>";
        $headers = get_rows('goods');
        foreach ($headers as $value) {
          if ($value != 'id')
            echo "<td>$value</td>";
        }
        echo "</tr>";
        echo "<tr>";
        foreach ($headers as $value) {
          if ($value != 'id')
            echo "<td><div><input type='text' name='$value' value=''/></div></td>";
        }
        echo "<td><div><input type='submit' name='action' value='add_goods'></input></div></td>";
        echo "</tr>";
        echo "</div'></form></div>";
        break;
      case 'category-modif':
        echo "<div class='table'><form action='admin_make_action.php' method='post'>";
        echo "<table><tr>";
        $headers = get_rows('category');
        foreach ($headers as $value) {
            echo "<td>$value</td>";
        }
        echo "</tr>";
        echo "<tr>";
        $categories = get_all_category();
        foreach ($categories as $category) {
          foreach ($headers as $value) {
            if ($value == 'items')
            {
              $arr = unserialize($category[$value]);
              $str = implode(",", $arr);
              echo "<td><div><input type='text' name='$value' value='$str'/></div></td>";
            }
            else if ($value != 'name' && $value != 'id')
               echo "<td><div><input type='text' name='$value' value='$category[$value]'/></div></td>";
             else
              echo "<td><div><input type='text' readonly name='$value' value='$category[$value]'/></div></td>";
          }
          echo "<td><div><input type='submit' name='action' value='modif_category'></input></div></td>";
          echo "<td><div><input type='submit' name='action' value='del_category'></input></div></td>";
          echo "</tr>";
        }
        echo "</table></div'></form></div>";
        break;
      case 'category-add':
        echo "<div class='table'><form action='admin_make_action.php' method='post'>";
        echo "<table><tr>";
        $headers = get_rows('category');
        foreach ($headers as $value) {
          if ($value != 'id')
            echo "<td>$value</td>";
        }
        echo "</tr>";
        echo "<tr>";
        foreach ($headers as $value) {
          if ($value != 'id')
            echo "<td><div><input type='text' name='$value' value=''/></div></td>";
        }
        echo "<td><div><input type='submit' name='action' value='add_categoty'></input></div></td>";
        echo "</tr>";
        echo "</div'></form></div>";
        break;
      case 'coalition-modif':
        echo "<div class='table'><form action='admin_make_action.php' method='post'>";
        echo "<table><tr>";
        $headers = get_rows('coalitions');
        foreach ($headers as $value) {
            echo "<td>$value</td>";
        }
        echo "</tr>";
        echo "<tr>";
        $coalitions = get_all_coalitions();
        foreach ($coalitions as $coalition) {
          foreach ($headers as $value) {
            if ($value == 'items')
            {
              $arr = unserialize($coalition[$value]);
              $str = implode(",", $arr);
              echo "<td><div><input type='text' name='$value' value='$str'/></div></td>";
            }
            else if ($value != 'name' && $value != 'id')
               echo "<td><div><input type='text' name='$value' value='$coalition[$value]'/></div></td>";
            else
              echo "<td><div><input type='text' readonly name='$value' value='$coalition[$value]'/></div></td>";
          }
          echo "<td><div><input type='submit' name='action' value='modif_coalition'></input></div></td>";
          echo "<td><div><input type='submit' name='action' value='del_coalition'></input></div></td>";
          echo "</tr>";
        }
        echo "</table></div'></form></div>";
        break;
      case 'coalition-add':
        echo "<div class='table'><form action='admin_make_action.php' method='post'>";
        echo "<table><tr>";
        $headers = get_rows('coalitions');
        foreach ($headers as $value) {
          if ($value != 'id')
            echo "<td>$value</td>";
        }
        echo "</tr>";
        echo "<tr>";
        foreach ($headers as $value) {
          if ($value != 'id')
            echo "<td><div><input type='text' name='$value' value=''/></div></td>";
        }
        echo "<td><div><input type='submit' name='action' value='add_coalition'></input></div></td>";
        echo "</tr>";
        echo "</div'></form></div>";
        break;
      case 'orders':
        echo "<table class='orders'>";
        echo "<tr>";
        $headers = get_rows('orders');
        foreach ($headers as $value) {
          echo "<td>$value</td>";
        }
        echo "</tr>";
        echo "<tr>";
        $orders = get_all_orders();
        foreach ($orders as $order) {
          echo "<tr>";
          foreach ($order as $key => $item) {
            if ($key == 'items' || $key == 'coalition' || $key == 'pcs')
            {
              $arr = unserialize($order[$key]);
              $str = implode(",", $arr);
              echo "<td>$str</td>";
            }
            else
              echo "<td>$item</td>";
          }
          echo "</tr>";
        }
        echo "</tr>";
        echo "</table></br>";
        break;
    }
  }
  if($_SESSION['error']){
    echo $_SESSION['error'];
    $_SESSION['error'] = "";
  }
?>  

</body>
</html>