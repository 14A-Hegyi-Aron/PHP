<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Orvosi Nobel-díjasok</title>
</head>

<body>
    
    <div class="container">
        <?php include('menu.php'); ?>
        <div class="row">
            <div class="col bg-secondary text-white p-3">
                <div class="content">
                    <?php
                    if (!empty($_GET['page'])) {
                        switch ($_GET['page']) {
                            case 'countriesList':
                                include('countries.php');
                                break;
                            case 'searchList':
                                include('search.php');
                                break;
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>