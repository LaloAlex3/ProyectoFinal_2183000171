let materias = document.querySelector("#materias");
let tiposMaterial = document.querySelector('#tipoM');
let temas = document.querySelector('#temas');
let autores = document.querySelector('#autores');
let palabrasClave = document.querySelector('#palabrasClave');

cargarDATOS();

function validarForm(){
    var nombre = document.querySelector('#nombre').value;
    var url = document.querySelector('#url').value;
    var tipo = document.querySelector('#tipoM').value;
    var fecha = document.querySelector('#fecha').value;
    var materia = document.querySelector('#materias').value;
    var tema = document.querySelector('#temas').value;
    var autores = document.querySelector('#autores').value;
    var palabrasClave = document.querySelector('#palabrasClave').value;

    if(nombre.length == 0){
        alert("Ingrese el nombre del material");
        return;
    }
    if(url.length == 0){
        alert("Ingrese la liga del material");
        return;
    }
    if(tipo == 0){
        alert("Seleccione un tipo de material");
        return;
    }
    if(fecha.length == 0){
        alert("Ingrese la fecha en que se esta publicando el material");
        return;
    }
    if(materia == 0){
        alert("Seleccione la materia a la que pertenece el material");
        return;
    }
    if(tema == 0){
        alert("No ha seleccionado la materia");
        return;
    }
    if(autores.length == 0){
        alert("Seleccione almenos un autor");
        return;
    }
    if(palabrasClave.length == 0){
        alert("Seleccione almenos una palabra clave");
        return;
    }
    // console.log(nombre);
    // console.log(url);
    // console.log(tipo);
    // console.log(fecha);
    // console.log(materia);
    // console.log(tema);
    // console.log(autores);
    // console.log(palabrasClave);
    guardarMaterial();
}

function guardarMaterial() {
    fetch("../Controlador/insertarMaterialDAO.php", {
      method: "POST",
      body: new FormData(formMaterial),
    })
      .then((response) => response.text())
      .then((response) => {
        console.log(response);
        if (response == " ok") {
          alert("Registro de Material éxitoso".toUpperCase());
          window.location.href = "2formularioMaterial.html";
        }
      });
  }


function cargarTipoMat(){
    $.ajax({
        type: "GET", 
        url: "../Controlador/listarTipoMaterial.php", 
        success: function (response) {
          const tipos = JSON.parse(response); 
          let template ='<option value="0" selected disabled> Seleccionar Tipo de Material...</option>';
            tipos.forEach((element) => {
                template += `<option value="${element.idTM}">${element.descrip}</option>`;
            });
            tiposMaterial.innerHTML = template; 
        },
      });
}

function cargarMaterias(){
    $.ajax({
        type: "GET", 
        url: "../Controlador/listarMaterias_Temario.php", 
        success: function (response) {
          const arrMaterias = JSON.parse(response); 
          let template ='<option value="0" selected> Seleccionar Materia ...</option>';
            arrMaterias.forEach((element) => {
                template += `<option value="${element.idTemario}">${element.nombreUEA}</option>`;
            });
            materias.innerHTML = template; 
        },
      });
}

function cargarTemas(tem){
    $.ajax({
        type: "GET", 
        url: "../Controlador/listarTemas.php", 
        success: function (response) {
          const arrTemas = JSON.parse(response); 
          let template ='<option value="0" disabled> Seleccionar Tema ...</option>';
            arrTemas.forEach((element) => {
                if(tem == element.idTemario){
                    template += `<option name="tem" value="${element.idTema}">${element.Nombre}</option>`;
                }
            });
            temas.innerHTML = template; 
        },
      });
}

function cargarAutores(){
    $.ajax({
        type: "GET", 
        url: "../Controlador/listarAutores.php", 
        success: function (response) {
          const arrAutores = JSON.parse(response); 
          let template ='<option value="0" disabled> Selecciona a los autores..</option>';
          arrAutores.forEach((element) => {
                template += `<option value="${element.idAutor}">${element.Nombre} ${element.ApP} ${element.ApM} </option>`;
            });
            autores.innerHTML = template; 
        },
      });
}

function cargarPalabrasClave(){
    $.ajax({
        type: "GET", 
        url: "../Controlador/listarPalabrasClave.php", 
        success: function (response) {
          const arrPC = JSON.parse(response); 
          let template ='<option value="0" disabled> Selecciona las palabras clave...</option>';
          arrPC.forEach((element) => {
                template += `<option value="${element.idPC}">${element.desc}</option>`;
            });
            palabrasClave.innerHTML = template; 
        },
      });
}

function cargarDATOS(){
    cargarMaterias();
    cargarTipoMat();
    cargarAutores();
    cargarPalabrasClave();
}

//validamos que materia seleccionaron para agregar los temas
$("#materias")
  .change(function () {
    var n = document.querySelector("#materias").value;
    if(n != 0){
        $("#temas option").remove()
        $( "#materias option:selected" ).change(
            cargarTemas(n))  
    }else{
        $("#temas option").remove()
        temas.innerHTML = '<option value="0" selected > Seleccionar Tema ...</option>'
    }
    }).change();

