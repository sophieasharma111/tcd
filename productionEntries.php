<?php
require_once "errors.php";
require_once "SQL_queries/production_query.php";
require_once "shortcuts/productionEntriesDateShortcut.php";
GLOBAL $connection;
GLOBAL $productionEntriesDate;
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
<?php
require_once "header.php";
?>
<!--heading-->

<div class="container-fluid p-0">

    <!--nav-->
    <?php require_once "navbarFunctions/navbar_productionEntries.php"?>
    <!--nav-->

    <!--heading-->
    <a href="production.php" style="text-decoration: none; color:#131313">
        <h1 class="my-3" style="text-align: center; text-transform: uppercase; font-family: 'Abyssinica SIL'; font-size: 25px;">
            production
        </h1>
    </a>
    <!--heading-->


    <!--sales-->
    <div class="row  my-3 mx-3 justify-content-evenly">

        <div class="col-lg-8 text-center pt-3 bg-light  border border-secondary border-bottom-0">
            <h3 class="display-6 fs-5 text-uppercase">Entries</h3>
        </div>

        <!--Accordion it will keep increasing with every form entry-->
        <div class="col-lg-8 py-3 bg-light  border border-secondary border-top-0 " id="accordionFlushExample">
            <?php
            require_once "SQL_queries/db_connection.php";
            $query="SELECT * FROM production WHERE date='$productionEntriesDate'";
            $result=mysqli_query($connection,$query);
            while ($row = mysqli_fetch_assoc($result)){
                $id=$row['id'];
                $date=$row['date'];
                $date=strtotime($date);
                $date=date('d-M-Y',$date);
                $title=$row['title'];
                $type_of_cake=$row['type_of_cake'];
                $items=$row['items'];
                $flavours=$row['flavours'];
                $description=$row['description'];
                if(empty($description)){
                    $description="-";
                }
                ?>
                <div class="accordion-item border border-secondary my-2">
                    <h2 class="accordion-header" id="flush-heading">
                        <button class="accordion-button collapsed text-uppercase" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne<?php echo $id; ?>" aria-expanded="false" aria-controls="flush-collapseOne<?php echo $id; ?>">
                            <?php echo $title;?>
                        </button>
                    </h2>
                    <div id="flush-collapseOne<?php echo $id; ?>" class="accordion-collapse collapse" aria-labelledby="flush-heading" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col-6">
                                    <ul>
                                        <li class="fs-6 my-2 ">DATE</li>
                                        <li class="fs-6 my-2 ">TYPE OF CAKE</li>
                                        <li class="fs-6 my-2 ">ITEMS</li>
                                        <li class="fs-6 my-2 ">FLAVOURS</li>
                                        <li class="fs-6 my-2 ">DESCRIPTION</li>
                                    </ul>
                                </div>
                                <div class="col-6">
                                    <ul>
                                        <?php  echo "<li class='fs-6 my-2'>{$date}</li>" ?>
                                        <?php  echo "<li class='fs-6 my-2'>{$type_of_cake}</li>" ?>
                                        <?php  echo "<li class='fs-6 my-2'>{$items}</li>" ?>
                                        <?php  echo "<li class='fs-6 my-2'>{$flavours}</li>" ?>
                                        <?php  echo "<li class='fs-6 my-2'>{$description}</li>" ?>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <!--for count the total entries-->
            <?php
            $count=mysqli_num_rows($result);
            ?>
            <!--for count the total entries-->

            <!--total sales-->
            <div class="col-lg-8 display-6 fs-6 p-3 text-uppercase bg-light ">
                Total Production = <?php echo $count;?>
            </div>
            <!--total sales-->
        </div>

        <!--Accordion-->
    </div>
    <!--sales-->
</div>

<!--footer-->
<?php require_once "footer.php"?>
<!--footer-->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
