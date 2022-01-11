<?php
require_once "errors.php";
require_once "SQL_queries/sales_query.php";
$today=date('Y-m-d');
GLOBAL $connection;
GLOBAL $today,$totalPriceSales;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" type="text/css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    <title>ePortal</title>
</head>
<body>

<!--heading-->
<?php require_once "header.php"; ?>
<!--heading-->

<div class="container-fluid p-0">
    <!--nav-->
    <?php require_once "navbarFunctions/navbar_sales.php";?>
    <!--nav-->

    <!--sales-->
    <div class="row mx-3 justify-content-evenly">

        <!-- heading sales-->
        <h1 class="my-3" style="text-align: center; text-transform: uppercase; font-family: 'Abyssinica SIL'; font-size: 25px;">
            sales
        </h1>
        <!-- heading sales-->

        <!--detailed heading-->
        <div class="col-lg-8 mb-1 py-2 px-0 text-secondary fs-5">
            <p>Entries for Specific Date</p>
        </div>
        <!--detailed heading-->

        <!--date-->
        <div class="col-lg-8 border border-secondary bg-light mb-5 py-2">
            <form action="salesEntries.php" method="post">
                <div class="mb-3">
                    <label for="date" class="form-label text-secondary fs-5">Date</label>
                    <input name="salesEntriesDate" type="date" class="form-control" id="date" required>
                </div>
                <div class="mb-3">
                    <input type="submit" class="form-control btn btn-primary" value="Submit" name="salesEntriesSubmit">
                </div>
            </form>
            <?php require_once "shortcuts/salesEntriesDateShortcut.php";?>
        </div>

        <!--date-->

        <!--detailed heading-->
        <div class="col-lg-8 mb-1 py-2 px-0 text-secondary fs-5">
            <p>Today's Entries</p>
        </div>
        <!--detailed heading-->

        <!--form-->
        <div class="col-lg-8 mb-5 border border-secondary bg-light ">
            <ul class="nav nav-tabs my-3">
                <li class="nav-item">
                    <button class="nav-link active" aria-current="page">SALES</button>
                </li>
            </ul>
            <form action="sales.php" method="post">

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input name="titleSales" type="text" class="form-control" id="title" placeholder="Title" required>
                </div>

                <div class="mb-3">
                    <label for="typeofcake" class="form-label">Type of Cake</label>
                    <div class="form-check">
                        <input name="type_of_cake" value="Shop Cake" class="form-check-input" type="radio" id="typeofcake" required>
                        <label class="form-check-label mt-1" for="typeofcake" >
                            Shop Cake
                        </label>
                        <br>
                        <input name="type_of_cake" value="Customer Cake" class="form-check-input" type="radio" id="typeofcake" required>
                        <label class="form-check-label mt-1" for="typeofcake">
                            Customer Order Cake
                        </label>
                    </div>
                </div>
                
                 <div class="mb-3">
                    <label for="flavour" class="form-label">Flavour</label>
                    <div class="form-check">

                        <input class="form-check-input " type="checkbox" value="Pineapple" id="pineapple" name="flavourSales[]">
                        <label class="form-check-label my-1" for="pineapple">
                            Pineapple
                        </label>
                     <br>

                      <input class="form-check-input" type="checkbox" value="Chocolate" id="chocolate" name="flavourSales[]">
                      <label class="form-check-label my-1" for="chocolate">
                          Chocolate
                      </label> <br>

                      <input class="form-check-input" type="checkbox" value="Redvelvet" id="redvelvet" name="flavourSales[]">
                      <label class="form-check-label my-1" for="redvelvet">
                          Red Velvet
                      </label> <br>

                       <input class="form-check-input" type="checkbox" value="Butterscotch" id="butterscotch" name="flavourSales[]">
                        <label class="form-check-label my-1" for="butterscotch">
                           Butterscotch
                        </label> <br>

                        <input class="form-check-input" type="checkbox" value="Blueberry" id="blueberry" name="flavourSales[]">
                        <label class="form-check-label my-1" for="blueberry">
                            Blueberry
                        </label> <br>

                        <input class="form-check-input" type="checkbox" value="Other" id="other" name="flavourSales[]">
                        <label class="form-check-label my-1" for="other">
                            Other
                        </label> <br>
                  </div>
                </div>


                <div class="mb-3">
                    <label for="file" class="form-label">File</label>
                    <div class="input-group mb-3">
                        <input name="imageSales" type="file" class="form-control" id="file">
                        <label class="input-group-text" for="file">Upload</label>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input name="priceSales" type="number" class="form-control" id="price" placeholder="Price of the cake" min="0" max="10000" required>
                </div>

                <div class="mb-3">
                    <label for="amount_by_customer" class="form-label">Amount Paid </label>
                    <input name="amountSales" type="number"  class="form-control" id="amount_by_customer" placeholder="Amount Paid by Customer" required>
                </div>

                <!--<div class="mb-3">
                    <label for="left" class="form-label">Amount Left</label>
                    <input name="amount_leftSales" type="number" class="form-control" id="left" placeholder="Amount Left by Customer" required>
                </div>-->

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="descriptionSales" class="form-control" id="description" rows="4"></textarea>
                </div>

                <div class="mb-3">
                    <input name="submitSales" type="submit" class="form-control btn btn-primary" value="Submit">
                </div>
            </form>


            <h3 class="display-6 fs-5 text-uppercase text-center">Entries</h3>

                <!-- Accordion it will keep increasing with every form entry-->
                <div class="accordion  accordion-flush " id="accordionFlushExample">
                    <?php
                    require_once "SQL_queries/db_connection.php";
                    $query="SELECT * FROM sales WHERE date='$today'";

                    $result=mysqli_query($connection,$query);
                    if(!$result){
                        die("no".mysqli_error($connection));
                    }
                    while ($row=mysqli_fetch_assoc($result)){
                    $id=$row['id'];
                    $date=$row['date'];
                    $date=strtotime($date);
                    $date=date('d-M-Y');
                    $title=$row['title'];
                    $type_of_cake=$row['type_of_cake'];
                    $flavour=$row['flavour'];
                    $image=$row['image'];
                    $price=$row['price'];
                    $amount_paid=$row['amount_paid'];
                    $amount_left=$row['amount_left'];
                    $description=$row['description'];
                    $totalPriceSales+=$amount_paid;
                    $rupees="Rs";


                    if(empty($description)){
                        $description="-";
                    }
                    ?>

                    <div class="accordion-item  border border-secondary my-2 ">
                        <h2 class="accordion-header " id="flush-headingOne<?php echo $id; ?>">
                            <button class="accordion-button collapsed text-uppercase" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $id; ?>" aria-expanded="false" aria-controls="flush-collapseOne">
                                <?php echo $title; ?>
                            </button>
                        </h2>
                        <div id="collapse<?php echo $id ?>" class="accordion-collapse collapse" aria-labelledby="flush-headingOne<?php echo $id; ?>" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-6">
                                        <ul>
                                            <li class="fs-6 my-2 ">DATE</li>
                                            <li class="fs-6 my-2 ">TYPE OF CAKE</li>
                                            <li class="fs-6 my-2 ">FLAVOUR</li>
                                            <li class="fs-6 my-2 ">TOTAL PRICE</li>
                                            <li class="fs-6 my-2 ">AMOUNT PAID</li>
                                            <li class="fs-6 my-2 ">AMOUNT LEFT</li>
                                            <li class="fs-6 my-2 ">DESCRIPTION</li>
                                        </ul>
                                    </div>
                                    <div class="col-6">
                                        <ul>
                                            <?php  echo "<li class='fs-6 my-2'>{$date}</li>" ?>
                                            <?php  echo "<li class='fs-6 my-2'>{$type_of_cake}</li>" ?>
                                            <?php  echo "<li class='fs-6 my-2'>{$flavour}</li>" ?>
                                            <?php  echo "<li class='fs-6 my-2'>{$price} {$rupees}</li>"?>
                                            <?php  echo "<li class='fs-6 my-2'>{$amount_paid} {$rupees}</li>"?>
                                            <?php  echo "<li class='fs-6 my-2'>{$amount_left} {$rupees}</li>" ?>
                                            <?php  echo "<li class='fs-6 my-2'>{$description}</li>" ?>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php  } ?>
                </div>

            <!--Accordion-->



            <!--for count the total entries-->
            <?php
            $count=mysqli_num_rows($result);
            ?>
            <!--for count the total entries-->

            <!--total sales-->
            <div class="col-lg-8 display-6 fs-6 p-3 text-uppercase bg-light ">
                <p>Total Sale = <?php echo $count;?></p>
                <p>Total price = <?php echo $totalPriceSales;
                if($totalPriceSales!=0){
                    echo "<span style='text-transform: none;'> Rs</span>";
                }else{
                    echo 0;
                }
                ?>
                </p>
            </div>
            <!--total sales-->
        </div>
        <!--form-->


      </div>
    <!--sales-->
</div>

<!--footer-->
<?php require_once "footer.php"?>
<!--footer-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
