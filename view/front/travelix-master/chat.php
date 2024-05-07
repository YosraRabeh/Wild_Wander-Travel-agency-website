<?php
include 'C:/xampp/htdocs/PROJECT1/projet web/controller/gestion_contact.php';

// fonction bich ta5ou il id wa tod5ol il tableau clients wa itraj3alik il information imta3ou 


$contact_gestion = new contact_gestion();

$client =  $contact_gestion->showClient(2)  ; 


?>




<!DOCTYPE html>
<html lang="en">
<head>
<title>Contact</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Travelix Project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/contact_styles.css">
<link rel="stylesheet" type="text/css" href="styles/contact_responsive.css">
<script src="CR.js"></script>

<style>
        #chat-container {
    background-color: #f5f5f5;
    border-radius: 10px;
    padding: 20px;
    max-width: 600px;
    margin: 0 auto;
    margin-top: 50px;
}

#chat {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.user-message {
    background-color: #dcf8c6;
    padding: 10px;
    border-radius: 10px;
    max-width: 70%;
}

.user-message:hover {
    background-color: #d1f5b8;
}

.bot-message {
    background-color: #e5f3ff;
    padding: 10px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.bot-message:hover {
    background-color: #d5e8ff;
}

.bot-avatar {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background-color: #007bff;
    display: flex;
    align-items: center;
    justify-content: center;
}

.bot-avatar i {
    color: #fff;
    font-size: 24px;
}

#options {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-bottom: 10px;
}

#options button {
    background-color: #Ffa500;
    padding: 10px;
    border-radius: 10px;
    flex-basis: calc(20% - 10px);
}

#options button:hover {
    background-color: #d1f5b8;
}
.chat-container {
            background-color: #ffffff;
            border-radius: 30px;
            padding: 20px;
            max-width: 600px;
            margin: 0 auto;
            margin-top: 50px;
        }
        .button-container {
            position: absolute;
            top: 20px; /* Adjust this value to give space from the top */
            left: 50%;
            transform: translateX(-50%);
        }

        .button {
            background-color: #ff5722; /* New color */
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
            box-shadow: 0 4px 6px rgba(255, 87, 34, 0.1); /* New shadow color */
        }

        .button:hover {
            background-color: #e64a19; /* Darker color on hover */
        }


</style>
</head>

<body>

