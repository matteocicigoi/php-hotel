<?php

$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];

// valori dal get
$parking = $_GET['parking'] ?? false;
$vote = $_GET['vote'] ?? false;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Hotel</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Fine Bootstrap -->
</head>

<body>
    <main class="w-75 m-auto">
        <h1 class="text-center my-3">PHP Hotel</h1>
        <form action="index.php" method="GET" class="mt-5 mb-2 row align-items-center justify-content-end">
            <div class="col-auto">
                <label class="visually-hidden" for="autoSizingSelect">Preference</label>
                <select class="form-select" id="autoSizingSelect" name="vote">
                    <option selected>Voto</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <div class="col-auto">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="autoSizingCheck" name="parking">
                    <label class="form-check-label" for="autoSizingCheck">
                        Parcheggio
                    </label>
                </div>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary">Cerca</button>
            </div>
        </form>
        <!-- Table -->
        <table class="table table-striped m-auto border">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrizione</th>
                    <th>Parcheggio</th>
                    <th>Voto</th>
                    <th>Distanza dal centro</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // recupera tutti gli hotel
                foreach ($hotels as $hotel) {
                    $element = '<tr>';
                    $save = true;
                    // recupera le informazini
                    foreach ($hotel as $key => $info) {
                        // filtro sul parking
                        if($parking === 'on' && $key === 'parking'){
                            if($info === false)$save = false;
                        }
                        // filtro sul voto
                        if(is_numeric($vote) && $vote <= 5  && $key === 'vote'){
                            if($info != $vote)$save = false;
                        }
                        if ($info === true) $info = 'true';
                        if ($info === false) $info = 'false';
                        $element .= "<td>$info</td>";
                    }
                    $element .= '</tr>';
                    // se la variabile è diversa da true non mostra i valori
                    if($save === true)echo $element;
                }
                ?>
            </tbody>
        </table>
        <!-- Fine Table -->
    </main>
</body>

</html>