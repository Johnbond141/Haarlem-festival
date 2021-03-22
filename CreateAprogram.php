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
                    <article class="lineprogram"></article>
                    <input type="submit" value="Thursday" name="programthursday" class="programthursday">
                    </form>
                    <form action="" method="post">
                    <input type="submit" value="Friday" name="programfriday" class="programfriday">
                    </form>
                   <form action="" method="post">
                    <input type="submit" value="Saturday" name="programsaturday" class="programsaturday">
                    </form>
                    <form action="" method="post">
                    <input type="submit" value="Sunday" name="programsunday" class="programsunday">
                    </form>
                  
</section>
            
</body>
</html>

<?php

    include("includes/footer.php");

?>