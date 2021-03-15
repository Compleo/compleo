<?php
  session_start();
  include_once('top.php');
?>

<!-- ======= About Section ======= -->
<section id="login" class="about d-flex align-items-center">
<div class="container" data-aos="zoom-out" data-aos-delay="100">
     

        <div class="section-title">
          <h2>Inserisci le tue credenziali</h2>
        </div>

        <div class="container-fluid">
          <div class="row main-content bg-success text-center">
            <div class="col-md-4 text-center company__info">
              <span class="company__logo"></span>
              <h4 class="company_title">Compleo</h4>
              <img width="100%" src="assets/img/login.png" />
            </div>
            <div class="col-md-8 col-xs-12 col-sm-12 login_form ">
              <div class="container-fluid">
              <div class="row">
              <form action="login_verifica.php" class="form-group" method="POST">
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
					<div class="row">
						<p>Se non hai un account <br /><a href="#">Crealo qui</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</section>

<?php
include_once('footer.php');

?>