<?php
session_start();
include("authen.php");
include("config.inc.php");
include("secure.php");

$user = isset($_SESSION['uid']) ? $_SESSION['uid'] : '';
$myPass = isset($_SESSION['password']) ? $_SESSION['password'] : '';
$myRole = isset($_SESSION['role']) ? $_SESSION['role'] : '';
$msg = "";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Inventory</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Duplex Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- bootstarp-css -->
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <!--// bootstarp-css -->
        <!-- css -->
        <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
        <!--// css -->
        <script src="js/jquery.min.js"></script>
        <!--fonts-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
        <!--/fonts-->
        <!-- dropdown -->
        <script src="js/jquery.easydropdown.js"></script>
        <link href="css/nav.css" rel="stylesheet" type="text/css" media="all"/>
        <script src="js/scripts.js" type="text/javascript"></script>
        <!--js-->
        <!--/js-->
        <script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#horizontalTab').easyResponsiveTabs({
                    type: 'default', //Types: default, vertical, accordion           
                    width: 'auto', //auto or any width like 600px
                    fit: true   // 100% fit in a container
                });
            });
        </script>	
        <!-- start-smoth-scrolling -->
        <script type="text/javascript" src="js/move-top.js"></script>
        <script type="text/javascript" src="js/easing.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                $(".scroll").click(function (event) {
                    event.preventDefault();
                    $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
                });
            });
        </script>
        <!-- slider -->
        <script src="js/responsiveslides.min.js"></script>
        <script>
            // You can also use "$(window).load(function() {"
            $(function () {
                $("#slider").responsiveSlides({
                    auto: true,
                    manualControls: '#slider3-pager',
                });
            });
        </script>
        <!-- slider -->
        <script type="text/javascript">
            function Comma(Num) { //function to add commas to textboxes
                Num += '';
                Num = Num.replace(',', '');
                Num = Num.replace(',', '');
                Num = Num.replace(',', '');
                Num = Num.replace(',', '');
                Num = Num.replace(',', '');
                Num = Num.replace(',', '');
                x = Num.split('.');
                x1 = x[0];
                x2 = x.length > 1 ? '.' + x[1] : '';
                var rgx = /(\d+)(\d{3})/;
                while (rgx.test(x1))
                    x1 = x1.replace(rgx, '$1' + ',' + '$2');
                return x1 + x2;
            }
        </script>
        <!-- DataTables CSS -->
        <link href="vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
        <script src="js/jquery-1.10.2.min.js"></script>
        <script>
            $(window).load(function () {
                $(".se-pre-con").fadeOut("slow");
                $("#asat").datepicker({
                    dateFormat: 'yy-mm-dd',
                    changeMonth: true,
                    changeYear: true,
                });
                $("#expdate").datepicker({
                    dateFormat: 'yy-mm-dd',
                    changeMonth: true,
                    changeYear: true,
                });

            });
        </script>
        <style type="text/css">
            select{
                border: 1px solid #136ad5;
                outline-color:#136ad5;
                width: 96%;
                font-size:0.8125em;
                padding: 0.7em;
            }
            table {
                border: 1px solid #ccc;
                border-collapse: collapse;
                margin: 0;
                padding: 0;
                width: 100%;
                table-layout: fixed;
            }
            table caption {
                font-size: 1.5em;
                margin: .5em 0 .75em;
            }
            table tr {
                background: #f8f8f8;
                border: 1px solid #ddd;
                padding: .35em;
            }
            table th,
            table td {
                padding: .625em;
                text-align: center;
            }
            table th {
                font-size: .85em;
                letter-spacing: .1em;
                text-transform: uppercase;
            }
            @media screen and (max-width: 600px) {
                table {
                    border: 0;
                }
                table caption {
                    font-size: 1.3em;
                }
                table thead {
                    border: none;
                    clip: rect(0 0 0 0);
                    height: 1px;
                    margin: -1px;
                    overflow: hidden;
                    padding: 0;
                    position: absolute;
                    width: 1px;
                }
                table tr {
                    border-bottom: 3px solid #ddd;
                    display: block;
                    margin-bottom: .625em;
                }
                table td {
                    border-bottom: 1px solid #ddd;
                    display: block;
                    font-size: .8em;
                    text-align: right;
                }
                table td:before {
                    /*
                    * aria-label has no advantage, it won't be read inside a table
                    content: attr(aria-label);
                    */
                    content: attr(data-label);
                    float: left;
                    font-weight: bold;
                    text-transform: uppercase;
                }
                table td:last-child {
                    border-bottom: 0;
                }
            }
        </style>
        <link href="style/style.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
        <script>
            $(document).ready(function () {
                $(".form-item").submit(function (e) {
                    var form_data = $(this).serialize();
                    var button_content = $(this).find('button[type=submit]');
                    button_content.html('Adding...'); //Loading button text 

                    $.ajax({//make ajax request to cart_process.php
                        url: "cart_process.php",
                        type: "POST",
                        dataType: "json", //expect json value from server
                        data: form_data
                    }).done(function (data) { //on Ajax success
                        $("#cart-info").html(data.items); //total items in cart-info element
                        button_content.html('Add to Cart'); //reset button text to original text
                        alert("Item added to Cart!"); //alert user
                        if ($(".shopping-cart-box").css("display") == "block") { //if cart box is still visible
                            $(".cart-box").trigger("click"); //trigger click to update the cart box.
                        }
                    })
                    e.preventDefault();
                });

                //Show Items in Cart
                $(".cart-box").click(function (e) { //when user clicks on cart box
                    e.preventDefault();
                    $(".shopping-cart-box").fadeIn(); //display cart box
                    $("#shopping-cart-results").html('<img src="images/ajax-loader.gif">'); //show loading image
                    $("#shopping-cart-results").load("cart_process.php", {"load_cart": "1"}); //Make ajax request using jQuery Load() & update results
                });

                //Close Cart
                $(".close-shopping-cart-box").click(function (e) { //user click on cart box close link
                    e.preventDefault();
                    $(".shopping-cart-box").fadeOut(); //close cart-box
                });

                //Remove items from cart
                $("#shopping-cart-results").on('click', 'a.remove-item', function (e) {
                    e.preventDefault();
                    var pcode = $(this).attr("data-code"); //get product code
                    $(this).parent().fadeOut(); //remove item element from box
                    $.getJSON("cart_process.php", {"remove_code": pcode}, function (data) { //get Item count from Server
                        $("#cart-info").html(data.items); //update Item count in cart-info
                        $(".cart-box").trigger("click"); //trigger click on cart-box to update the items list
                    });
                });

            });
        </script>
        <script type="text/javascript">
            $(document).ready(function () {
                var $rows = $('#existing tbody tr:not(:first)');
                $('#search').keyup(function () {
                    var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

                    $rows.hide().filter(function () {
                        var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();

                        return text.indexOf(val) != -1;
                    }).show();
                });
            });
        </script>
    </head>
    <body>
        <?php include("header.php"); ?>
        <!-- //header -->	
        <!-- bg-banner -->
        <div class="container">
            <div class="bg-banner">
                <div class="banner-bottom-bg">
                    <div class="banner-bg"> 

                        <!-- banner -->
                        <div class="banner">
                            <div class="banner-grids">
                                <?php include("nav.php"); ?>

                                <div class="ban-top">

                                    <div class="col-md-12 bann-right">
                                        <h2><a href="">SALES PAGE</a></h2>	

                                    </div>
                                    <div class="clearfix"> </div>

                                </div>

                                <div class="banner-middle">
                                    <div class="strip"> </div>

                                    <!-- banner-bottom-grids -->
                                    <div class="banner-bottom-grids">
                                        <!-- banner-bottom-left -->
                                        <div class="banner-bottom-left">

                                            <div class="banner-bottom-left-grids">
                                                <div class="col-md-12 banner-left-grid fullwidth-left-grid login-right wow fadeInLeft" data-wow-delay="0.4s">
                                                    <a href="#" class="cart-box" id="cart-info" title="View Cart">
                                                        <?php
                                                        if (isset($_SESSION["products"])) {
                                                            echo count($_SESSION["products"]);
                                                        } else {
                                                            echo 0;
                                                        }
                                                        ?>
                                                    </a>

                                                    <div class="shopping-cart-box">
                                                        <a href="#" class="close-shopping-cart-box" >Close</a>
                                                        <h3>Your Shopping Cart</h3><div style="clear: both"></div>
                                                        <div id="shopping-cart-results">
                                                        </div>
                                                    </div>

                                                    <?php
                                                    //List products from database
                                                    $results = $mysqli_conn->query("select * from productcat where catid!='PA1'");
                                                    if (!$results) {
                                                        printf("Error: %s\n", $mysqli_conn->error);
                                                        exit;
                                                    }

                                                    //Display fetched records as you please
                                                    $products_list = '<table id="existing">
					  <thead>
					  <tr>
						  <th scope="col" colspan="2"></th>
						  <th scope="col">&nbsp;</th>
						  <th scope="col">&nbsp;</th>
						  <th scope="col">&nbsp;</th>
						</tr>
						<tr>
						  <th scope="col">Name</th>
						  <th scope="col">Price</th>
						  <th scope="col">Qty</th>
						  <th scope="col">Current Stock</th>
						  <th scope="col">[Action]</th>
						</tr>
					  </thead>
					  <tbody>
					  <tr>
    				<td colspan="5"><input name="search" id="search" type="text" size="40" placeholder="Search a product..."></td>
 					 </tr>';
                                                    while ($row = $results->fetch_assoc()) {
                                                        $gpc = $mysqli_conn->query("select * from products where prodid='$row[prodid]'");
                                                        $rs = $gpc->fetch_assoc();
                                                        $products_list .= <<<EOT

<form class="form-item">

<tr>
<td> {$row["category"]}</td>
<td>{$currency}{$row["sellprice"]}</td>

   <td> <input onblur="checkQty(this.value, '{$row["instock"]}')" name="product_qty" type="text" id="product_qty" size="10" value="1" required></td>
    <td><input name="totqty" type="text" id="totqty" size="10" value="{$row["instock"]}" readonly>
	<input name="catid" type="hidden" value="{$row["catid"]}"></td>
    <td><button type="submit" class="mybut">Add to Cart</button></td>
</tr>

</form>

EOT;
                                                    }
                                                    $products_list .= '</tbody></table>';

                                                    echo $products_list;
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="clearfix"> </div>
                                        </div>
                                        <!-- post -->

                                        <!-- //post -->
                                    </div>
                                    <!-- //banner-bottom-left -->

                                </div>
                                <!-- //banner-bottom-grids -->
                            </div>
                        </div>
                    </div>
                    <!-- //banner -->
                </div>
            </div>
        </div>
        <div class="up-arrow">
            <div class="up-arrow-left">
                <ul>
                    <li><a href="#">&nbsp;</a></li> //

                </ul>
            </div>
            <div class="up-arrow-right">
                <a class="scroll" href="#home">Back to Top</a>
            </div>
            <div class="clearfix"> </div>
        </div>	
        <!-- //bg-banner -->

        <?php include("footer.php") ?>
    </div>
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="vendor/datatables-responsive/dataTables.responsive.js"></script>

    <script>
            function checkQty(qty_val, totqty_val) {
                var qty = parseInt(qty_val);
                var totqty = parseInt(totqty_val);

                if (qty > totqty) {
                    alert('Notice: quantity is larger than available quantity in stock');
                }
            }
    </script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
        $(document).ready(function () {

            $('#dataTables-example').DataTable({
                responsive: true
            });
        });
    </script>
    <link rel="stylesheet" type="text/css" href="jquery-ui-1.12.0/jquery-ui.min.css">
    <script type="text/javascript" src="js/jquery-ui.js"></script>
</body>
</html>