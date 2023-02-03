<!-- 
    Filename: barangay_details.php
    Description: This is where the barangay details page are displayed.
 -->


<?php
// Setup the database instance and its configuration.
/**
 * @note PLEASE CHECK THE CONSOLE BROWSER TO SEE IF CONNECTION TO HEROKU IS SUCCESSFUL!
 */
// Require the instance of database configuration
session_start();
require("../../database_instance.php");

// Check the cookies for resident
if(!isset($_COOKIE["resident_cookie_username"])) {
    if(!isset($_COOKIE["resident_cookie_password"])) {
        header("location ../error/error.php");
    }
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Barangay Department, Details, and Contacts</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Global styling and theming -->
        <link href="../../css/globals.css" rel="stylesheet">
        <!-- Styling to resident navbar only -->
        <link href="../../css/resident_navbar.css" rel="stylesheet">
        <!-- Bootstrap from https://getbootstrap.com/ -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    
	<style>
	/* Barangay History */
	.barangay-history {
		margin: 50px auto;
		text-align: justify;
		font-family: Arial, sans-serif;
		font-size: 16px;
		line-height: 1.5;
		color: #333;
		border: 2px solid #333;
		background-color: #C7EFCF;
		opacity: 0.9;
		background-image:  repeating-radial-gradient( circle at 0 0, transparent 0, #C7EFCF 4px ), repeating-linear-gradient( #F0B67F55, #F0B67F );
		width: 50%;
		padding: 30px;
	}

	.barangay-history h2 {
		text-align: center;
		font-size: 22px;
		font-weight: bold;
		margin-bottom: 20px;
	}
	

	</style>

	
	</head>
    <body>
        <!-- Top navbar at resident navbar ONLY -->
        <div class="resident_navbar">
            <center>
                <a href="home_resident.php">News and Announcements</a>
                <a href="complaints_page.php">Complaints/Reports</a>
                <a class="active" href="">Barangay Details</a>
                <a href="../../components/custom/logout.php">Logout</a>
            </center>
        </div>
		<div class="barangay-history">
			<h2>Barangay History</h2>
			<p> Liblib, bangin-bangin at masukal ang matandang lugar ng LOMA DE GATO. Sa pook na pinamagatang Marilao-Novaliches Complex, natagpuan ang isang daras na tinagurian ni Dr. H. Otley Beyer na "Luzon Adze". Ayon kay Fr. Francis Lynch, Jesuita, ang ganiton uri ng kasangkapan ay naglayag sa New Zealand sa Taiwan at nagdaan sa Pilipinas na walang nagbabago. </p>
			<p> Mga Austronesyano, sa palagay ni Peter Bellwood ng Australia National University, ay nagmula sa Timog Tsina nagdaan sa Taiwan at tumuloy sa Pilipinas noong 4000 BC at ang taglay nila: Daras at Palay (Oryza Sativa). May patunay din na ang Loma De Gato ay tinitirahan ng mga Tagalog ng panahon na ang maliit na kampit at lanseta ay pinapanday sa minahan ng bakat sa Angat, Bulakan. Nangyari ito daan-daang taon pa bago lumunsad ang mga kastila sa Ilog Meykawayan. </p>
			<p> Nang dumating ang mga Misyonerong Franciscano sa Meykawayan na siyang pinakapuso ng Lalawigan noong 1578, isa sa mga nayon dito ang LOMA DE GATO na noon ay may kaunting Agrikultura ng Palay, dahil sa ang mga gulod at libis nito ay nababalot ng dalawang talahib (Saccharum Spontaneum). Kinukutya ito ng mga makakating dila na: Lupang Tumatahip, na ang ibig sabihin dito ay magulo at maranming magnanakaw. </p>
			<p> Sa pag-uasd ng panahon, ayon na rin sa patunay ng matandang mapa ng Bulakan na iginuhit ng Felix Eulogio Diaz bago 1800, ang baying Meykawayan ay unti-unting nahati sa Bocaue (1606. San Jose Del Monte (1751), Santa Maria de Pandi (1793) at Marilao (1796). Nanatiling waring sinsel na napasingit sa apat na bayan ang LOMA DE GATO. Sakop nito ang Pasong matanda sa Pajo, Polangi, Lugar de San Francisco Clemente at ang Sapang Kamanse. Ngunit hiwalay rito ang Estero de Tubtob. Sa Timog-Silangan hanggang Loma de Gato ang Casa del Padre Agustino na ng Lumaon ay nagging Bahay-pare nayon ng Meykawayan sa hilaga at kanluran. katabi nito ang Monte Halang, ngayon ay San Vicente nayon ng Sta.Maria at sa ibababa ay inipit ito ng Prenza, Marilao. Sa silangan naman ang San Jose del Monte na maraming alibangbang at kugon (Impreta Cylindrica). </p>
			<p> Ang LOMA DE GATO, ay sakop ng hacienda de Lolomboy. Ang nayong ito ay may sukat na604 Hektarya ng lupa (790,40 kabuuang sukat taong 2011). Sa literal na pakahulugan ang LOMA DE GATO ay gulod ng Pusa. Dahil sa pagtutol ng mga magsasakang Taga-Bocaue at Marilao noong 1745-1760 ang salitang "GATO" ay nagkukulay. Ayon sa mga "Inquilinong" Tagalog walang titulo ang mga prayleng kastila kundi nilubid na buhangin. Sagot ng mga pryleng Dominicano dumarami raw ang bilang ng mga tulisan. Wika ng Iskolar na si Jaime Veneracion "Ang pagdami ng mga tulisan ay ipinapahiwatig ng mga pangalang lugar ng LOMA DE GATO sa Marilao. Ang literal na ibig sabihin nito ay "GULOD NG PUSA" ngunit sa panahong ito, ang "GATO" sa maga kastila ay katumbas ng "Masasamang Loob". </p>
	
		</div>
		
    </body>
</html>