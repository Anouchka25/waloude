<!DOCTYPE html>
<!-- saved from url=(0145)https://landing.eovi-mcd.fr/deces/?origine=2go&gclid=Cj0KCQiAvc_xBRCYARIsAC5QT9n1n_By2QMU2dpksR2SJ2bdgw1w5q_rNsxFe4XybO4hiYjrMrK05nQaAvAxEALw_wcB -->
<html lang="fr"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	
	<title>Waloude Prévoyance Décès</title>
	<link rel="stylesheet" href="./fichiers/main.min.css">
  
	<link rel="stylesheet" href="./fichiers/styles.css">
	<link rel="stylesheet" href="./fichiers/jquery-ui.css">
	<link href="./fonts/css/all.css" rel="stylesheet"> <!--load all styles -->
	<link rel="Shortcut icon" type="image/x-icon" href="./fichiers/favicon.png">

    <script src="./fichiers/jquery-1.12.4.js"></script>
    <script src="./fichiers/jquery-ui.js"></script>
    <script src"https://cdn.jsdelivr.net/npm/bulma-steps@2.2.1/dist/js/bulma-steps.min.js"></script>
   
    <script type="text/javascript" async="" src="./fichiers/analytics.js"></script>
    <script async="" src="./fichiers/gtm.js"></script>
    
	<script src="./fichiers/app.min.js" async="" defer=""></script>#}
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style type="text/css">
.ui-front{z-index:1000 !important;}
</style>


<script>
$(function() {
  $(document).ready( function() {
	// désactive le champs Ville
	$('#city').attr('disabled','disabled');
  });
  $('#city').focus( function() {
    // affecte l'autocompilation au champs Ville
	$(this).autocomplete('search', '');
  });
  // OnKeyDown Function - click
  $('#zipcode').keyup(function() {
    // valeur du champs Code Postal
    var zip_in = $(this);
    var zip_box = $('#zipcode');
    // erreur : si le code postal est supérieur à 5 caractères 
    if (zip_in.val().length < 5)
    {
      zip_box.addClass('error').removeClass('success');
    }
	// il faut taper 5 caractères pour afficher l'autocomplétion
    else if (zip_in.val().length == 5)
    {
      // active le champs Ville
	  $('#city').removeAttr('disabled');
	  $('#city').attr('required','required');
      // Création de la requette Code Postal
      $.ajax({ url: '../inc/zipcode/codePostalVille.php', cache: false,
        dataType: 'json',
        data: { CPostal: zip_in.val() },
		type: 'POST',
        success: function(result, success) {
		  // créé la liste des ville
		  suggestions = [];
          for (ii in result['localites'])
		  {
            suggestions.push(result['localites'][ii]['localite']);
          }
          $('#city').autocomplete({
		    source:suggestions,
			//delay:1,
			disabled:false,
			minLength:0
		  });
          if (suggestions.length > 0){
            $('#city').placeholder = suggestions[0];
          }
          zip_box.addClass('success').removeClass('error');
        },
		// s'il n'y a pas de ville trouvé
        error: function(result, success) {
          zip_box.removeClass('success').addClass('error');
        }
      });
    }
  });
});
</script>

<!-- Google Tag Manager -->

<!-- End Google Tag Manager -->
<link rel="stylesheet" type="text/css" href="./fichiers/cookieLevel.css">	
<style type="text/css">
@font-face {
  font-weight: 400;
  font-style:  normal;
  font-family: 'Inter-Loom';

  src: url('https://cdn.loom.com/assets/fonts/inter/Inter-UI-Regular.woff2') format('woff2');
}
@font-face {
  font-weight: 400;
  font-style:  italic;
  font-family: 'Inter-Loom';

  src: url('https://cdn.loom.com/assets/fonts/inter/Inter-UI-Italic.woff2') format('woff2');
}

@font-face {
  font-weight: 500;
  font-style:  normal;
  font-family: 'Inter-Loom';

  src: url('https://cdn.loom.com/assets/fonts/inter/Inter-UI-Medium.woff2') format('woff2');
}
@font-face {
  font-weight: 500;
  font-style:  italic;
  font-family: 'Inter-Loom';

  src: url('https://cdn.loom.com/assets/fonts/inter/Inter-UI-MediumItalic.woff2') format('woff2');
}

@font-face {
  font-weight: 700;
  font-style:  normal;
  font-family: 'Inter-Loom';

  src: url('https://cdn.loom.com/assets/fonts/inter/Inter-UI-Bold.woff2') format('woff2');
}
@font-face {
  font-weight: 700;
  font-style:  italic;
  font-family: 'Inter-Loom';

  src: url('https://cdn.loom.com/assets/fonts/inter/Inter-UI-BoldItalic.woff2') format('woff2');
}

