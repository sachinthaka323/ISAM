<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ISAMS</title>
    <style>
        .card {
            background-color: #fff;
            font-weight: bold;
            border-radius: 10px;
            border: none;
            position: relative;
            margin-bottom: 30px;
            box-shadow: 0 0.46875rem 2.1875rem rgba(90, 97, 105, 0.1), 0 0.9375rem 1.40625rem rgba(90, 97, 105, 0.1), 0 0.25rem 0.53125rem rgba(90, 97, 105, 0.12), 0 0.125rem 0.1875rem rgba(90, 97, 105, 0.1);
        }


        .l-bg-blue-dark {
            background: linear-gradient(to right, #8C008C, #66184A) !important;
            color: #fff;
        }


        .card .card-statistic-3 .card-icon-large .fas,
        .card .card-statistic-3 .card-icon-large .far,
        .card .card-statistic-3 .card-icon-large .fab,
        .card .card-statistic-3 .card-icon-large .fal {
            font-size: 110px;
        }

        .card .card-statistic-3 .card-icon {
            text-align: center;
            line-height: 50px;
            margin-left: 15px;
            color: #000;
            position: absolute;
            right: -5px;
            top: 20px;
            opacity: 0.1;
        }

        .card-text{
            color: #fff;
        }
    </style>
</head>

<body>

    <?php
    require_once '../include/headerpage.php';


    $sql = "select * from voting_create;";

    $result = $conn->query($sql);


    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

    ?>


            <div class="card text-body bg-info mb-3 card mx-3 my-3" style="width:18rem; display:inline-block">

                <div class="card l-bg-blue-dark">
                    <div class="card-statistic-3 p-4">
                        <div class="card-icon card-icon-large"><i class="fas fa-users"></i></div>
                        <div class="mb-4">
                            <div class="card-header"><?php echo $row['name']; ?></div>
                            <p class="card-text"><?php echo "Date:".$row['date']; ?></p>
                            <p class="card-text"><?php echo "Start Time:".$row['stime']; ?></p>
                            <p class="card-text"><?php echo "End Time:".$row['etime']; ?></p>

                            <a href="view.php?id=<?= $row['id'] ?>" class="btn btn-primary">view</a>
                        </div>
                    </div>
                </div>
            </div>


    <?php
        }
    }

    require_once '../include/footer.php';
    ?>


</body>

</html>