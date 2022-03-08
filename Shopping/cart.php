<?php
session_start();
$product_ids = array();
session_destroy();

//looking if the cart button is clicked
   if(filter_input(INPUT_POST, 'add_to_cart')){
    $arry =   $_SESSION['shopping_cart'];
    if(isset( $arry)){
      $arry =   $_SESSION['shopping_cart'];
      $count = count( $arry);
       //for summing up products
       //matching array keys to product id
       $product_ids = array_column( $arry, 'id');
        // pre_r($product_ids);

        if(!in_array(filter_input(INPUT_GET, 'id'), $product_ids)){
            $arry[$count] = array(
                'id' => filter_input(INPUT_GET, 'id'),
                'name' => filter_input(INPUT_POST, 'name'),
                'prices' => filter_input(INPUT_POST, 'prices'),
                'quantity' => filter_input(INPUT_POST, 'quantity')
            );
    
        }
        else{
            //match array key to the product id and increase quantity
            for ($i = 0; $i<count($product_ids); $i++){
                //just adding items quantity
                if($product_ids[$i] == filter_input(INPUT_GET, 'id')){
                    //ensure the array key is the same
                    $arry[$i]['quantity'] += filter_input(INPUT_POST, 'quantity');
                }
            }
        }
    }
    else{
        //create array using submitted form
        $arry[0] = array(
            'id' => filter_input(INPUT_GET, 'id'),
            'name' => filter_input(INPUT_POST, 'name'),
            'prices' => filter_input(INPUT_POST, 'prices'),
            'quantity' => filter_input(INPUT_POST, 'quantity')
        );
    }
}

if(filter_input(INPUT_GET, 'action') == 'delete'){
    foreach( $arry as $key => $product){
        if($product['id'] == filter_input(INPUT_GET, 'id')){
            //remove product from shopping cart
            unset( $arry[$key]);
        }
    }
    //reset session array keys
    $arry = array_value( $arry);
}
//pre_r($_SESSION);

