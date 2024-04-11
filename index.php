<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Generateur Qr Code</title>

    <link rel="stylesheet" href="./assets/styles.css" />

    <link rel="stylesheet" href="./assets/fonts/font-awesome.min.css">
  </head>
  <body>
    <div class="container">
        <div id="theme-toggler" class="fa fa-sun-o"></div>
        <div class="content">

          <form method="post">
            <h2>Generateur QrCode</h2>
          <?php 
            
            if(isset($_POST['btnSubmit'])){
              //purifier les données
              $email = htmlspecialchars(trim($_POST['email']));
              $name = htmlspecialchars(trim($_POST['name']));
              //Mettre le nom en miniscule
              $email = strtolower($email);
              $name = strtolower($name);
            }
            ?>
          <label for="name">
            <span>Nom</span>
            <input
            type="text"
            placeholder="Saisir votre nom"
            name="name"
            required
            />
          </label>
          <label for="email">
            <span>Email</span>
            <input
              type="email"
              placeholder="Saisir votre Email"
              name="email"
              required
            />
          </label>
          <label >
            <button type="submit" name="btnSubmit">Générer</button>
          </label>
            <div class="qrBox">
          <?php 
        include "./phpqrcode/qrlib.php";
        $PNG_TEMP_DIR = 'temp/';
        if(!file_exists($PNG_TEMP_DIR))
          mkdir($PNG_TEMP_DIR);
        $filename = $PNG_TEMP_DIR . 'test.png';

        if(isset($_POST['btnSubmit'])){
          $codeString = 'Nom: ' . $name . "\n";
          $codeString .= 'Email: ' . $email;

          $filename = $PNG_TEMP_DIR . $name . 'QrCode' . md5($codeString) . '.png';

          QRcode::png($codeString, $filename);
        echo '<img src=" ' . $PNG_TEMP_DIR . basename($filename) .' " align="center" >';

        echo '</div>';

        echo '<a href=" ' . $PNG_TEMP_DIR . basename($filename) . ' " class="download" download>Download <i class="fa fa-download"></i></a><span class="success">Votre fichier est généré✨</span>';
        }

        
        ?>
        </form>

       


        
      </div>
    </div>
    <script src="./assets/srcipt.js"></script>
  </body>
</html>
