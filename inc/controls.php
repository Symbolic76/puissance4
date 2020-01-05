<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Puissance 4</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>
    <nav class="navbar navbar-light bg-light">
    <span class="navbar-text">
        Puissance 4 - Le jeu 
    </span>
    </nav>

    <form method="POST" action="./index.php">
    <div class="container">
        <input class="form-control" type="number" name="colNum" min="0" max="6" value="0"/>

        <input class="btn-success" type="submit" name="submit" value="Jouer" />
        <input class="btn-danger" type="submit" name="reset" value="Reset" />
    </div>


    </form>
