<!-- ======= Top Bar ======= -->
<div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
    <div class="container d-flex">
      <div class="contact-info me-auto">
        <i class="icofont-envelope"></i> <a href="mailto:contact@example.com">info@compleo.it</a>
        <i class="icofont-phone"></i> +39 0541 1234567
      </div>
      <div class="social-links">
        <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
        <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
        <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
        <a href="#" class="skype"><i class="icofont-skype"></i></a>
        <a href="#" class="linkedin"><i class="icofont-linkedin"></i></i></a>
      </div>
    </div>
  </div>
<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
      <a href="./" class="logo me-auto"><img src="../assets/img/logo.png" alt=""></a>

      <nav class="nav-menu">
        <ul>
          <li class="active"><a href="../index.php">Servizio</a></li>
          <li><a href="../index.html">Home</a></li>
          <li><a href="./offerte">Offerte</a></li>
          <li><a href="../#chisiamo">Chi siamo</a></li>
          <li><a href="../#team">Team</a></li>
          <li><a href="../contatti.html">Contatti</a></li>
          
          <?php
                            if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
                                $usr = $_SESSION['datiUtente'];
                                echo
                                '
                                <li class="drop-down"><a href="#">'.$usr["nome"].' '.$usr["cognome"].'</a>
                                    <ul>
                                        <li><a href="./profilo/"><i class="address card icon"></i>Profilo</a></li>
                                        <li><a href="./offerte/prenotazioni"><i class="money bill alternate icon"></i>Prenotazioni</a></li>
                                        <li><a href="./chat"><i class="comment icon"></i>Chat</a></li>
                                        <li><a href="./php/logout.php"><i class="sign out alternate icon"></i>Esci</a></li>
                                    </ul>
                                </li>
                                ';
                                /*
                                    <a class="item" href="./profilo/"><i class="address card icon"></i>Profilo</a>
                                    <a class="item" href="./offerte/prenotazioni"><i class="money bill alternate icon"></i>Prenotazioni</a>
                                    <a class="item" href="./chat"><i class="comment icon"></i>Chat</a>
                                    <a class="item" href="./php/logout.php"><i class="sign out alternate icon"></i>Esci</a>
                                */
                            } else {
                                echo '
                                    <li><a href="./profilo/login.php">Login | Registrati</a></li>
                                ';
                            }
                        ?>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->


  <script src="../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/main.js"></script>