<div class="super_container">
	
	<!-- Header -->

	<header class="header">

		<!-- Top Bar -->

		<div class="top_bar">
			<div class="container">
				<div class="row">
					<div class="col d-flex flex-row">
						<div class="phone">+45 345 3324 56789</div>
						<div class="social">
							<ul class="social_list">
								<li class="social_list_item"><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
								<li class="social_list_item"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
								<li class="social_list_item"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
								<li class="social_list_item"><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
								<li class="social_list_item"><a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
								<li class="social_list_item"><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
							</ul>
						</div>
						<div class="user_box ml-auto">
							<div class="icon" ><img src="images/user.png" alt=""></div>
						</div>
					</div>
				</div>
			</div>		
		</div>

		<!-- Main Navigation -->

		<nav class="main_nav">
			<div class="container">
				<div class="row">
					<div class="col main_nav_col d-flex flex-row align-items-center justify-content-start">
						<div class="logo_container">
							<div class="logo"><a href="#"><img src="images/logo.png" alt=""></a></div>
						</div>
						<div class="main_nav_container ml-auto">
							<ul class="main_nav_list">
								<li class="main_nav_item"><a href="index.html">home</a></li>
								<li class="main_nav_item"><a href="about.html">about us</a></li>
								<li class="main_nav_item"><a href="flights.html">flights</a></li>
								<li class="main_nav_item"><a href="accomodations.html">accomodations</a></li>
								<li class="main_nav_item"><a href="pack.html">packs</a></li>
								<li class="main_nav_item"><a href="blog.html">blogs</a></li>
								<li class="main_nav_item"><a href="contact.html">contact</a></li>
								<li class="main_nav_item"><a href="claim.html">claim</a></li>
							</ul>
						</div>
						<div class="content_search ml-lg-0 ml-auto">
							<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
							width="17px" height="17px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
								<g>
									<g>
										<g>
											<path class="mag_glass" fill="#FFFFFF" d="M78.438,216.78c0,57.906,22.55,112.343,63.493,153.287c40.945,40.944,95.383,63.494,153.287,63.494
											s112.344-22.55,153.287-63.494C489.451,329.123,512,274.686,512,216.78c0-57.904-22.549-112.342-63.494-153.286
											C407.563,22.549,353.124,0,295.219,0c-57.904,0-112.342,22.549-153.287,63.494C100.988,104.438,78.439,158.876,78.438,216.78z
											M119.804,216.78c0-96.725,78.69-175.416,175.415-175.416s175.418,78.691,175.418,175.416
											c0,96.725-78.691,175.416-175.416,175.416C198.495,392.195,119.804,313.505,119.804,216.78z"/>
										</g>
									</g>
									<g>
										<g>
											<path class="mag_glass" fill="#FFFFFF" d="M6.057,505.942c4.038,4.039,9.332,6.058,14.625,6.058s10.587-2.019,14.625-6.058L171.268,369.98
											c8.076-8.076,8.076-21.172,0-29.248c-8.076-8.078-21.172-8.078-29.249,0L6.057,476.693
											C-2.019,484.77-2.019,497.865,6.057,505.942z"/>
										</g>
									</g>
								</g>
							</svg>
						</div>

						<form id="search_form" class="search_form bez_1">
							<input type="search" class="search_content_input bez_1">
						</form>
						
						<div class="hamburger">
							<i class="fa fa-bars trans_200"></i>
						</div>
					</div>
				</div>
			</div>	
		</nav>

	</header>

	<div class="menu trans_500">
		<div class="menu_content d-flex flex-column align-items-center justify-content-center text-center">
			<div class="menu_close_container"><div class="menu_close"></div></div>
			<div class="logo menu_logo"><a href="#"><img src="images/logo.png" alt=""></a></div>
			<ul>
				<li class="menu_item"><a href="index.html">home</a></li>
				<li class="menu_item"><a href="about.html">about us</a></li>
				<li class="menu_item"><a href="flights.html">offers</a></li>
				<li class="menu_item"><a href="blog.html">news</a></li>
				<li class="menu_item"><a href="#">contact</a></li>
			</ul>
		</div>
	</div>

	<!-- Home -->

	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="images/contact_background.jpg"></div>
		<div class="home_content">
			<div class="home_title">contact</div>
		</div>
	</div>

	<!-- Contact -->

	<div class="contact_form_section">
		<div class="container">
			<div class="row">
				<div class="col">

					<!-- Contact Form -->
					
<body>




<div class="chat-container">
<section class="shop-detls ptb-100">
	<center><h1>Chatbot</h1></center>
	<div id="chat-container">
<div id="chat"></div>
<div id="options">
  <!--  <button id="option-hello">Hello</button> -->
	<button id="option-products">bonjour</button>
	<button id="option-order">événements</button>
	<button id="option-discounts">moyens de paiement</button>
	<button id="option-help">hébergement</button>
	<button id="option-scuba">visites guidées</button>

</div>
<center> <input type="text" id="user-input" placeholder="Ecrire ici..."></center>
</div>
</section>