@font-face {
  font-weight: 900;
  font-style:  normal;
  font-family: 'Inter-Loom';

  src: url('https://cdn.loom.com/assets/fonts/inter/Inter-UI-Black.woff2') format('woff2');
}
@font-face {
  font-weight: 900;
  font-style:  italic;
  font-family: 'Inter-Loom';

  src: url('https://cdn.loom.com/assets/fonts/inter/Inter-UI-BlackItalic.woff2') format('woff2');
}</style>

<style type="text/css">iframe#_hjRemoteVarsFrame {display: none !important; width: 1px !important; height: 1px !important; opacity: 0 !important; pointer-events: none !important;}</style></head>
<body class="lp_deces js-focus-visible" style="" cz-shortcut-listen="true">

	<!-- Google Tag Manager (noscript) -->

	<!-- End Google Tag Manager (noscript) -->

	<header>
		<div class="container">
    <div class="columns">
    		<div class="column is-four-fifths">
			<a href="{{ path('accueil')}}"><img class="logo-eovi" src="./fichiers/logo.png" width="300px"></a>
		</div>
    <div class="column">
			<button><a href="{{ path('app_login')}}">Formulaire de souscription</a></button>
		</div>

    </div>
		<nav class="navbar is-center" role="navigation" aria-label="main navigation">
      <div class="navbar-menu is-active">
    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
      <div class="navbar-start">
      <a class="navbar-item" href="{{ path('accueil')}}">Accueil</a></a>
				<a class="navbar-item" href="{{ path('waloude')}}">Waloude</a></a>
				<a class="navbar-item" href="{{ path('souscripteur_new')}}">Prévoyance</a></a>
      </div>
      <div class="navbar-end">  
				<a class="navbar-item" href="{{ path('faq_index')}}">FAQ</a></li>
				<a class="navbar-item" href="{{ path('team')}}">Contactez-nous</a></a>
      </div>
		</div>
    </nav>
		<div class="container">
    <div class="columns is-mobile">
      <div class="column is-11 is-offset-1">
		<h2 class="texte_defile">Avec Waloude ,mettez à l’abri ceux que vous aimez des conséquences financières d’un décès</h2>
	</div>
  </div>
  </div>
	</header>

