<?php
	include_once 'navBar.php';
?>

<html>
	<body>

		<section class="img-column-foodpage">	
		</section>

		<header class="indexHeader">
		<h1 class="indexTitle">Food Event</h1>
		<h2 class="indexSlogan">Good food is all you need</h2>
		</header>


        <section class="klantInfo">
            <h3>Customer details</h3>
            <form class=klantInfoForm>
                <label for="klantEmail">Email adress:</label><br>
                <input type="text" id="klantEmail" name="klantEmail"><br>
                <label for="klantNaam">Full name:</label><br>
                <input type="text" id="klantNaam" name="klantNaam"><br>
                <label for="klantLand">Country:</label><br>
                <input type="text" id="klantLand" name="klantLand"><br>
                <label for="klantStad">City:</label><br>
                <input type="text" id="klantStad" name="klantStad"><br>
                <label for="klantStraat">Street:</label><br>
                <input type="text" id="klantStraat" name="klantStraat"><br>
                <label for="klantHuisnummer">House number:</label><br>
                <input type="text" id="klantHuisnummer" name="klantHuisnummer"><br>
                <label for="klantTelefoonnmr">*Phone number:</label><br>
                <input type="text" id="klantTelefoonnmr" name="klantTelefoonnmr"><br>
            </form>
        </section>

        <section class="infopageRSide">
            <section class="betaalmethodeInfo">
                <h3>Payment method</h3>
                <form class=betaalmethode>
                    <input type="radio" id="ideal" name="payment" value="ideal">
                    <label for="ideal">IDEAL</label><br>
                    <input type="radio" id="paypal" name="payment" value="paypal">
                    <label for="paypal">PAYPAL</label><br>
                    <input type="radio" id="creditcard" name="payment" value="creditcard">
                    <label for="creditcard">CREDITCARD</label>
                </form>
            </section>
            
            <section class="bankOpties">
                <h3>Choose your Bank</h3>
                <form class="kiesBank">
                        <select id="bankDropdown" name="banken">
                            <option value="ABN-Amro">ABN-Amro</option>
                            <option value="ASN">ASN</option>
                            <option value="Bunq">Bunq</option>
                            <option value="ING ">ING </option>
                            <option value="Knab">Knab</option>
                            <option value="Rabobank">Rabobank</option>
                            <option value="SNS ">SNS </option>
                        </select>
                </form>
            </section>
        </section>
	</body>
</html>
