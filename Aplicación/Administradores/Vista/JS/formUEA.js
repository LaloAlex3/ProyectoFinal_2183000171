function validarForm(){
    var nombreUEA = document.querySelector("#nombre").value;
    var clave = document.querySelector("#clave").value;
    var descrip = document.querySelector("#descrip").value;
    var nombreTemario = document.querySelector("#nombreTemario").value;
    var temas = document.querySelectorAll("#tema"); 

    if(nombreUEA.length == 0){
        alert("Ingrese el nombre de la UEA");
        return;
    }
    if(clave == 0){
        alert("Ingrese la clave de la UEA");
        return;
    }
    if(descrip.length == 0){
        alert("Ingrese una breve descripcion de la UEA");
        return;
    }
    if(nombreTemario.length == 0){
        alert("Ingrese el nombre del temario de la UEA");
        return;
    }
    /*console.log(nombreUEA);
    console.log(clave);
    console.log(descrip);
    console.log(nombreTemario);
    temas.forEach(function(tema) {
        console.log(tema.value);
      });*/

    guardarUEA();
    //location.reload();
}
var contTemas = 0;
function agregarTema(){
    var Temas = document.getElementById("arrTemas");
    var input = document.createElement('input');
    input.type = "text";
    input.name = "tema[]"
    input.id = "tema" + contTemas++;;
    input.className = "form-control";
    Temas.appendChild(input);
    // <input type="text" name="nombreTemario" id="nombreTemario" class="form-control"></input>
}

function guardarUEA(){
    fetch("../Controlador/insertaUEA_DAO.php", {
        method: "POST",
        body: new FormData(formUEA),
      })
        .then((response) => response.text())
        .then((response) => {
          console.log(response);
          if (response == " ok") {
            alert("UEA Almacenada Correctamente");
            window.location.href = "1formularioUEA.html";
          }
        });
        cargarUEA_Almacenadas();
}

function cargarUEA_Almacenadas(){
        $.ajax({
            type: "GET", 
            url: "../Controlador/listarMaterias.php", 
            success: function (response) {
              const tipos = JSON.parse(response); 
                tipos.forEach((element) => {
                  var reg = document.querySelector("#registros");
                  // console.log(element.idTM);
                  // console.log(element.descrip);
                  var div = document.createElement('div');
                  div.className = 'row align-items-start border border-success';
                  div.innerHTML = `<div class="col-md-0 ">
                                        <h4> ${element.id}</h4>
                                    </div>
                                    <div class="col-md-1 ">
                                        <label> ${element.nombreUEA} </label>
                                    </div>
                                    <div class="col-md-1  ">
                                        <label> ${element.clave} </label>
                                    </div>
                                    <div class="col-md-7 ">
                                        <label> ${element.descrip} </label>
                                    </div>
                                    <div class="col-md-2 ">
                                        <label> ${element.temario} </label>
                                    </div>`;
                    //reg.appendChild(div);
                    reg.appendChild(div);
                });
            },
          });
}
  
cargarUEA_Almacenadas();

