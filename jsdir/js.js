'use strict'


   
// Eventos

// Raton
var boton = document.getElementById("boton");
//var boton = document.querySelector("#boton");
// boton.style.background = "red";
//boton.style.padding = "10px";
//boton.style.border = "2px solid #hhh";


function cambiarColor(){
    // console.log("color: " + boton.style.backgroundColor);
	var bg = boton.style.backgroundColor;
	if (bg == "green"){
		boton.style.backgroundColor = "blue";
	}
	else {
		boton.style.backgroundColor = "green";
	}
	return true;
};
// Click
// boton.addEventListener('click', function(){
// 	cambiarColor();
// });
// // Mouse Over (Raton sobre el elemento)
// boton.addEventListener('mouseover', function(){
// 	boton.style.backgroundColor = "yellow";
// });
// // Mouse Out (Raton sale del elemento)
// boton.addEventListener('mouseout', function(){
// 	boton.style.backgroundColor = "red";
// });
// ----------------------------------------------------------------
// Elementos del teclado y el focus

var input = document.querySelector("#campo_nombre");

// focus
input.addEventListener('focus', function(){
	input.style.backgroundColor = "yellow";
});
input.addEventListener('focusout', function(){
	input.style.backgroundColor = "white";
});
// blur
input.addEventListener('blur', function(){
	console.log("Has salido del campo");
});
// keydown (Escribiendo en el form campo nombre lo probamos
input.addEventListener('keydown', function(event){
	console.log("[keydown] ",event.keyCode);
	console.log("[keydown] Has pulsado esta tecla: ", String.fromCharCode(event.keyCode));
});
// keypress (Escribiendo en el form campo nombre lo probamos) "Ojo en firefox funciona con which"
input.addEventListener('keypress', function(event){
	if (event.keyCode) {
		console.log("[keypress] Estas presionando esta tecla (keyCode): ", String.fromCharCode(event.keyCode));		
	}
	else {
		console.log("[keypress] Estas presionando esta tecla (which): ", String.fromCharCode(event.which));		
	}
	
	
});

 // var x = event.which || event.keyCode;
 // function para obtener el navegador
var getBrowserInfo = function() {
    var ua= navigator.userAgent, tem, 
    M= ua.match(/(opera|chrome|safari|firefox|msie|trident(?=\/))\/?\s*(\d+)/i) || [];
    if(/trident/i.test(M[1])){
        tem=  /\brv[ :]+(\d+)/g.exec(ua) || [];
        return 'IE '+(tem[1] || '');
    }
    if(M[1]=== 'Chrome'){
        tem= ua.match(/\b(OPR|Edge)\/(\d+)/);
        if(tem!= null) return tem.slice(1).join(' ').replace('OPR', 'Opera');
    }
    M= M[2]? [M[1], M[2]]: [navigator.appName, navigator.appVersion, '-?'];
    if((tem= ua.match(/version\/(\d+)/i))!= null) M.splice(1, 1, tem[1]);
    return M.join(' ');
};
var cual = getBrowserInfo();
console.log("El navegador actual es: " + cual);

