<?php
$link = mysqli_connect("localhost", "root", "", "test_db");
if (mysqli_connect_errno())
    exit("خطایی با شرح زیر رخ داده است:" . mysqli_connect_error());

$query = "SELECT * FROM image";
$result = mysqli_query($link, $query);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>dynamic carousel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6 ">


                <!-- paste here -->

                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                    <div class="carousel-indicators">
                        <?php
                        $c = 0;
                        while ($row = mysqli_fetch_array($result)) {

                            $c++;

                        ?>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?php echo ($row['code']) ?>" <?php
                                                                                                                                                if ($row['code'] == 0)
                                                                                                                                                    echo ('class="active" aria-current="true"')
                                                                                                                                                ?> aria-label="Slide <?php echo ($c) ?>"></button>
                        <?php
                        }
                        mysqli_close($link);
                        ?>
                    </div>
                    <div class="carousel-inner">

                        <?php
                        $link = mysqli_connect("localhost", "root", "", "test_db");
                        if (mysqli_connect_errno())
                            exit("خطایی با شرح زیر رخ داده است:" . mysqli_connect_error());

                        $query = "SELECT * FROM image";
                        $result = mysqli_query($link, $query);
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <div class="carousel-item <?php if ($row['code'] == 0) echo ("active") ?>">
                                <img src="images/<?php echo ($row['image']) ?>" class="d-block w-100" alt="...">
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>