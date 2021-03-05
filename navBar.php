<?php
session_start();
require 'Controller/UserController.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=9" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
  <body>

    <section id="masthead">
		   <section class="containerNav">

         <a href="index.php">
           <article class="logo">
             <img src="img/LogoHF.png">
  			   </article>
         </a>

         <nav class="navbar">

           <section>
             <article class="shoppingcart">
               <a href="#"><img src="img/shopping-cart.png"></a>
             </article>
           </section>

           <section>
             <article>
               <a href="login.php">Login</a>
             </article>
           </section>

           <section class="dropdown">
             <button class="dropbtn1">Events</button>
             <article class="dropdown-content">
               <a href="#">Jazz</a>
               <a href="#">Food</a>
               <a href="#">Dance</a>
             </article>
           </section>

           <section>
             <article>
               <a href="#">Create program</a>
             </article>
           </section>


           <section class="dropdown">
             <button class="dropbtn">Info</button>
             <article class="dropdown-content">
               <a href="#">Tickets</a>
               <a href="#">Artists</a>
               <a href="#">About</a>
               <a href="#">Contact us</a>
             </article>
           </section>

           <section>
             <article >
               <a href="index.php">Home</a>
             </article>
           </section>
         </nav>

		   </section>
	  </section>

  </body>
</html>
