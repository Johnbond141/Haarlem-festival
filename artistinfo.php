<?php

    include("includes/navbar.php");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/jazzcss.css">
    <title>Artist Information</title>
</head>

<body>
    <header class="header">
        <h1 class="eventhead">Jazz Artists</h1>
        <h2 class="slogan">Jazz it up a little!</h2>
    </header>
    <section class="agenda">
        <article class="title-wrapper">
            <h1>Festival <span style="font-weight: bold;">Agenda</span></h1>
            <form action="" method="POST">
                <section class="day-buttons">
            <input type="submit" name="thursday" value="Thursday" class="thursday">
            <input type="submit" name="friday" value="Friday" class="friday">
            <input type="submit" name="saturday" value="Saturday" class="saturday">
            <input type="submit" name="sunday" value="Sunday" class="sunday">
            </section>
            </form>
        </article>
        <article class="info-wrapper">
        <img src="img/jazzagenda.png" alt="picture of dude on saxophone">
        <section class="perfomance-one">
            <h2>Gumbo Kings</h2>
            <p>Patronaat, Main Hall</p>
            <p>18:00 - 19:00, July 26th</p>
            </section>
            <section class="perfomance-two">
            <h2>Evolve</h2>
            <p>Patronaat, Main Hall</p>
            <p>19:30 - 20:30, July 26th</p>
            </section>
            <section class="perfomance-three">
            <h2>Ntjam Rosie</h2>
            <p>Patronaat, Main Hall</p>
            <p>21:00 - 22:00, July 26th</p>
            </section>
            <section class="perfomance-four">
            <h2>Wicked Jazz Sounds</h2>
            <p>Patronaat, Second Hall</p>
            <p>18:00 - 19:00, July 26th</p>
            </section>
            <section class="perfomance-five">
            <h2>Tom Thomson Assemble</h2>
            <p>Patronaat, Second Hall</p>
            <p>19:30 - 20:30, July 26th</p>
            </section>
            <section class="perfomance-six">
            <h2>Jonna Frazer</h2>
            <p>Patronaat, Second Hall</p>
            <p>21:00 - 22:00, July 26th</p>
            </section>
        </article>
    </section>
</body>

</html>

<?php

    include("includes/footer.php");

?>