<?php
  session_start();
  $n = "Registrazione";

  include_once('./components/top.php');
  $json = json_decode('')

?>

<!-- ======= Login Section ======= -->
<section id="registrazione" class="about d-flex align-items-center">
<div class="container" data-aos="zoom-out" data-aos-delay="100">  
   <form action="php/registraUtente_verifica.php" style="margin-top: 100px;" method="POST">
    <div class="row">
      <p class="col-6">Nome</p>
      <input class="col-6" type="text" name="nome">
    </div>
    <div class="row">
      <p class="col-6">Cognome</p>
      <input class="col-6" type="text" name="cognome">
    </div>
    <div class="row">
      <p class="col-6">Codice Fiscale</p>
      <input class="col-6" type="text" name="CF">
    </div>
    <div class="row">
      <p class="col-6">Indirizzo</p>
      <input class="col-6" type="text" name="indirizzo">
    </div>
    <div class="row">
      <p class="col-6">Regione</p>
      <input class="col-6" type="text" name="regione">
    </div>
    <div class="row">
      <p class="col-6">Provincia</p>
      <input class="col-6" type="text" name="provincia">
    </div>
    <div class="row">
      <p class="col-6">ComunE</p>
      <input class="col-6" type="text" name="comune">
    </div>
    <div class="row">
      <p class="col-6">Telefono</p>
      <input class="col-6" type="text" name="telefono">
    </div>
    <div class="row">
      <p class="col-6">Email</p>
      <input class="col-6" type="text" name="email">
    </div>
    <div class="row">
      <p class="col-6">Username</p>
      <input class="col-6" type="text" name="username">
    </div>
    <div class="row">
      <p class="col-6">Password</p>
      <input class="col-6" type="text" name="password">
    </div>
    <input type="submit" value="Registrati">

   </form>
</div>
</section>

<script>
  function sbloccaProvince()
  {
    //TODO: IMPLEMENTA
  }
  function sbloccaComuni()
  {
    //TODO: IMPLEMENTA
  }
</script>

<?php
  include_once('components/footer.php');
?>