function pre_r($array){
    echo '<pre>';
    print_r($array);
    echo '</pre>';

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   
    
    <link rel="stylesheet" href="style.css">
    <style>
      *{
          padding: 0;
          margin:0;
          box-sizing:border-box;
      }  
      .col-sm-4 .col-md-3{
          height:70px;
          background:blue;
          width:100px;
      }
    img{
    max-width: 100%;
    height: auto;
    background-color: #686de0;
    background: radial-gradient(white 30%,#686de0 70%);
     }
     .fa-star,
     .fa-star-half{
         color:yellowgreen;
     }
    
     .products{
      border: 1px solid grey;
      border-radius:5px;
      padding:16px;
      margin-bottom:10px;
      
     }
     .products:hover{
        box-shadow: 7px 9px 4px -2px rgba(0,0,0,0.64);
        -webkit-box-shadow: 7px 9px 4px -2px rgba(0,0,0,0.64);
        -moz-box-shadow: 7px 9px 4px -2px rgba(0,0,0,0.64);

     }
     .products{
         border:1px solid #f8c291;
         background-color: #f1f1f1;
         border-radius:5px;
         padding:16px;
         margin-bottom:20px;
         height:250px;
         width: 200px;
     }
     .table{
         margin:0px auto;
         float:none;
     }
     .row{
         margin:0px auto;
         float:none;
     }
     .centered{
        margin:0px auto;
         float:none;  
     }
     .button{
         background:#78e08f;
         color:white;
         text-align:center;
         padding:12px;
         text-decoration:none;
         display:block;
         border-radius:3px;
         font-size:15px;
         margin: 18px 0 15px 0;


     }
     .button:hover{
      background:#079992;
      text-decoration:none;
      color:color;
     }
     .button:active{
         text-decoration:none;
         color:white;
     }
     .button-danger{
         font-size:font-size:12px;
         padding:3px;
     }
     .button-danger:hover{
         text-decoration:none;
     }
     a{
        text-decoration:none;
     }
     a:hover{
        text-decoration:none;
     }
     h3{
         margin-top:;0px
     }
     .btn .btn-warning{
         position:absolute;
     }
     .pic{
         height:50px;
         width:200px;
     }

    </style>
</head>
<body>
<section class="navigation">
    <nav class="navbar navbar-expand-lg ">
        <div class="container">
          <a class="navbar-brand" href="#">Twoven</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i class="fa fa-bars" aria-hidden="true"></i></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav m-auto py-2 my-lg-4">
         
              <li class="nav-item">
              <a style=" text-decoration:none; margin-right:40px;" class="active" href="index.php"><i class="fa fa-fw fa-home"></i> Home</a>
              </li>
              <li class="nav-item">
              <a style="color:blue; margin-right:40px;"><i class="fa fa-cc-visa" style="font-size:30px;color:#1e90ff" aria-hidden="true"></i>Payment</a>
              </li>
              
              <li class="nav-item">
              <a style=" text-decoration:none; margin-right:40px;" href="register.php"><i class="fa fa-fw fa-user"></i> Account</a>
              </li>
              <li class="nav-item ">
              <a href="cart.php" style="color:blue; text-decoration:none; margin-right:40px;"><i class="fa fa-shopping-cart" style="font-size:30px;color:#1e90ff"></i>Cart</a>
              </li>
            </ul>
            <form class="d-flex mr-6">
              <input class="px-2 search" type="search" placeholder="Search" aria-label="Search">
              <button class="btn1 btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>
</section>
    <div class="container">
    <div class="row text-center ">
    
<?php
$conn = mysqli_connect('localhost','root','','shop');
$sql = "SELECT * FROM products ORDER BY id ASC";
$result = mysqli_query($conn,$sql);

if($result):
  if(mysqli_num_rows($result)>0):
    while($product =mysqli_fetch_assoc($result)):
    
    ?>
      <div class="col-sm-4 col-md-3 ">
       <form  method="POST" action="cart.php?action=add&id=<?php echo $product['id'];?>" >
         <div class="products bg-dark">
          <div class="pic"><img src="<?php echo $product['image'];?>" class="img-responsive "/></div>
           
           <h5 class="text-info "><?php echo $product['name']?></h5>
           <h5  ><?php echo $product['prices']?></h5>
           <input type="text" name="quantity" class="form-control" value="1"/>
           <input type="hidden" name="name"  value="<?php echo $product['name'];?>" />
           <input type="hidden" name="prices"  value="<?php echo $product['prices'];?>" />
           <h6>
                <i class=" fas fa-star"></i>
                <i class=" fas fa-star"></i>
                <i class=" fas fa-star"></i>
                <i class=" far fa-star"></i>
                 rate us
             </h6>
            <input type="submit" name="add_to_cart" class="btn btn-warning " value="add to cart"/>
         </div>   
    </form>
    </div>

        
               <?php
    endwhile;
 endif;
endif;
?>

<div style="clear:both"></div>
<br/>
<div class="table-responsive">
    <table class="table">
        <tr><th colspan="5"><h3>Order Details</h3></th></tr>
        <tr>
            <th width="40%">Product Name</th>
            <th width="10%">Quantity</th>
            <th width="20%">Prices</th>
            <th width="15%">Total</th>
            <th width="5%">Action</th>
        </tr>
        
        <?php
        
        if(!empty( $arry)):
            $total = 0;
            $pro = number_format($product['quantity'] * $product['prices']);

            foreach( $arry as $key => $product):

        ?>
        
        <tr>
            <td><?php echo $product['name'];?></td>
            <td><?php echo $product['quantity'];?></td>
            <td><?php echo $product['prices'];?></td>
            <td><?php echo number_format($pro, 2);?></td>
            <td>
                <a href="cart.php?action=delete&id=<?php echo $product['id'];?>">
                <div class="btn-danger">Remove</div>
                </a>
            </td>
        </tr>
        <?php
                      $total = $total + $pro;
            endforeach;
        ?>
        <tr>
            <td colspan="3" align="right">Total<td>
            <td align="right">ksh <?php echo number_format($total,2);?></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="5">
                <?php
                if (isset($_SESSION['shopping_cart'])):
                if (count($_SESSION['shopping_cart'])>0):
                ?>
        <a href="#" class="button">Checkout</a>
        <?php endif; endif;?>
        </td>
     </tr>
     <?php
     endif;
     ?>
     </table>
    
   </div>
 </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
   
    
</body>
</html>