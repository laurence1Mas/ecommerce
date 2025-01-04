function addition(){
    var nbr1= parseInt(document.getElementById("nombre1").value) ;
    var nbr2=parseInt(document.getElementById("nombre2").value);
    var somme=nbr1+nbr2;
    document.getElementById("resultat").value=somme;
}

function plusgrand (){
    var  nbr1= parseInt(document.getElementById("nombre1").value) ;
    var  nbr2=parseInt(document.getElementById("nombre2").value);
    if(!isNaN (nbr1) && !isNaN (nbr2)){
        var plusgrangNbr= nbr1 > nbr2 ? nbr1 : nbr2;
        // affichage du resulat
        document.getElementById("resultat").innerText="le plus grand nombre est : " +plusgrangNbr;
    }
    else{
        alert ("svp veuillez completer les champs");
    }
}
function traduction(){
    var jours= document.getElementById("jour").value.toLowerCase();
    var jourtraduction ={
        "lundi":"Monday",
        "mardi":"Tuesday",
        "mercredi":"Wednesday",
        "jeudi":"Thursday",
        "vendredi":"Friday",
        "samedi":"Saturday",
        "dimanche":"Sunday"
    };
    if(jourtraduction.hasOwnProperty(jours)){
        document.getElementById("resultat").innerText= "la traduction de "+jours + " est de : "+ jourtraduction[jours] + ".";
    }
    else{
        alert ("svp veuillez completer un jour valide");
    }
}
function User (){
    var  nom= document.getElementById("nom").value.toLowerCase() ;
        document.getElementById("resultat").innerText="Nous vous souhaitons un bienvenu tres cher(e): " +nom;
}
function nbrpaire (){
    var  nbr1= parseInt(document.getElementById("nombre1").value) ;
    if(!isNaN(nbr1)){
         var result= (nbr1 % 2 ===0) ? "pair" : "impair";
        // affichage du resulat
        document.getElementById("resultat").innerText="le chiffre : " +nbr1 +"  est "+ result+ ".";
    }
    else{
        alert ("veuiller completer les champs");
    }
}
function ppcmcalc (){
    var  nbr1= parseInt(document.getElementById("nombre1").value) ;
    var  nbr2=parseInt(document.getElementById("nombre2").value);
    if(!isNaN (nbr1) && !isNaN (nbr2)){
        var ppcm= (nbr1 * nbr2) /pgcd(nbr1,nbr2);
        document.getElementById("resultat").innerText=" le ppcm de "+nbr1+" et " +nbr2+ " est : "+ppcm;
    }
    else{
        alert ("svp veuillez completer les champs");
    }
}
function pgcd(a,b){
    return b ===0 ? a :pgcd(b,a % b);
}
function sinCos(){
    var angle= parseFloat(document.getElementById("nombre1").value);
    if(!isNaN(angle)){
        var angleenRadians=(angle * Math.PI)/180;
        var sinus= Math.sin(angleenRadians);
        var cosinus= Math.cos(angleenRadians);
        //affichage
        document.getElementById("resultat").innerText= "pour l'angle " +angle+ " degres : \n"+"Sinus: "+sinus+"\n"+"cosinus: "+cosinus;

    }
    else{
        alert ("svp entrer une angle valide");
    }
}