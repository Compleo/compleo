<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
      <a href="./" class="logo me-auto"><img src="../../assets/img/logo.png" alt=""></a>

      <nav class="nav-menu">
        <ul>
          <li><a href="../index.php">Servizio</a></li>
          <li><a href="../../index.html">Home</a></li>
          <li class="active"><a href="./">Offerte</a></li>
          <li><a href="../../#chisiamo">Chi siamo</a></li>
          <li><a href="../../#team">Team</a></li>
          <li><a href="../../contatti.html">Contatti</a></li>
          
          <?php
                            if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
                                $usr = $_SESSION['datiUtente'];
                                echo
                                '
                                <li class="drop-down"><a href="#">'.$usr["nome"].' '.$usr["cognome"].'</a>
                                    <ul>
                                        <li><a href="./../profilo"><i class="address card icon"></i>Profilo</a></li>
                                        <li><a href="./../offerte/prenotazioni"><i class="money bill alternate icon"></i>Prenotazioni</a></li>
                                        <li><a href="./../chat"><i class="comment icon"></i>Chat</a></li>
                                        <li><a href="./../php/logout.php"><i class="sign out alternate icon"></i>Esci</a></li>
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
                                    <li><a href="./../profilo/login.php">Login | Registrati</a></li>
                                ';
                            }
                        ?>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  
      