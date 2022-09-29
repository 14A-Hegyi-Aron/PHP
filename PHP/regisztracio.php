<?php

$GRADUATIONS = array('Óvoda', 'Általános iskola', 'Középiskola', 'Főiskola', 'Egyetem');
$USERFILE = 'users.txt';

$email = "";
$graduation = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];

    if (empty($email)) {
        $errors[] = "Az email cím megadása kötelező!";
    }

    $pwd = $_POST["pwd"];
    $comment = isset($_POST["comment"]) ? $_POST["comment"] : "";
    $graduation = $_POST["graduation"];

    $conditions = isset($_POST["conditions"]) ? true : false;
    if ($conditions == false) {
        $errors[] = "Nem fogadta el a felhasználási feltételeket!";
    }
    if (!isset($errors)) {
        if (!file_exists($USERFILE)) {
            $errors[] = "<p>HTTP 500: Internal Server Error</p>";
        } else {
            $f = fopen($USERFILE, "a");
            $hash = password_hash($pwd, PASSWORD_DEFAULT);
            $comment = str_replace(";", ",", $comment);
            $row = "$email;$hash;$comment;$graduation";
            fwrite($f, $row . PHP_EOL);
            fclose($f);
            $messages[] = "Sikeres regisztráció!";
            if (isset($messages)) {
                echo '<div class="bg-success text-white p-3 m-4 fs-4">';
                foreach ($messages as $message) {
                    echo "<p>$message</p>";
                }
                echo '</div>';
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
    <title>👋 Regisztráció</title>
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

        <h1>👋 Regisztráció</h1>
        <form action="" method="POST" class="m-10">
            <div class="mb-3">
                <label for="email" class="form-label">Email cím</label>
                <input value="<?php echo $email; ?>" type="email" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Jelszó</label>
                <input type="password" class="form-control" id="pwd" name="pwd">
            </div>
            <div class="mb-3">
                <label for="exampleInputComment" class="form-label">Megjegyzés</label>
                <input type="text" class="form-control" id="comment" name="comment">
            </div>
            <div class="mb-3">
                <label for="graduation" class="form-label">Végzettség</label>
                <select class="form-select" name="graduation" id="graduation">
                    <?php
                    foreach ($GRADUATIONS as $key => $value) {
                        echo "<option value='$key' ";
                        if ($key == $graduation) {
                            echo "selected";
                        }
                        echo ">$value</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="conditions" name="conditions">
                <label class="form-check-label" for="conditions">A regisztráciiós feltételeket elfogadom.</label>
            </div>
            <button type="submit" class="btn btn-primary">Elküld</button>
        </form>
        <?php
        if (isset($errors)) {
            echo '<div class="bg-danger text-white p-3 m-4 fs-4">';
            foreach ($errors as $error) {
                echo "<p>" . $error . "</p>";
            }
            echo "</div>";
        }
        ?>
    </div>








    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</body>

</html>