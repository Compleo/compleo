<?php
  session_start();
  $n = "Login";

  include_once('./components/top.php');

  //TODO: CONTROLLA CHE NON SIA LOGGATO
?>

<!-- ======= About Section ======= -->
<section id="login" class="about d-flex align-items-center">
<div class="container" data-aos="zoom-out" data-aos-delay="100">  
        <div class="container-fluid">
          <div class="row main-content bg-success text-center">
            <div class="col-md-4 text-center company__info">
              <span class="company__logo"><h2><span class="fa fa-android"></span></h2></span>
              <h4 class="company_title">Compleo</h4>
              <img width="100%" src="assets/img/login.png" />
            </div>
            <div class="col-md-8 col-xs-12 col-sm-12  login_form ">
              <div class="container-fluid">
              <div class="row">
              <form action="php/login_verifica.php" class="form-group" method="post">
                <?php
                  if(isset($_SESSION['errore'])) {
                    echo '
                      <div class="row">
                        <div class="alert alert-danger" role="alert">
                          '.$_SESSION['errore'].'
                        </div>
                      </div>';
                  }
                ?>
                <div class="row">
                  <input type="text" name="username" id="username" class="form__input" placeholder="Username">
                </div>
                <div class="row">
                  <!-- <span class="fa fa-lock"></span> -->
                  <input type="password" name="password" id="password" class="form__input" placeholder="Password">
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="remember_me" id="remember_me" class="">
                  <label class="form-check-label" for="flexCheckDefault">
                    Ricordami
                  </label>
                </div>
                <div class="row">
                  <input type="submit" value="Login" class="btn">
                </div>
              </form>
            </div>
					<div class="row">
						<p>Se non hai un account <a href="#">Crealo qui</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</section>


<?php
  include_once('components/footer.php');
?>