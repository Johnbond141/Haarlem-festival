<?php

    include("includes/navBar.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/jazzcss.css">
    <title>Create A Program</title>
</head>

<body>
    <header class="programheader">
        <h1 class="eventhead">Create a<br><span>Program</span></h1>
        <h2 class="slogan">Create your very own festival program!</h2>
    </header>
    <section class="program-container">
    <article class="lineprogram"></article>
        <h2>Create a Program</h2>
        
            <form action="" method="POST">
                <input type="submit" value="Jazz" name="programjazz" class="programjazz">
            </form>
            <form action="" method="post">
                <input type="submit" value="Food" name="programfood" class="programfood">
            </form>
            <form action="" method="post">
                <input type="submit" value="Dance" name="programdance" class="programdance">
            </form>
        

        
        <form action="" method="post">
            <input type="submit" value="Thursday, July 26th" name="programthursday" class="programthursday">
        </form>
        <form action="" method="post">
            <input type="submit" value="Friday, July 27th" name="programfriday" class="programfriday">
        </form>
        <form action="" method="post">
            <input type="submit" value="Saturday, July 28th" name="programsaturday" class="programsaturday">
        </form>
        <form action="" method="post">
            <input type="submit" value="Sunday, July 29th" name="programsunday" class="programsunday">
        </form>

        <article class="allaccesspass3">
            <h3>All Acces Pass</h3>
            <p>(Thursday, Friday, Saturday)</p>
            <span>&euro;80</span>
            <form action="" method="post">
                <input type="submit" value="Add to program" name="addallaccessjazz3" class="addtoprogram" id="addtoprogram-allaccess3-jazz">
            </form>
            <hr class="dashed">
        </article>
        <article class="allaccesspass1">
            <h3>All Acces Pass</h3>
            <p>(Thursday)</p>
            <span>&euro;80</span>
            <form action="" method="post">
                <input type="submit" value="Add to program" name="addallaccessjazz1" class="addtoprogram" id="addtoprogram-allaccess3-jazz">
            </form>
            <hr class="dashed">
        </article>

    </section>

</body>

</html>

<?php

    include("includes/footer.php");

?>