<section class="section-form" style="background-image: url(../fichiers/img1.png) !important;">
    <div class="container">
        <div class="columns is-vbottom">
            <div class="column is-6 column-texte"><!--<p><span style='font-weight:500'>Aésio Prévoyance Décès</span><br><span style='font-weight:900'>Nous sommes le lien qui assurera l'avenir de vos proches</span></p><span class='arrow-texte icon-arrow-texte'></span>--></div>
            <div class="column is-6 column-form">
            
                <!--div class="form_body_message has-text-centered">
                    Nous vous remercions.<br> Votre demande a bien été prise en compte, un conseiller va vous recontacter dans les plus brefs délais.
                </div-->

                <div class="form_body">
                    <div class="titre_form">
                        <h1 style="font-size:29px;color:#5271ff;font-weight: 700;line-height:1em;">Waloude Prévoyance Décès</h1><p style="font-size:29px;color:#5271ff; line-height:1em; margin-bottom: 20px;">Nous sommes le lien qui assurera l'avenir de vos proches.</p>
                        <!-- <h2 style="font-size:19px;margin:10px 0px"><strong>Votre étude personnalisée</strong>, c'est simple et rapide !</h2> -->
                    </div>

    <form id="form" method="POST" action="form-data/formdata.php">
        <input type="hidden" name="regime" value="0">
        <input type="hidden" name="nbr_enfant" value="0">
        <input type="hidden" name="assure_conjoint" value="0">
        <input type="hidden" name="utm_campaign" id="utm_campaign" value="">
        <input type="hidden" name="utm_source" id="utm_source" value="">
        <input type="hidden" name="origine" id="origine" value="2go">
    <div class="columns is-gapless is-multiline">
            <!-- 	<div class="box_field column is-12 columns is-gapless">

                                <div class="column field-label is-narrow"><label class="label">Civilité *</label></div>
                            
            <div class="column field-input">

                                            <input class="requis is-checkradio is-small civilite" id="civilite_madame" type="radio" name="civilite" value="madame">
                        <label for="civilite_madame">Madame</label>
                                                <input class="requis is-checkradio is-small civilite" id="civilite_monsieur" type="radio" name="civilite" value="monsieur">
                        <label for="civilite_monsieur">Monsieur</label>
                                        
            </div>

        </div> -->
            <!-- 	<div class="box_field column is-12 columns is-gapless">

                                <div class="column field-label is-narrow"><label class="label">Nom *</label></div>
                            
            <div class="column field-input">

                                        <input id="nom" name="nom" value="" class="input requis" type="text">
            
                
            </div>

        </div> -->
                <div class="box_field column is-12 columns is-gapless">

                                <div class="column field-label is-narrow"><label class="label">Prénom *</label></div>
                            
            <div class="column field-input">

                                        <input id="prenom" name="prenom" value="" class="input requis" type="text">
            
                
            </div>

        </div>
                <div class="box_field column is-12 columns is-gapless">

                                <div class="column field-label is-narrow"><label class="label">Email *</label></div>
                            
            <div class="column field-input">

                                        <input id="email" name="email" value="" class="input requis" type="email">
                
            </div>

        </div>
                <div class="box_field column is-6 columns is-gapless">

                                <div class="column field-label is-narrow"><label class="label">Téléphone *</label></div>
                            
            <div class="column field-input">

                                        <input id="telephone" value="" name="telephone" placeholder="__________" class="input requis tel mask" type="text">
            
                
            </div>

        </div>
                <!-- <div class="box_field column is-6 columns is-gapless">

                                <div class="column field-label is-narrow"><label class="label">Né(e) le *</label></div>
                            
            <div class="column field-input">

                                        <input id="naissance" value="" name="naissance" placeholder="__/__/____" class="input requis date_naissance mask" type="text">
            
                
            </div>

        </div>
                <div class="box_field column is-6 columns is-gapless">

                                <div class="column field-label is-narrow"><label class="label">Code postal *</label></div>
                            
            <div class="column field-input">

                                        <input id="zipcode" name="zipcode" value="" placeholder="_____" class="input requis cp mask" type="text">
            
                
            </div>

        </div>
                <div class="box_field column is-6 columns is-gapless">

                                <div class="column field-label is-narrow"><label class="label">Ville </label></div>
                            
            <div class="column field-input">

                                        <input id="city" name="city" value="" class="input " type="text" disabled="disabled">
            
                
            </div>

        </div> -->
                <div class="box_field column is-12 marge_check columns is-gapless">

                            
            <div class="column field-input">

                                        <input id="accepte" class="is-checkradio is-small" type="checkbox" name="accepte">
                    <label for="accepte" class="no_label mention">J'accepte d'être contacté(e) par Waloude à des fins commerciales, d'information ou d'enquête. À l'occasion de chaque envoi, j'aurai la possibilité de mettre fin à ces communications.</label>
                
            </div>

        </div>
                <div class="box_field column is-12 columns is-gapless">

                            
            <div class="column field-input">

                                        <div class="column has-text-centered container_bouton">
                        <button class="button " style="background:#5271ff;" type="submit"><span class="text">Rappelez-moi</span><span class="icon is-small"><i class="fas fa-arrow-right"></i></span>
                        </button>
                    </div>
                
            </div>

        </div>
        </div>
</form>
                    <div class="field champ_obligatoire has-text-centered">* Champs obligatoires</div>
                    <div class="souscrire has-text-centered"><a href="#">Souscrire maintenant</a></div>

                </div>
            </div>
        </div>
    </div>
</section>


<section class="section-texte-image">
<div class="container container-padding">
    <div class="columns columns-vcenter">
        <div class="column is-7 texte">

<p class="big" style="margin-bottom:40px;"><strong>Protéger l’avenir de votre famille, c’est essentiel avec waloude Prévoyance Décès</strong></p>

<p><strong>Même s’il est difficile d’y penser, que se passerait-il si vous veniez à disparaître ?</strong></p>
<p style="margin-bottom:20px;">Vos proches pourront-ils assurer les frais de rapatriement  ? Comment assurer les démarches administratifs ?comment assurer la logistique une fois arriver ,comment assurer les obsèques? ...</p>



<p><strong>On ne peut pas prévenir sa disparition mais il est possible de préserver l’avenir de ses proches, dès maintenant !</strong></p>

<p style="margin-bottom:20px;">Douleur morale, pertes de revenus, dépenses imprévues…. un décès est toujours compliqué à gérer et remet en cause l’équilibre d'une famille.</p>

<p ><strong style="text-align: justify;">Avec l'offre waloude Prévoyance Décès, vous mettez à l’abri ceux que vous aimez des conséquences financières d’un décès prématuré, par accident ou maladie, grâce au versement d’un capital décès.</strong></p>


