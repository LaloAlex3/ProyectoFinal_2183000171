function validarForm(){
    var nombre = document.querySelector('#nombre').value;
    var apP = document.querySelector('#apP').value;
    var apM = document.querySelector('#apM').value;
    
    if(nombre.length == 0){
        alert("Ingresa el nombre del Autor");
        return;
    }
    guardarAutor();
}

function guardarAutor(){
    fetch("../Controlador/insertaAutorDAO.php", {
        method: "POST",
        body: new FormData(formAutor),
      })
        .then((response) => response.text())
        .then((response) => {
          console.log(response);
          if (response == " ok") {
            alert("Autor Almacenado Correctamente");
            window.location.href = "3fomularioAutor.html";
          }
        });
}

let registros = document.querySelector("#registros");

function cargarAutores_Almacenados(){
      $.ajax({
          type: "GET", 
          url: "../Controlador/listarAutores.php", 
          success: function (response) {
            const tipos = JSON.parse(response); 
              tipos.forEach((element) => {
                // console.log(element.idTM);
                // console.log(element.descrip);
                var div = document.createElement('div');
                div.className = 'row align-items-start border border-success';
                div.innerHTML = `<div class="col-md-2 ">
                                      <h4>${element.idAutor}</h4>
                                  </div>
                                  <div class="col-md-3">
                                      <h4>${element.Nombre}</h4>
                                  </div>
                                  <div class="col-md-3">
                                      <h4>${element.ApP}</h4>
                                  </div>
                                  <div class="col-md-3">
                                      <h4>${element.ApM}</h4>
                                  </div>
                                  `;
                registros.appendChild(div);
              }); 
          },
        });
  }

cargarAutores_Almacenados();