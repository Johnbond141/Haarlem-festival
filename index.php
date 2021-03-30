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

<!-- Footer -->
<section class="wrapperfooterIndex">
    <img class="logofooter" src="img/LogoHF.png" alt="logo of haarlem festival">
    <article class="menutag">
        <h3>Menu</h3>
    </article>
    <article class="footermenu">
        <ul class="section1">
            <li><a href="#">Home</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="#">Contact us</a></li>
            <li><a href="#">Tickets</a></li>
        </ul>
        <ul class="section2">
            <li><a href="#">Artists</a></li>
            <li><a href="#">Create a program</a></li>
            <li><a href="#">Jazz</a></li>
            <li><a href="#">Food</a></li>
        </ul>
        <ul class="section3">
            <li><a href="#">Dance</a></li>
        </ul>
    </article>
    <article class="latestposttag">
        <h3>Latest Posts</h3>
    </article>
    <article class="latestposts">
        <section class="insta">
            <a href="https://www.instagram.com"><img src="img/instagramlogo.png" alt="picture of instagram logo"></a>
            <p>Hardwell on Haarlem Festival
                <br><span style="color: black;">by</span> Haarlem Festival
            </p>
        </section>
        <section class="facebook">
            <a href="https://www.facebook.com"><img src="img/facebooklogo.png" alt="picture of facebook logo"></a>
            <p><span style="color: black;">@HaarlemFestival</span> Buy your tickets
                <br>now for the next festival</p>
        </section>
    </article>
    <article class="stayconnectedtag">
        <h3>Stay Connected</h3>
    </article>
    <article class="stayconnected">
        <form action="">
            <input class="email" type="text" name="email" placeholder="Email Address...">
            <input class="signup" type="submit" name="signup" value="Sign-Up">
        </form>
    </article>
    <article class="linefooter"></article>
    <article class="copyright">
    <article class="copyrightlogos">
    <a href="https://www.facebook.com"><img src="img/facebook.png" alt="picture of facebook logo"></a>
    <a href="https://www.youtube.com"><img src="img/youtube.png" alt="image of youtube logo"></a>
    <a href="https://www.instagram.com"><img src="img/instagram.png" alt="image of instagram logo"></a>
    </article>
        <p><span>&#169;</span>Copyright. All right reserved.</p>
    </article>
</section>