</div>






				</div>
			</div>
		</div>
	</div>

	<!-- About -->
	<div class="about">
		<div class="container">
			<div class="row">
				<div class="col-lg-5">
					
					<!-- About - Image -->

					<div class="about_image">
						<img src="images/man.png" alt="">
					</div>

				</div>

				<div class="col-lg-4">
					
					<!-- About - Content -->

					<div class="about_content">
						<div class="logo_container about_logo">
							<div class="logo"><a href="#"><img src="images/logo.png" alt="">travelix</a></div>
						</div>
						<p class="about_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus quis vu lputate eros, iaculis consequat nisl. Nunc et suscipit urna. Integer eleme ntum orci eu vehicula iaculis consequat nisl. Nunc et suscipit urna pretium.</p>
						<ul class="about_social_list">
							<li class="about_social_item"><a href="#"><i class="fa fa-pinterest"></i></a></li>
							<li class="about_social_item"><a href="#"><i class="fa fa-facebook-f"></i></a></li>
							<li class="about_social_item"><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li class="about_social_item"><a href="#"><i class="fa fa-dribbble"></i></a></li>
							<li class="about_social_item"><a href="#"><i class="fa fa-behance"></i></a></li>
						</ul>
					</div>

				</div>

				<div class="col-lg-3">
					
					<!-- About Info -->

					<div class="about_info">
						<ul class="contact_info_list">
							<li class="contact_info_item d-flex flex-row">
								<div><div class="contact_info_icon"><img src="images/placeholder.svg" alt=""></div></div>
								<div class="contact_info_text">4127 Raoul Wallenber 45b-c Gibraltar</div>
							</li>
							<li class="contact_info_item d-flex flex-row">
								<div><div class="contact_info_icon"><img src="images/phone-call.svg" alt=""></div></div>
								<div class="contact_info_text">2556-808-8613</div>
							</li>
							<li class="contact_info_item d-flex flex-row">
								<div><div class="contact_info_icon"><img src="images/message.svg" alt=""></div></div>
								<div class="contact_info_text"><a href="mailto:contactme@gmail.com?Subject=Hello" target="_top">contactme@gmail.com</a></div>
							</li>
							<li class="contact_info_item d-flex flex-row">
								<div><div class="contact_info_icon"><img src="images/planet-earth.svg" alt=""></div></div>
								<div class="contact_info_text"><a href="https://colorlib.com">www.colorlib.com</a></div>
							</li>
						</ul>
					</div>

				</div>

			</div>
		</div>
	</div>

	<!-- Google Map -->
		
	<div class="travelix_map">
		<div id="google_map" class="google_map">
			<div class="map_container">
				<div id="map"></div>
			</div>
		</div>
	</div>

	<!-- Footer -->

	<footer class="footer">
		<div class="container">
			<div class="row">

				<!-- Footer Column -->
				<div class="col-lg-3 footer_column">
					<div class="footer_col">
						<div class="footer_content footer_about">
							<div class="logo_container footer_logo">
								<div class="logo"><a href="#"><img src="images/logo.png" alt=""></a></div>
							</div>
							<p class="footer_about_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus quis vu lputate eros, iaculis consequat nisl. Nunc et suscipit urna. Integer eleme ntum orci eu vehicula pretium.</p>
							<ul class="footer_social_list">
								<li class="footer_social_item"><a href="#"><i class="fa fa-pinterest"></i></a></li>
								<li class="footer_social_item"><a href="#"><i class="fa fa-facebook-f"></i></a></li>
								<li class="footer_social_item"><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li class="footer_social_item"><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li class="footer_social_item"><a href="#"><i class="fa fa-behance"></i></a></li>
							</ul>
						</div>
					</div>
				</div>

				<!-- Footer Column -->
				<div class="col-lg-3 footer_column">
					<div class="footer_col">
						<div class="footer_title">blog posts</div>
						<div class="footer_content footer_blog">
							
							<!-- Footer blog item -->
							<div class="footer_blog_item clearfix">
								<div class="footer_blog_image"><img src="images/footer_blog_1.jpg" alt="https://unsplash.com/@avidenov"></div>
								<div class="footer_blog_content">
									<div class="footer_blog_title"><a href="blog.html">Travel with us this year</a></div>
									<div class="footer_blog_date">Nov 29, 2017</div>
								</div>
							</div>
							
							<!-- Footer blog item -->
							<div class="footer_blog_item clearfix">
								<div class="footer_blog_image"><img src="images/footer_blog_2.jpg" alt="https://unsplash.com/@deannaritchie"></div>
								<div class="footer_blog_content">
									<div class="footer_blog_title"><a href="blog.html">New destinations for you</a></div>
									<div class="footer_blog_date">Nov 29, 2017</div>
								</div>
							</div>

							<!-- Footer blog item -->
							<div class="footer_blog_item clearfix">
								<div class="footer_blog_image"><img src="images/footer_blog_3.jpg" alt="https://unsplash.com/@bergeryap87"></div>
								<div class="footer_blog_content">
									<div class="footer_blog_title"><a href="blog.html">Travel with us this year</a></div>
									<div class="footer_blog_date">Nov 29, 2017</div>
								</div>
							</div>

						</div>
					</div>
				</div>

				<!-- Footer Column -->
				<div class="col-lg-3 footer_column">
					<div class="footer_col">
						<div class="footer_title">tags</div>
						<div class="footer_content footer_tags">
							<ul class="tags_list clearfix">
								<li class="tag_item"><a href="#">design</a></li>
								<li class="tag_item"><a href="#">fashion</a></li>
								<li class="tag_item"><a href="#">music</a></li>
								<li class="tag_item"><a href="#">video</a></li>
								<li class="tag_item"><a href="#">party</a></li>
								<li class="tag_item"><a href="#">photography</a></li>
								<li class="tag_item"><a href="#">adventure</a></li>
								<li class="tag_item"><a href="#">travel</a></li>
							</ul>
						</div>
					</div>
				</div>

				<!-- Footer Column -->
				<div class="col-lg-3 footer_column">
					<div class="footer_col">
						<div class="footer_title">contact info</div>
						<div class="footer_content footer_contact">
							<ul class="contact_info_list">
								<li class="contact_info_item d-flex flex-row">
									<div><div class="contact_info_icon"><img src="images/placeholder.svg" alt=""></div></div>
									<div class="contact_info_text">4127 Raoul Wallenber 45b-c Gibraltar</div>
								</li>
								<li class="contact_info_item d-flex flex-row">
									<div><div class="contact_info_icon"><img src="images/phone-call.svg" alt=""></div></div>
									<div class="contact_info_text">2556-808-8613</div>
								</li>
								<li class="contact_info_item d-flex flex-row">
									<div><div class="contact_info_icon"><img src="images/message.svg" alt=""></div></div>
									<div class="contact_info_text"><a href="mailto:contactme@gmail.com?Subject=Hello" target="_top">contactme@gmail.com</a></div>
								</li>
								<li class="contact_info_item d-flex flex-row">
									<div><div class="contact_info_icon"><img src="images/planet-earth.svg" alt=""></div></div>
									<div class="contact_info_text"><a href="https://colorlib.com">www.colorlib.com</a></div>
								</li>
							</ul>
						</div>
					</div>
				</div>

			</div>
		</div>
	</footer>

	<!-- Copyright -->

	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 order-lg-1 order-2  ">
					<div class="copyright_content d-flex flex-row align-items-center">
						<div><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
					</div>
				</div>
				<div class="col-lg-9 order-lg-2 order-1">
					<div class="footer_nav_container d-flex flex-row align-items-center justify-content-lg-end">
						<div class="footer_nav">
							<ul class="footer_nav_list">
								<li class="footer_nav_item"><a href="index.html">home</a></li>
								<li class="footer_nav_item"><a href="about.html">about us</a></li>
								<li class="footer_nav_item"><a href="flights.html">offers</a></li>
								<li class="footer_nav_item"><a href="blog.html">news</a></li>
								<li class="footer_nav_item"><a href="#">contact</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
