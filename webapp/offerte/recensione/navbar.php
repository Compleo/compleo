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
<div class="ui large top stackable menu" >
                <div class="ui container">
                    <a class="item" href="../../../"><img src="./../../assets/logo.png"></a>
                    <a class="item" href="./../../">
                        Home
                    </a>
                    <a class="item" href="./../../offerte/">
                        Offerte
                    </a>
                    <div class="right menu">
                        <?php
                            if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
                                $usr = $_SESSION['datiUtente'];
                                echo '
                                    <div class="ui simple dropdown item">
                                        <i class="user icon"></i>
                                        <i class="dropdown icon"></i>
                                        <div class="menu">
                                            <div class="header">'.$usr["nome"].' '.$usr["cognome"].'</div>
                                            <a class="item" href="./../../profilo/"><i class="address card icon"></i>Profilo</a>
                                            <a class="item" href="./../../offerte/prenotazioni"><i class="money bill alternate icon"></i>Prenotazioni</a>
                                            <a class="item" href="./../../chat"><i class="comment icon"></i>Chat</a>
                                            <a class="item" href="./../../php/logout.php"><i class="sign out alternate icon"></i>Esci</a>
                                        </div>
                                    </div>   
                                ';
                            } else {
                                header("location: ../");
                            }
                        ?>
                    </div>
                </div>
            </div>