// *********************************** //
// ************ Settings ************* //
// *********************************** //

// We set the consent level cookie name
cookieName = 'bandeaurgpd';

// Levels
cookieLevelValues = ['level1', 'level2', 'level3'];

// *********************************** //
// *********** Functions ************* //
// *********************************** //

// Create and set a cookie
function setCookie(cookieName,cookieValue,nDays) {

    var today = new Date();
    var expire = new Date();
    if (nDays==null || nDays==0) nDays=1;
    expire.setTime(today.getTime() + 3600000*24*nDays);
    document.cookie = cookieName + "=" + escape(cookieValue) + ";expires="+expire.toGMTString();

}
    
// Set a level value
function setCookieLevel(level) {

    setCookie(cookieName, level, 395);

}

// Read the cookie. Return false if the cookie doesn't exist.
function getCookie(cookieName) {

    var cookieRegex = new RegExp('^(?:.*;)?\\s*' + cookieName + '\\s*=\\s*([^;]+)(?:.*)?$');
        return (document.cookie.match(cookieRegex)||[,false])[1];

}

// Return a human readeable level value
function getCookieLevel(cookieValue) {

    if (cookieValue === 'level1') {
        return 'Minimal';
    }

    else if (cookieValue === 'level2') {
        return 'Intermédiaire';
    }

    else if (cookieValue === 'level3') {
        return 'Optimal';
    }

    else {
        return 'Inconnu';
    }

}

// Open the Cookie Level Band
function openCookieLevelBand() {

    document.getElementById("bandeaurgpd").style.display = "block";

}

// Close the Cookie Level Band
function closeCookieLevelBand() {

    document.getElementById("bandeaurgpd").style.display = "none";

}

// Close the Cookie Level PopIn
function closeCookieLevelPopIn() {

    document.getElementById("popinrgpd").style.visibility = "hidden";
    document.getElementById("greybg").style.visibility = "hidden";
	
}

// Open the Cookie Level PopIn
function openCookieLevelPopIn() {

    // Go back to the top page
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera

    // We get the window size
    var windowWidth = window.innerWidth;
    var windowHeight = window.innerHeight;

    // We set the background height size and make it visible
    document.getElementById("greybg").style.height = windowHeight + "px";
    document.getElementById("greybg").style.visibility = "visible";

    // Highligth the actual level value
    var theLevel = getCookie(cookieName);

    if (document.getElementById(theLevel) !== null) {

        document.getElementById(theLevel).style.boxShadow = '0px 0px 9px 0px rgba(153,153,153,1)';
    
    }

    // Push the text in the different nodes (prevent SEO side effects)

    document.getElementById("popinrgpdtitle").innerText = "Règle de gestion des cookies";

    document.getElementById("popinrgpdfirstp").innerText = "Afin de vous garantir une expérience optimale sur notre site, nous utilisons des cookies. Ces derniers ont plusieurs usages. Tout d'abord un usage d'ordre technique et fonctionnel. Ces cookies sont indispensables au bon fonctionnement de notre site. Ensuite, nous utilisons des cookies statistiques. Ces cookies vont permettre de mesurer l'audience et de mieux comprendre comment nos internautes inter-agissent avec notre site et nous permettent également de mieux analyser nos canaux d'acquisition. Enfin, les cookies marketing et publicitaires. Ces cookies servent à mieux cibler notre audience dans le cadre de la publicité on-line. Cela permet d'afficher des produits que vous avez visités sur notre site dans des encadrés publicitaires sur des sites partenaires. Cela permet également d'identifier nos utilisateurs clients afin de ne pas afficher à nouveau de la publicité lors de votre navigation.";

    document.getElementById("popinrgpdsecondp").innerText = "Nous proposons trois niveaux d'acceptation des cookies. Nous vous conseillons de conserver le premier niveau, qui permet de profiter d'une expérience optimale sur notre site.";

    document.getElementById("level3h2").innerText = "Niveau optimal";
    document.getElementById("levelthreefirstli").innerText = ' Cookies fonctionnels et techniques présents. Le site est fonctionne correctement, conformément aux attentes.';
    document.getElementById("levelthreesecondli").innerText =' Cookies statistiques présents. Des améliorations sur le site web et sur nos produits sont en permanence réalisées grâce à l\'analyse des données statistiques et anonymes.';
    document.getElementById("levelthreethirdli").innerText =' Cookies publicitaires et marketing présents. Les campagnes publicitaires gagnent en pertinence grâce à un meilleur ciblage sur notre site et sur les sites de nos partenaires.';

    document.getElementById("level2h2").innerText = "Niveau intermédiaire";
    document.getElementById("leveltwofirstli").innerText =' Cookies fonctionnels et techniques présents. Le site est fonctionne correctement, conformément aux attentes.';
    document.getElementById("leveltwosecondli").innerText = ' Cookies statistiques présents. Des améliorations sur le site web et sur nos produits sont en permanence réalisées grâce à l\'analyse des données statistiques et anonymes.';
    document.getElementById("leveltwothirdli").innerText = ' Cookies publicitaires et marketing absents. Vous ne participerez pas à l\'amélioration du ciblage des campagnes publicitaires. Les publicités visualisées perdront en pertinence.';

    document.getElementById("level1h2").innerText = "Niveau minimal";
    document.getElementById("levelonefirstli").innerText = ' Cookies fonctionnels et techniques présents. Le site est fonctionne correctement, conformément aux attentes.';
    document.getElementById("levelonesecondli").innerText = ' Cookies statistiques absents. Vous ne participez pas à l\'amélioration du site web et de nos produits que nous menons grâce à l\'analyse des données statistiques et anonymes.';
    document.getElementById("levelonethirdli").innerText = ' Cookies publicitaires et marketing absents. Vous ne participerez pas à l\'amélioration du ciblage des campagnes publicitaires. Les publicités visualisées perdront en pertinence.';

    var choisirLevel = document.getElementsByClassName("choisirlevel");

    for (i = 0; i < choisirLevel.length; i++) {

        choisirLevel[i].innerText = 'Je choisis ce niveau';

    }

    // Make the popin visible
    document.getElementById("popinrgpd").style.visibility = "visible";

}

// Make dataLayer.push based on the Cookie Level value
function pushCookieLevels(cookieValue) {

    var level = 0;

    if (cookieValue === 'level1') {
        level = 1;
    }

    else if (cookieValue === 'level2') {
        level = 2;
    }

    else if (cookieValue === 'level3') {
        level = 3;
    }

    if (typeof dataLayer !== 'undefined' && dataLayer !== null) {

        for (i = level; i > 0; i--) {
            var level = 'level' + i;
            dataLayer.push({
                'event': level
            });
        }

    }

}

// **************************************** //
// *********** Initialazation ************* //
// **************************************** //

// Check if the Level Cookie exist.
var cookieLevel = getCookie(cookieName);

// If not, it will create it and display the Cookie Level Band.
if (!cookieLevel) {

    setCookieLevel('level2');
    cookieLevel = getCookie(cookieName);
    openCookieLevelBand();

}

// Finally, we push the dataLayer events
pushCookieLevels(cookieLevel);