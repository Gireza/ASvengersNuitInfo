$(".fr").click(function () {
    titre1 = "Bonjour tout le monde"
    para1 = "Bonjour et bienvenue sur le meilleur site web de la nuit de l'informatique. Sur ce site, vous allez pouvoir rechercher des gens qui ont disparue en mer et qui ont peut etre été sauvé par des gens gentils. "
    changeValeurLangue('#t1', titre1)
    changeValeurLangue('#p1', para1)
})
$(".en").click(function () {
    titre1 = "Hello everyone"
    para1 = "Hello and welcome to the best website of the computer night. On this site, you will be able to search for people who have disappeared at sea and who may have been saved by nice people."
    changeValeurLangue('#t1', titre1)
    changeValeurLangue('#p1', para1)
})
$(".es").click(function () {
    titre1 = "Hola a todos"
    para1 = "Hola y bienvenidos a la mejor página web de la noche informática. En este sitio podrá buscar a las personas desaparecidas en el mar que hayan podido ser salvadas por gente amable."
    changeValeurLangue('#t1', titre1)
    changeValeurLangue('#p1', para1)
})
$(".it").click(function () {
    titre1 = "Ciao a tutti"
    para1 = "Ciao e benvenuto nel miglior sito web della notte del computer. Su questo sito potrete cercare le persone che sono scomparse in mare e che possono essere state salvate da persone simpatiche."
    changeValeurLangue('#t1', titre1)
    changeValeurLangue('#p1', para1)
})
$(".dark_mode").click(function () {
    $("body").css("background-color", "rgb(17, 33, 37)").css("transition-duration", "3s")
   // $("body").css("background","radial-gradient(ellipse at center, rgb(95, 95, 91) 0%, rgb(109, 108, 97) 35%, #303b3b 100%)").css("transition-duration", "3s")
    $(".dark_mode").css("visibility", "hidden")
    $(".light_mode").css("visibility", "visible")
    $("h1,p,.light").css("background-color", "#18677c").css("color", "white").css("transition-duration", "3s")
})
$(".light_mode").click(function () {
    $("body").css("background-color", "rgb(127, 229, 255)").css("transition-duration", "3s")
  //  $("body").css("background","radial-gradient(ellipse at center, rgba(255,254,234,1) 0%, rgba(255,254,234,1) 35%, #B7E8EB 100%)").css("transition-duration", "3s")
    $(".light_mode").css("visibility", "hidden")
    $(".dark_mode").css("visibility", "visible")
    $("h1,p,.light").css("background-color", "#18677c").css("color", "white").css("transition-duration", "3s")
})

$("img").mouseenter(function () {
    $(this).css("filter", "grayscale(80%)")
})
$("img").mouseleave(function () {
    $(this).css("filter", "grayscale(0%)")
})


var mdp = [];
document.addEventListener('keyup', (event) => {
    if(mdp[mdp.length-1] === "r" && mdp[mdp.length-2] == "o" && mdp[mdp.length-3] == "t" 
&& mdp[mdp.length-4] == "c" && mdp[mdp.length-5] == "e" && mdp[mdp.length-6] == "h"){
        document.location.href="secret.php"
    }
})
// rajoute les touches préssées dans un tableau 
document.addEventListener('keydown', (event) => {
    const nomTouche = event.key;
        mdp.push(nomTouche);      

        return;        
}, false);






function changeValeurLangue(t1, titre1) {
    $(t1).html(titre1);
}

$(".fr").click(function () {
    titre1 = "Bienvenue dans le côté sombre du site"
    para1 = "Bonjour et bienvenue sur le meilleur site web de la nuit de l'informatique. Sur ce site, vous allez pouvoir rechercher des gens qui ont disparue en mer et qui ont peut etre été sauvé par des gens gentils. "
    changeValeurLangue('#t666', titre1)
    changeValeurLangue('#p666', para1)
})
$(".en").click(function () {
    titre1 = "Welcome to the dark side of the site"
    para1 = "Hello and welcome to the best website of the computer night. On this site, you will be able to search for people who have disappeared at sea and who may have been saved by nice people."
    changeValeurLangue('#t666', titre1)
    changeValeurLangue('#p666', para1)
})
$(".es").click(function () {
    titre1 = "Bienvenido al lado oscuro del sitio"
    para1 = "Hola y bienvenidos a la mejor página web de la noche informática. En este sitio podrá buscar a las personas desaparecidas en el mar que hayan podido ser salvadas por gente amable."
    changeValeurLangue('#t666', titre1)
    changeValeurLangue('#p666', para1)
})
$(".it").click(function () {
    titre1 = "Benvenuto nel lato oscuro del sito"
    para1 = "Congratulazioni per essere arrivati fin qui, ma questo è solo l'inizio..."
    changeValeurLangue('#t666', titre1)
    changeValeurLangue('#p666', para1)
})