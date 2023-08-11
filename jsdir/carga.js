window.addEventListener("load", function(event){  
  var valor = "";
  //alert ("Entro");
    $.ajax({
        url: "./cargaserv.php",
        method:"POST",
        data: {"valor": valor},
        }).done(function(respuesta) {           
            jsonObject=JSON.parse(respuesta);            
            for (var i=0; i< jsonObject.length; i++)  {  
              //Para obtener el objeto de tu lista  
              var fila = jsonObject[i];  
              var parent = document.getElementById("content");     
              // Crear un nuevo elemento article
              var article = document.createElement("article");
              // Crear un nuevo elemento div
              var div1 = document.createElement("div");
              div1.classList.add("image-wrap"); 
              
              // Crear un nuevo elemento img
              var img = document.createElement("img");
              
              img.src = "./img/"+fila.serv_imagen;
              img.alt = "Descripción de la imagen";

              // Crear un nuevo elemento div
              var div2 = document.createElement("div");
              div2.classList.add("article-text"); 

              // Crear un nuevo elemento h2
              var h2 = document.createElement("h2");
              // h2.classList.add("subheader");

              var title = document.createTextNode(fila.serv_nombre);
              h2.appendChild(title);
              
              // Crear un nuevo elemento p
              var p = document.createElement("p");
              var text = document.createTextNode(fila.serv_descripcion);
              p.appendChild(text);

              // Agregar los nuevos elementos al artículo       
              div2.appendChild(h2);
              div2.appendChild(p);

              div1.appendChild(img);
              div1.appendChild(div2);
              // Agregar el nuevo artículo al final de la lista
              parent.appendChild(div1);
              parent.appendChild(article);          
            } 
         });
})  ;