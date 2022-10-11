<?php
$USERFILE = "users.txt";

$email = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['email']) || empty($_POST['pwd'])) {
        $errors[] = "<p>Hiányos adatok!</p>";
    } else {
        $email = $_POST['email'];
        $pwd = $_POST['pwd'];
        if (!file_exists($USERFILE)) {
            $errors[] = "<p>HTTP 500: Internal Server Error</p>";
        } else {
            $f = fopen($USERFILE, "r");
            while (!feof($f)) {
                $row = trim(fgets($f));
                if (!empty($row)) {
                    $row = explode(";", $row);
                    if ($row[0] == $email) {
                        $emailFound = true;
                        password_verify($pwd, $row[1]) ? $messages[] = "<p>Sikeres bejelentkezés!</p>" : $errors[] = "<p>Hibás jelszó!</p>";
                        break;
                    }
                }
            }
            fclose($f);
            if (!$emailFound) {
                $errors[] = "<p>Nincs ilyen felhasználó!</p>";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <div class="bg-primary text-white p-3 m-4 fs-4">
        <?php
        var_dump($_SERVER["REQUEST_METHOD"]);
        echo "<br>POST tömb: ";
        var_dump($_POST);
        echo "<br>GET tömb: ";
        var_dump($_GET);
        ?>
    </div>
    <div class="container">

        <h1>✋ Bejelentkezés</h1>
        <form action="" method="POST" class="m-10">
            <div class="mb-3">
                <label for="email" class="form-label">Email cím</label>
                <input value="<?php echo $email; ?>" type="email" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Jelszó</label>
                <input type="password" class="form-control" id="pwd" name="pwd">
            </div>
            <button type="submit" class="btn btn-primary">Elküld</button>
    </div>
    </form>
    <?php
    if (isset($errors)) {
        echo '<div class="bg-danger text-white p-3 m-4 fs-4">';
        foreach ($errors as $error) {
            echo "<p>" . $error . "</p>";
        }
        echo "</div>";
    }
    if (isset($messages)) {
        echo '<div class="bg-success text-white p-3 m-4 fs-4">';
        foreach ($messages as $message) {
            echo "<p>" . $message . "</p>";
        }
        echo "</div>";
    }
    ?>
    </div>








    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</body>

</html>