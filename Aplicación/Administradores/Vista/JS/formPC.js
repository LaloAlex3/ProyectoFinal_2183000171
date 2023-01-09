function validarForm(){
    var descrip = document.querySelector('#descrip').value;
    if(descrip.length == 0){
        alert("Ingrese la descripcion de la palabra clave");
        return;
    }
    console.log(descrip); 
    guardarPC();
}

function guardarPC(){
    fetch("../Controlador/insertaPalabraClave.php", {
        method: "POST",
        body: new FormData(formPC),
      })
        .then((response) => response.text())
        .then((response) => {
          console.log(response);
          if (response == " ok") {
            alert("Palabra Clave Almacenada Correctamente");
            window.location.href = "5formularioPC.html";
          }
        });
}

function cargarPC_Almacenadas(){
  $.ajax({
      type: "GET", 
      url: "../Controlador/listarPalabrasClave.php", 
      success: function (response) {
        const tipos = JSON.parse(response); 
          tipos.forEach((element) => {
            var div = document.createElement('div');
            div.className = 'row align-items-start'
            div.innerHTML = `<div class="col-1  border border-success">
                                <h4>${element.idPC}</h4>
                              </div>
                              <div class="col-4  border border-success">
                                <h4>${element.desc}</h4>
                              </div>
                              `;
            registros.appendChild(div);
          }); 
      },
    });
}


cargarPC_Almacenadas();