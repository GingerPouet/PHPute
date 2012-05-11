/*function visibilite(thingId){
    var targetElement;
    targetElement = document.getElementById(thingId) ;
    if (targetElement.style.display == "none"){
        targetElement.style.display = "inline" ;
    } else {
        targetElement.style.display = "none" ;
    }
}*/

$(function() {
    $( "#tabs" ).tabs();
});