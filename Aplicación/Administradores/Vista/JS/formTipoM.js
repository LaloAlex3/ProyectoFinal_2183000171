function validarForm(){
    var descrip = document.querySelector('#nombre').value;
    if(descrip.length == 0){
        alert("Ingrese el Tipo de Material");
        return;
    }
    console.log(descrip);
    guardarTipoMaterial();
}

function guardarTipoMaterial(){
    fetch("../Controlador/insertaTipoMaterial.php", {
        method: "POST",
        body: new FormData(formTM),
      })
        .then((response) => response.text())
        .then((response) => {
          console.log(response);
          if (response == " ok") {
            alert("Tipo de Material Almacenado Correctamente");
            window.location.href = "4fomularioTM.html";
          }
        });
        refrescar();
    }
let registros = document.querySelector("#registros");

function cargarTM_Almacenados(){
      $.ajax({
          type: "GET", 
          url: "../Controlador/listarTipoMaterial.php", 
          success: function (response) {
            const tipos = JSON.parse(response); 
              tipos.forEach((element) => {
                // console.log(element.idTM);
                // console.log(element.descrip);
                var div = document.createElement('div');
                div.className = 'row align-items-start';
                div.innerHTML = `<div class="col-1 text-center border border-success">
                                    <h4>${element.idTM}</h4>
                                  </div>
                                  <div class="col-4 border border-success">
                                    <h4>${element.descrip}</h4>
                                  </div>
                                  `;
                registros.appendChild(div);
              }); 
          },
        });
  }

cargarTM_Almacenados();