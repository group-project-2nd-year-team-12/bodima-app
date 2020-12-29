 <?php   require_once ('../config/database.php');
        require_once ('../models/reg_user.php');
        session_start(); 
?>
<?php 
    if(isset($_GET['click']))
    {
        header('Location:../views/cart.php');
    }
?> 


<?php

// check and create cart 
if(isset($_POST['add']))
{
  $added='';
  $item='';
  $new='';
  $log='';
  $clash='';
  if(isset($_SESSION['email'])&& isset($_SESSION['first_name']) && isset($_SESSION['last_name']))
  {
 
  if(isset($_SESSION['cart']))
  {
    if($_SESSION['term']==$_POST['term']){
    $item_array_id=array_column($_SESSION['cart'],'product_id');
        if(!in_array($_POST['id'],$item_array_id))
        {
          $count=count($_SESSION['cart']);
          $item_array=array(
              'product_id'=>$_POST['id'],
              'item_name' =>$_POST['item_name'],
              'restaurant'=>$_POST['name'],
              'product_price'=>$_POST['price'],
              'item_quantity'=>$_POST['quantity'],
              'order_type'=>$_POST['order_type']
          );
          $_SESSION['cart'][$count]=$item_array;
              $item="Item added";
        }else{
          $added='Food item already added';
        }
      }else{
        $clash='clashed';
      }
  }else{
    $item_array=array(
      'product_id'=>$_POST['id'],
      'item_name' =>$_POST['item_name'],
      'product_price'=>$_POST['price'],
      'restaurant'=>$_POST['name'],
      'item_quantity'=>$_POST['quantity'],
      'order_type'=>$_POST['order_type']
  );
  $_SESSION['term']=$_POST['term'];
  $_SESSION['cart'][0]=$item_array;
  $item='item added';

  }
}else{
  session_destroy();
  $log="please loging first";
}
$count=count($_SESSION['cart']);
  $arr=array(
    'added'=>$added,
    'add'=>$item,
    'login'=>$log,
    'count'=>$count,
    'term'=>$_POST['term']
  );
  echo json_encode($arr);
}

// load cart count

if(isset($_POST['count']))
{
  $count=0;
  if(isset($_SESSION['cart']))
  {
    $count=count($_SESSION['cart']);
  }
  $arr=array(
    'count'=>$count
  );
  echo json_encode($arr);
}

// cart manage 
if(isset($_POST['manage']))
{
  $term='';
  if(isset($_SESSION['term']))
  {
    $term=$_SESSION['term'];
  }
  $arr=array(
    'term'=>$term
  );
  echo json_encode($arr);
}

//if click remove button clear the cart
if(isset($_POST['remove']))
{
    if($_GET['action']=='remove')
    {
        foreach($_SESSION['cart'] as $key=>$value)
        {
          if($value['product_id']==$_GET['id']){
            unset($_SESSION['cart'][$key]);
            echo '<script>alert("Product has been  Removed")</script>';
            echo '<script>window.location="../views/cartItem.php"</script>';
          }
        }
    }
}


//long term
if(isset($_POST['startDate']))
{
  $_SESSION['startDate']=$_POST['startDate'];
  $_SESSION['endDate']=$_POST['endDate'];
  $arr=array(
    'set'=>'doen',
  );
  echo json_encode($arr);
}


?>
 
