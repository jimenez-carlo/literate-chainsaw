<?php

$filename = "data.csv";
$file = fopen($filename, "r");

$data = [];
$is_header = true;
while (($row = fgetcsv($file)) !== false) {
  if ($is_header) {
    $is_header = false;
    continue;
  }

  $data[] = [
    'icon' => $row[0],
    'backgroundColor' => $row[1],
    'headline' => $row[2],
    'text' => $row[3],
  ];
}
fclose($file);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link rel="stylesheet" href="/src/style.css">
</head>


<body>
  <header>
    <div>
      <h5>Subheadline</h5>
      <h1>Simplicity operates for OPUS and someday</h1>
      <input type="text" placeholder="Deine Email Adresse">
    </div>

    <div class="header-img">
    </div>

    <div>
      <h5>Subheadline</h5>
      <h1>Lorem ipsum dolor sit amet consectetur adipisicing elitr. sed diam nonumy eirmod tempor invidunt ut labore et dolore.</h1>
      <p>
        Lorem ipsum dolor sit amet consectetur sadipisicing elitr. sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam volupta. At vero eos et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
      </p>

      <button>Button</button>
      <button>Button</button>
    </div>
  </header>

  <main>
    <?php $ctr = 1; ?>
    <?php foreach ($data as $res) { ?>
      <div class="tile <?= $ctr <> 1 ? "text-white" : "" ?> <?= $ctr % 2 == 0 ? "even" : "odd" ?>" style="background:<?= $res['backgroundColor'] ?>">
        <h2><?= !empty($res['icon'])  ? "<img src='/src/assets/" . $res['icon'] . ".svg' class='icon'></img>" : "" ?><?= $res['headline'] ?></h2>
        <p><?= $res['text'] ?></p>
      </div>
      <?php $ctr++; ?>
    <?php } ?>
  </main>

</body>

</html>