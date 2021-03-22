<?php
    include_once 'navBar.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Haarlem Festival</title>
  </head>
  <body class="index">

    <header class="indexHeader">
      <h1 class="indexTitle">HAARLEM FESTIVAL</h1>
      <h2 class="indexSlogan">DARE TO DANCE! BUY YOUR TICKETS NOW...</h2>
    </header>

    <section id="midsection">
      <section class="containerBody">
        <section class="quickbar">

          <article class="backgroundQuickbar1">
            <button type="button" class="quickbarButton"><img src="img/rounded-headphones.png" alt=""><p>Artists</p></button>
          </article>

          <article class="backgroundQuickbar2">
            <button type="button" class="quickbarButton"><img src="img/information.png" alt=""><p>About</p></button>
          </article>

          <article class="backgroundQuickbar3">
            <button type="button" class="quickbarButton"><img src="img/contact-form.png" alt=""><p>Contact us</p></button>
          </article>

        </section>

        <section class="hoverEvents">
          <article class="backgroundEvent1">
            <article class="imageZoom">
              <img src="img/jazz1.jpg">
              <article class="bottom-left">Jazz</article>
            </article>
          </article>

          <article class="backgroundEvent2">
            <article class="imageZoom">
              <img src="img/food1.jpg">
              <article class="bottom-left">Food</article>
            </article>
          </article>

          <article class="backgroundEvent3">
            <article class="imageZoom">
            <a href="dance.php"><img src="img/dance1.jpg"></a> 
              <article class="bottom-left">Dance</article>
            </article>
          </article>

        </section>

        <section class="socialmedia">
          <p>FOLLOW US ON SOCIAL MEDIA</p>
          <img src="img/social-media.png" alt="">
        </section>

        <section class="partners">
          <p>PARTNERS</p>

          <section class="partner1">
            <article class="partnerImages">
              <a href="https://www.pinkpop.nl/2021/" target="_blank"><img src="img/Partner-1.png" alt=""></a>
            </article>
          </section>

          <section class="partner2">
            <article class="partnerImages">
              <img src="img/Partner-2.png" alt="">
            </article>
          </section>

          <section class="partner3">
            <article class="partnerImages">
              <img src="img/Partner-3.png" alt="">
            </article>
          </section>

          <section class="partner4">
            <article class="partnerImages">
              <a href="https://www.holland-dance.com/" target="_blank"><img src="img/Partner-4.png" alt=""></a>
            </article>
          </section>

          <section class="partner5">
            <article class="partnerImages">
              <a href="https://www.q-dance.com/en/events/defqon-1/" target="_blank"><img src="img/Partner-5.png" alt=""></a>
            </article>
          </section>

        </section>

      </section>
    </section>

  </body>
</html>

<?php

include_once "footer.php";

?>
