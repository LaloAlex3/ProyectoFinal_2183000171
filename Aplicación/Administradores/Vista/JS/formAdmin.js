function mostrarPassword(){
    var cambio = document.getElementById("txtPassword");
    if(cambio.type == "password"){
        cambio.type = "text";
        $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
    }else{
        cambio.type = "password";
        $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
    }
} 
function guardarAdmin(){
    fetch("../Controlador/insertaAdminDAO.php", {
        method: "POST",
        body: new FormData(formAdmin),
      })
        .then((response) => response.text())
        .then((response) => {
          console.log(response);
          if (response == " ok") {
            alert("Administrador Almacenado Correctamente");
            formAdmin.reset();
          }
        });
    }

function validarForm(){
    var nombre = document.querySelector("#nombre").value;
    var apellidoP = document.querySelector("#apP").value;
    var apellidoM = document.querySelector("#apM").value;
    var user = document.querySelector("#user").value;
    var contra = document.getElementById("txtPassword").value;

    if(nombre.length == 0){
        alert("Ingrese el nombre");
        return;
    }
    if(apellidoP.length == 0){
        alert("Ingrese el apellido paterno");
        return;
    }
    if(apellidoM.length == 0){
        alert("Ingrese el apellido materno");
        return;
    }
    if(user.length == 0){
        alert("Ingrese el usuario para el administrador");
        return;
    }
    if(contra.length == 0 || contra.length >16){
        alert("Ingrese una contraseña de minimo 8 caracteres y maximo 16")
        return;
    }
    console.log(nombre);
    console.log(apellidoP);
    console.log(apellidoM);
    console.log(user);
    console.log(contra);
    guardarAdmin();
}