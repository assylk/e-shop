<?php
// initializ shopping cart class
include 'Cart.php';
$cart = new Cart;
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing your profile!";
  header("location: error.php");
}
else {
    // Makes it easier to read
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
    $address = $_SESSION['address'];
    $phone = $_SESSION['phone'];
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MultiShop - Online Shop Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

</head>

<body>
    <?php include 'navbar.php' ?>



    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Shopping Cart</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Image</th>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        <?php
        if($cart->total_items() > 0){
            //get cart items from session
            $cartItems = $cart->contents();
            foreach($cartItems as $item){
                
        ?>
                        <tr>
                            <td class="align-middle" style="object-fit: contain;">
                                <img style="width:2vw;height:2vw" src="<?php echo $item["image"]; ?>" alt=""
                                    style="width: 50px;">

                            </td>
                            <td class="align-middle" style="object-fit: contain;">

                                <?php echo $item["name"]; ?>
                            </td>
                            <td class="align-middle"><?php echo $item["price"]; ?> DT</td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">

                                    <input type="text"
                                        class="form-control form-control-sm bg-secondary border-0 text-center"
                                        value="<?php echo $item["qty"]; ?>"
                                        onchange="updateCartItem(this, '<?php echo $item['rowid']; ?>')">

                                </div>
                            </td>
                            <td class="align-middle"><?php echo $item["subtotal"]; ?> DT</td>
                            <td class="align-middle"><button class="btn btn-sm "><i></i><a
                                        style="background-color:#00323b;color:white"
                                        href="cartAction.php?action=removeCartItem&id=<?php echo $item["rowid"]; ?>"
                                        class="btn " onclick="return confirm('Are you sure?')"><i
                                            class="fa fa-times"></i></a></button></td>

                        </tr>
                        <?php } }else{ ?>
                        <tr>
                            <td colspan="5">
                                <p>Your cart is empty.....</p>
                            </td>
                            <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td><a href="index.php" class="btn" style="background-color:#009EE2;color:white"><i
                                        class="glyphicon glyphicon-menu-left"></i>
                                    Continue Shopping</a></td>
                            <td colspan="2"></td>

                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="col-lg-4">
                <form class="mb-30" action="">
                    <div class="input-group">
                        <input type="text" class="form-control border-0 p-4" placeholder="Coupon Code">
                        <div class="input-group-append">
                            <button class="btn" style="background-color:#009EE2;color:white">Apply Coupon</button>
                        </div>
                    </div>
                </form>
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart
                        Summary</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6><?php echo $cart->total().' DT'; ?></h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">7 DT</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <?php if($cart->total()!=0){?>
                            <h5> <?php echo $cart->total()+7 ?> DT</h5>
                            <?php }else{?>
                            <h5>0 DT</h5>
                            <?php }?>

                        </div>


                        <a href="flouci.php?amount=<?php echo $cart->total()+7?>"
                            style="text-decoration:none;color:black"><button
                                class="btn btn-block font-weight-bold my-3 py-3"
                                style="background-color:#009EE2;color:white">Proceed To
                                Checkout</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->


    <!-- Footer Start -->
    <?php include('footer.php'); ?>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn back-to-top" style="color:white;background-color:#009EE2"><i
            class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script>
    function updateCartItem(obj, id) {
        return id * 2;
    }
    </script>
</body>

</html>