<script src="js/contact_custom.js"></script>

<script>
        // Chatbot function
function botResponse(message) {
    var chat = document.getElementById("chat");
    var botMessage = document.createElement("div");
    botMessage.classList.add("bot-message");
    var botAvatar = document.createElement("div");
    botAvatar.classList.add("bot-avatar");
    botAvatar.innerHTML = <i class="fas fa-robot"></i>;
    botMessage.appendChild(botAvatar);
    var messageElement = document.createElement("div");
    messageElement.classList.add("message");
    messageElement.innerText = message;
    botMessage.appendChild(messageElement);
    chat.appendChild(botMessage);
}

function handleUserInput() {
    var input = document.getElementById("user-input").value.toLowerCase();
    var response = "";

    switch (input) {
    // Prompts existants
    case "bonjour":
        response = "Bonjour ! Comment puis-je vous aider aujourd'hui ?";
        break;
    case "comment ca va":
        response = "Je suis juste un robot, mais merci de demander !";
        break;
    case "quel est ton nom ?":
        response = "Je suis juste un robot, donc je n'ai pas de nom !";
        break;
    case "au revoir":
        response = "Au revoir ! Bonne journée !";
        break;
    case "aide":
        response = "Bien sûr, voici quelques choses que vous pouvez me demander :\n- Quels événements sont prévus en Tunisie ?\n- Quels sont les sites touristiques populaires en Tunisie ?\n- Comment puis-je réserver un voyage en Tunisie ?\n- Avez-vous des offres spéciales pour les voyages en Tunisie ?";
        break;
    case "événements":
        response = "Voici quelques événements à venir en Tunisie :\n- Festival International de Carthage\n- Festival de la Médina de Tunis\n- Festival de Jazz de Tabarka\n- Festival du Sahara à Douz\n- Festival International de Hammamet\nCes événements offrent une expérience culturelle riche et diversifiée !";
        break;
    case "sites touristiques":
        response = "La Tunisie regorge de sites touristiques fascinants, notamment :\n- Les ruines de Carthage\n- Le site archéologique de Dougga\n- La médina de Tunis\n- Le musée du Bardo\n- Les plages de Sousse\nCes endroits offrent une expérience unique pour les visiteurs !";
        break;
    case "réservation":
        response = "Pour réserver un voyage en Tunisie, vous pouvez contacter notre agence de voyage tunisienne au +216-XX-XXX-XXX ou envoyer un e-mail à contact@voyagetunisie.com. Nous serons ravis de vous aider à planifier votre séjour !";
        break;
    case "offres spéciales":
        response = "Nous proposons régulièrement des offres spéciales pour les voyages en Tunisie, notamment des réductions sur les forfaits tout compris, des séjours prolongés et des visites guidées gratuites. Assurez-vous de consulter notre site Web ou de nous contacter pour les dernières offres !";
        break;
    
    // Prompts supplémentaires
    case "moyens de paiement":
        response = "Nous acceptons divers moyens de paiement, notamment les cartes de crédit/débit (Visa, Mastercard, American Express), PayPal et les virements bancaires. Vous pouvez choisir l'option de paiement qui vous convient le mieux lors de la réservation.";
        break;
    case "visites guidées":
        response = "Nous proposons des visites guidées personnalisées pour découvrir les merveilles de la Tunisie en compagnie de guides expérimentés. Que vous souhaitiez explorer les sites historiques, les oasis du désert ou les villes côtières, nous avons une visite pour vous !";
        break;
    case "location de voitures":
        response = "Si vous avez besoin d'une voiture pour explorer la Tunisie à votre rythme, nous proposons également des services de location de voitures avec une gamme de véhicules adaptés à vos besoins. Contactez-nous pour réserver votre voiture dès maintenant !";
        break;
    case "hébergement":
        response = "Que vous recherchiez un hôtel luxueux, une villa privée ou un hébergement économique, notre agence de voyage tunisienne peut vous aider à trouver l'hébergement parfait pour votre séjour en Tunisie. Faites-nous savoir vos préférences et nous nous occuperons du reste !";
        break;
    case "circuit touristique":
        response = "Découvrez la beauté et la diversité de la Tunisie avec nos circuits touristiques soigneusement conçus. De l'exploration des vestiges antiques à la découverte des oasis cachées, nos circuits offrent une expérience inoubliable pour tous les voyageurs !";
        break;
    default:
        response = "Désolé, je n'ai pas compris votre demande.";
}



    // Add bot response to the chat
    botResponse(response);

    // Clear user input field
    document.getElementById("user-input").value = "";
}

function handleOptionClick(event) {
    var input = event.target.innerText.toLowerCase();
    document.getElementById("user-input").value = input;
    handleUserInput();
}

var options = document.querySelectorAll("#options button");
options.forEach(function(option) {
    option.addEventListener("click", handleOptionClick);
});

document.getElementById("user-input").addEventListener("keypress", function(e) {
    if (e.key === "Enter") {
        handleUserInput();
    }
});
    </script>



</body>

</html>