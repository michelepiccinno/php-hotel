<!DOCTYPE html>
<html lang="it">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" defer></script>
  <title>PHP-HOTEL</title>
</head>

<body>
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

  ?>

  <div class="container mt-5">

    <form method="GET" class="mb-3">
      <select name="Parcheggio" class="me-2">
        <option value='NULL'>Parcheggio</option>
        <option value="1">Si</option>
        <option value="0">No</option>
      </select>

      <select name="Valutazione" class="me-2">
        <option value="0">Valutazione</option>
        <option value="0">0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
      </select>

      <button type="submit" class="btn-secondary rounded">Filtra</button>
    </form>

    <table class="table">
      <thead>
        <tr>
          <th class="border-dark table-primary">Nome</th>
          <th class="border-dark table-primary">Descrizione</th>
          <th class="border-dark table-primary">Parcheggio</th>
          <th class="border-dark table-primary">Voto</th>
          <th class="border-dark table-primary">Distanza dal centro</th>
        </tr>
      </thead>
      <tbody>

        <?php

        $parkingValue = $_GET["Parcheggio"] ?? 'NULL';
        $ratingValue = $_GET["Valutazione"] ?? 0;
        foreach ($hotels as $hotel) {
          if ((
              ($parkingValue === 'NULL') ||
              (intval($parkingValue) ===  intval($hotel["parking"])
              )
            ) &&
            (
              ($hotel["vote"]) >= ($ratingValue)
            )
          ) {
        ?>
            <tr>
              <th><?php echo $hotel['name'] ?></th>
              <td><?php echo $hotel['description'] ?></td>
              <td><?php echo $hotel['parking'] ? 'Si' : 'No' ?></td>
              <td>
                <?php {
                  for ($i = 0; $i < $hotel['vote']; $i++) {
                    echo ('<i class="fa-solid fa-star"></i>');
                  }  ?>
              </td>
              <td><?php echo $hotel['distance_to_center'] ?></td>
            </tr>

      <?php
                } //FOR
              } //IF
            } //FOREACH
      ?>

  </div>
</body>

</html>

<style>
  i {
    color: #ECE20D;
  }
</style>