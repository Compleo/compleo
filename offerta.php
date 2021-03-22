<?php
  session_start();

  $login = null;
  $nomi_qualifiche=[];

  if (isset($_SESSION['login'])) {
    include_once('top_login.php');
    include_once('db.php');

     /* Preparazione dell'interrogazione SQL con uso di parametri */
     $dsn = "mysql:host=$server;dbname=$db;";
     $sql = "SELECT Descrizione FROM Attivita";
 
     try {
 
       /* Apertura della connessione */
       $connessione = new PDO($dsn, $userdb, $userps);
 
       $sql_ris = $connessione->query($sql);
       $q = $sql_ris->fetchall(PDO::FETCH_OBJ); 

       foreach ($q as $qualif) {
          $nomi_qualifiche[] = $qualif->Descrizione;
       }

       // Test per verificare contenuto di $nomi_qualifiche
       //var_dump($nomi_qualifiche);
 
      } catch (PDOException $e) {
    
        /* da sostituire con una alert, se necessario */
        throw new PDOException($e->getMessage(), (int)$e->getCode());
      }
  }
  else {
    include_once('top.php');
    header('Location:index.php');
  }
?>


<section id="contatti" class="about d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100"> 
        <div class="section-title">
          <h2>Compilazione di una richiesta di Prestazione</h2>
        </div>

        <form action="offerta_verifica.php" class="form-group" method="POST">
       

<?php

          echo "<select name=\"tipologia\">";

          foreach ($nomi_qualifiche as $descr) {
            echo "<option value=\"" . $descr . "\">" . $descr . "</option>";
          }
          echo "</select>";
?>
        
                <div class="row">
                  <input type="text" name="username" id="username" class="form__input" placeholder="Username">
                </div>
                <div class="row">
                  <!-- <span class="fa fa-lock"></span> -->
                  <input type="password" name="password" id="password" class="form__input" placeholder="Password">
                </div>
                <div class="row">
                  <input type="checkbox" name="remember_me" id="remember_me" class="">
                  <label for="remember_me">Ricorda i dati inseriti</label>
                </div>
                <div class="row">
                  <input type="submit" value="Login" class="btn">
                </div>
              </form>



    </div>
</section>


<?php
include_once('footer.php');

?>