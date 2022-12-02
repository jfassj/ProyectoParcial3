<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $endpoint = "http://localhost/proyectoparcial2/api/controllers/quejas.php?op=insert";
  $nombre = $_POST['name'];
  $email = $_POST['email'];
  $telefono = $_POST['tel'];
  $queja = $_POST['queja'];


  $ch = curl_init($endpoint);
  $data = array("nombre" => $nombre, "email" => $email, "telefono" => $telefono, "queja" => $queja);
  $payload = json_encode($data);
  //attach encoded JSON string to the POST fields
  curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
  //set the content type to application/json
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
  //return response instead of outputting
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  //execute the POST request
  $result = curl_exec($ch);
  //close cURL resource
  curl_close($ch);


  if($result){
 echo  " <script>Swal.fire(
      'Good job!',
      'You clicked the button!',
      'success'
    )</script>";
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quejas UTD</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>
  <script src="https://kit.fontawesome.com/ab4fa16bfb.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://rawcdn.githack.com/rafaelbotazini/floating-whatsapp/3d18b26d5c7d430a1ab0b664f8ca6b69014aed68/floating-wpp.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Call-Center</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#encuentranos">Nosotros</a>
        </li>
        <!-- <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li> -->
        <!-- <li class="nav-item">
              <a class="nav-link disabled" href="#">Disabled</a>
            </li> -->
      </ul>
      <form class="form-inline my-2 my-lg-0" action="google/index.php">
        <!-- <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"> -->
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Iniciar sesión</button>
      </form>
    </div>
  </nav>
  <!-- Wrapper container -->
  <div class="container py-4">

    <!-- Bootstrap 5 starter form -->
    <form id="contactForm" method="post">

      <!-- Name input -->
      <div class="mb-3">
        <label class="form-label" for="name">Tu nombre</label>
        <input class="form-control" id="name" name="name" type="text" placeholder="Nombre" />
      </div>

      <!-- Email address input -->
      <div class="mb-3">
        <label class="form-label" for="emailAddress">Tu email</label>
        <input class="form-control" id="emailAddress" name="email" type="email" placeholder="Correo electronico" />
      </div>
      <div class="mb-3">
        <label class="form-label" for="emailAddress">Telefono</label>
        <input class="form-control" id="emailAddress" name="tel" type="text" placeholder="Numero de telefono con lada" />
      </div>

      <!-- Message input -->
      <div class="mb-3">
        <label class="form-label" for="message">Tu queja</label>
        <textarea class="form-control" id="message" name="queja" type="text" placeholder="Escribe tu queja aqui" style="height: 10rem;"></textarea>
      </div>

      <!-- Form submit button -->
      <div class="d-grid">
        <button class="btn btn-primary btn-lg" type="submit">Enviar</button>
      </div>

    </form>
    <div class="container py-4   ">
      <h1 id="encuentranos">Encuentranos</h1>
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3643.968850403339!2d-104.63351178501328!3d24.0321635844513!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x869bb7beea6f767f%3A0xff0e5064e13166fc!2sApi-Aba!5e0!3m2!1ses-419!2smx!4v1668136848336!5m2!1ses-419!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      <div class="callbutton">
        <div id="WAButton"></div>
        <div class="llamada">
        </div>
        <a href="tel:6183100616" class="fas fa-phone-alt"></a>

      </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://rawcdn.githack.com/rafaelbotazini/floating-whatsapp/3d18b26d5c7d430a1ab0b664f8ca6b69014aed68/floating-wpp.min.js">
    </script>

    <script>
      $(function() {
        $('#WAButton').floatingWhatsApp({
          phone: '5216183100616', //Número de telefono (Con prefijo 521 para México)
          headerTitle: '¡Envíanos un mensaje!', //Título de la ventana
          popupMessage: '¡Hola!, Gracias por confiar en nosotros, estamos para apoyarte. ¿En qué te podemos ayudar?', //Mensaje de la ventana
          showPopup: true, //Permite que esté visible el botón flotante
          buttonImage: '<img src="https://rawcdn.githack.com/rafaelbotazini/floating-whatsapp/3d18b26d5c7d430a1ab0b664f8ca6b69014aed68/whatsapp.svg" class="imgpop" />', //Button Image
          position: "right"
        });
      });
    </script>
</body>

</html>