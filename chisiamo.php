<?php
  session_start();
  $n = "Chi Siamo";

  include_once('components/top.php');
?>

<!-- ======= About Section ======= -->
<section id="about" class="about d-flex align-items-center">
<div class="container" data-aos="zoom-out" data-aos-delay="100">
        <div class="section-title">
          <h2>Chi siamo</h2>
          <h3>Qualcosa in più su <span>Compleo</span></h3>

          <p>Compleo nasce con l'obiettivo di assicurare una vasta gamma di servizi a chiunque
          desideri offrire la propria ... o che cerchi qualcuno per lo svolgimento di piccoli o 
          grandi lavori.</p>

        <div class="row mt-4">
          <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
            <img src="assets/img/about.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
            <h3>Offerte e Richieste di lavoro</h3>
            <p class="font-italic">
              Su <span>Compleo</span> puoi trovare la persona giusta in grado di svolgere 
              il lavoro che ti interessa oppure puoi essere tu stesso ad offrirti come 
              esperto per lo svolgimento di un lavoro
            </p>
            <h3>Il passaparola</h3>
            <p>Noi crediamo che il parere dei clienti che hanno assunto i nostri
                  esperti sia il modo migliore per qualificare il livello di professionalità
                  raggiunto da chi offre una prestazione sul nostro sito
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

<?php
  include_once('components/footer.php');
?>