</div>
        <div class="column is-5 has-text-centered">
            <table>
                <tr style="height: 100px;" >
                    <td style="padding-right: 20px;">
                    <i class="fas fa-check"></i>
                   </td>
                <td>Prise d’effet immédiate des garanties</td>
                </tr>
                <tr style="height: 100px;" >
                    <td>
                    <i class="fas fa-check"></i>
                   </td>
                <td>Liberté de choix <strong> bénéficiaires</strong></td>
                </tr>
                <tr style="height: 100px;" >
                    <td>
                    <i class="fas fa-check"></i>
                   </td>
                <td>Prise en charge des formalités administrative</td>
                </tr>
                <tr style="height: 100px;" >
                    <td>
                    <i class="fas fa-check"></i>
                   </td>
                <td>Rapatriement du corps</td>
                </tr>
                <tr style="height: 100px;" >
                    <td>
                    <i class="fas fa-check"></i>
                   </td>
                <td>Mise en disposition d’un véhicule funèbre</td>
                </tr>
            </table>
        </div>
    </div>
</div>
</section>	

<section class="section-texte-image">
<div class="container container-padding">
    <div class="columns columns-vcenter">
        <div class="column is-7 texte">

<p class="big" style="margin-bottom:40px; margin-right: 30px; text-align: justify;"><strong>Avec l’offre  Prévoyance Décès, vous mettez à l’abri ceux que vous aimez, grâce au versement d'un capital décès.</strong></p>

    <p style="height: 70px; font-weight: bold; color: #5271ff ; font-size: xx-large;"> Bonnes raisons de souscrire maintenant :</p>
</p>
<table>
    <tr style="height: 100px;" >
        <td style="padding-right: 20px;">
            <i class="fas fa-mouse-pointer"></i>
       </td>
    <td>
        Des garanties avec prise d’effet immédiate(1).</strong>
        </td>
    </tr>
    <tr style="height: 100px;" >
        <td>
            <i class="fas fa-mouse-pointer"></i>
       </td>
    <td><strong>Couverture quelle qu'en soit la cause :</strong> maladie ou accident, vie privée ou professionnelle.</td>
    </tr>
    <tr style="height: 100px;" >
        <td>
            <i class="fas fa-mouse-pointer"></i>
       </td>
    <td>Une souscription facilitée sur <strong>simple déclaration de santé(2)</strong>
    </td>
    </tr>
    <tr style="height: 100px;" >
        <td>
            <i class="fas fa-mouse-pointer"></i>
       </td>
    <td>Des prestations d’<strong>assistance</strong> incluses.
    </td>
    </tr>
    <tr style="height: 100px;" >
        <td>
            <i class="fas fa-mouse-pointer"></i>
       </td>
    <td>Liberté de <strong>choix des bénéficiaires</strong></td>
    </tr>
</table>
</div>
    <div class="col-md-5 right-column pointsforts">
    <!-- <img src="fichiers/pointsforts.png"> -->

    <table>
        <caption style="margin-bottom: 30px; margin-top: 20px; color: #5271ff; font-weight: bold; font-size: xx-large;">Les points forts</caption>
        
        <tr style="height: 100px;" >
            <td style="padding-right: 20px;">
                <img src="./fichiers/icone.png" alt="" width="55" height="55"></i>
           </td>
        <td>
            Pas de formalités médicales
            </td>
        </tr>

        <tr style="height: 100px;" >
            <td style="padding-right: 20px;">
                <img src="./fichiers/icone.png" alt="" width="55" height="55"></i>
           </td>
        <td>
            Des volontés respectées.
            </td>
        </tr>

        <tr style="height: 100px;" >
            <td style="padding-right: 20px;">
                <img src="./fichiers/icone.png" alt="" width="55" height="55"></i>
           </td>
        <td>
            Des garanties qui s’adaptent au coût des obsèques.
            </td>
        </tr>

        <tr style="height: 100px;" >
            <td style="padding-right: 20px;">
                <img src="./fichiers/icone.png" alt="" width="55" height="55"></i>
           </td>
        <td>
            Assistance immédiate pour vous et vos proches.
            </td>
        </tr>

        <tr style="height: 100px;" >
            <td style="padding-right: 20px;">
                <img src="./fichiers/icone.png" alt="" width="55" height="55"></i>
           </td>
        <td>
            Capital versé au(x) bénéficiaire(s) de votre choix.
            </td>
        </tr>

        <tr style="height: 100px;" >
            <td style="padding-right: 20px;">
                <img src="./fichiers/icone.png" alt="" width="55" height="55"></i>
           </td>
        <td>
            Des garanties modifiables à tout moment.
            </td>
        </tr>
    </table>                                                    
    </div>
