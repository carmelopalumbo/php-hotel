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

    $filter_hotels = [];

    if($_GET['vote'] > 0 && !isset($_GET['parking'])){
        foreach($hotels as $hotel){
            if($hotel['vote'] === $_GET['vote'] && $hotel['parking'] == $_GET['parking']){
                $filter_hotels[] = $hotel;
            }
        }
    }
    var_dump($hotel);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css' integrity='sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA==' crossorigin='anonymous'/>

    <title>PHP Hotel</title>
</head>
<body>

<!-- form -->

<div class="container pt-5">
    <form action="./index.php" method="GET" class="d-flex w-100">
        <div class="form-check mx-4">
            <input class="form-check-input" type="radio" name="parking" id="withparking" value="true">
            <label class="form-check-label" for="withparking">
                CON PARCHEGGIO
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="parking" id="noparking" value="false">
            <label class="form-check-label" for="noparking">
                SENZA PARCHEGGIO
            </label>
        </div>

        <select class="form-select w-25 mx-3" aria-label="Default select example" name="vote">
            <option selected>VOTO</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>

        <button class="btn btn-info" type="submit">CERCA</button>
    </form>
</div>



<!-- tables -->

<?php if(empty($filter_hotels)) : ?>
<table class="table table-striped w-75 m-auto mt-5 text-center">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">Descrizione</th>
      <th scope="col">Parcheggio</th>
      <th scope="col">Voto</th>
      <th scope="col">Distanza dal centro in km</th>
    </tr>
  </thead>
  <tbody>
     <?php foreach($hotels as $hotel) : ?>
        <tr>
            <?php foreach($hotel as $key => $value) : ?>
                <?php if($key === 'parking' && $value) : ?>
                    <td>
                        <?php echo "SI" ?>
                    </td>
                <?php elseif($key === 'parking' && !$value) : ?>
                    <td>
                        <?php echo "NO" ?>
                    </td>
                <?php else : ?>
                    <td>
                        <?php echo $value ?>
                    </td>
                <?php endif ?>
            <?php endforeach ?>
         </tr>
    <?php endforeach ?>
  </tbody>
</table>
<?php endif; ?>
</body>
</html>