</div>
</section>	

<section class="section-texte-image">
<h2  class="container" style="margin-bottom: 20px; color:#5271ff; font-size: xx-large; font-weight: bold; ">En bref : nos formules et garanties Assurance </h2>
<div class="container container-padding">
    <div class="columns columns-vcenter">
        <div class="column is-4 texte nosformules">
            <p>Rapatriement du corps<br><br>
                Prise en charge total<br><br>
                Démarches administratives<br>
                </p>
        </div>
        
        <div class="column is-4 texte nosformules ">
            <p>Arriver au pays<br><br>
                Mise en disposition véhicule funèbre<br><br>
                </p>
        </div>
        
        <div class="column is-4 texte nosformules ">
            <p>Versé au(x) bénéficiaire(s) désigné(s)
                La somme de 1 Million de CFA 
                </p>
        </div>

</div>
</section>

	<footer>
		<div class="container">
			<div class="columns">
				<div class="column is-5">Waloude assurance décès. 2020 Tous droits réservés</div>
				<div class="column is-7 has-text-right"><a href="{{ path('accueil">Mentions légales</a> | <a href="{{ path('accueil">Réglements et statuts</a> | <a href="{{ path('politique-de-confidentialite" target="_blank">Protection des données</a> | <a onclick="openCookieLevelPopIn()" style="cursor:pointer;">Gestion des cookies</a></div>
			</div>
		</div>

		<div class="container">
				<div class="column is-12 has-text-right">
					<span>Suivez-nous sur:</span>
					<a href="#"><i class="fab fa-facebook"></i></a>
					<a href="#"><i class="fab fa-twitter"></i></i></a>
					<a href="#"><i class="fab fa-linkedin"></i></a>
					<a href="#"><i class="fab fa-youtube"></i></a>
				</div>
			</div>
		</div>
	</footer>

<!-- Div #1 -->
        <div id="popinrgpd">
            <div id="popinrgpdtitle"></div>
            <p id="popinrgpdfirstp"></p>
            <p id="popinrgpdsecondp"></p>
            <!--hr-->
            <div id="bgwrapper">
                <div id="level3" class="level">
                    <div id="level3h2" class="headerlevel"></div>
                    <div class="corelevel">
                        <ul>
                            <li id="levelthreefirstli"></li>
                            <li id="levelthreesecondli"></li>
                            <li id="levelthreethirdli"></li>
                        </ul>
                        <div onclick="setCookieLevel(&#39;level3&#39;);closeCookieLevelPopIn();window.location.reload();" class="choisirlevel"></div>
                    </div>
                </div>
                <div id="level2" class="level">
                    <div id="level2h2" class="headerlevel"></div>
                    <div class="corelevel">
                        <ul>
                            <li id="leveltwofirstli"></li>
                            <li id="leveltwosecondli"></li>
                            <li id="leveltwothirdli"></li>
                        </ul>   
                        <div onclick="setCookieLevel(&#39;level2&#39;);closeCookieLevelPopIn();window.location.reload();" class="choisirlevel"></div>
                    </div>
                </div>
                <div id="level1" class="level">
                    <div id="level1h2" class="headerlevel"></div>
                    <div class="corelevel">
                        <ul>
                            <li id="levelonefirstli"></li>
                            <li id="levelonesecondli"></li>
                            <li id="levelonethirdli"></li>
                        </ul>
                        <div onclick="setCookieLevel(&#39;level1&#39;);closeCookieLevelPopIn();window.location.reload();" class="choisirlevel"></div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>

        <!-- Div #2 -->
        <div onclick="closeCookieLevelPopIn();" id="greybg"></div>

        <!-- Div #3 -->
        <div id="bandeaurgpd" style="display: none;">
            <p>Ce site web utilise des cookies afin d'optimiser l'expérience utilisateur. En naviguant sur le site, vous acceptez l'usage de ces cookies.</p>
            <div onclick="setCookieLevel(&#39;level3&#39;);closeCookieLevelBand();dataLayer.push({&#39;event&#39;:&#39;level3&#39;});" class="boutonrgpd">Accepter</div>
            <div onclick="closeCookieLevelBand();openCookieLevelPopIn()" class="lienrgpd">En savoir plus</div>
            <div onclick="closeCookieLevelBand()" id="croixrgpd" class="boutonrgpd">X</div>
        </div>


</html>
