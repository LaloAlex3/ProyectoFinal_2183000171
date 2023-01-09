//Esta funcion solo es para poder hacer interactivo si el usuario
//desea ver los materiales o no, permitiendo que precione un boton
//con el cual oculte el aside
function mostrarTemario(){
    var temario = document.getElementById("temario");
    if(temario.style.display == 'none'){
        temario.style.display = 'flex';
    }
}
function mostrarAside(){
    var aside = document.getElementById("aside");
    var flecha = document.getElementById("flecha");
    if(aside.style.display == 'none'){
        aside.style.display = 'block';
        flecha.className= "carousel-control-next-icon";
    }
}
function ocultarAside(){
    var opcion = document.getElementById("aside");
    var flecha = document.getElementById("flecha");
    if(opcion.style.display == 'block'){
        opcion.style.display = 'none';
        flecha.className="carousel-control-prev-icon";
    }
}
function botonAside(){
    var opcion = document.getElementById("aside");
    var flecha = document.getElementById("flecha");
    if(opcion.style.display == 'block'){
        opcion.style.display = 'none';
        flecha.className="carousel-control-prev-icon";
    }else{
        aside.style.display = 'block';
        flecha.className= "carousel-control-next-icon";
    }
}

//Esta funcion nos sirve para hacer dinamica la visualizacion de la pagina
//Permitiendo que el usuario seleccione que es lo que desea visualizar
//ocultando los demas apartados de los materiales.
var notas = document.getElementById("pdf");
var videos = document.getElementById("videos");
var libros = document.getElementById("libros");
var btnNnotas = document.getElementById("btnNotas");
var btnVideos = document.getElementById("btnVideos");
var btnLibros = document.getElementById("btnLibros");
function mostrarPestañas(id){
    if(id == "1"){
        notas.style.display = 'block';
        videos.style.display = 'none';
        libros.style.display = 'none'; 

        btnNnotas.classList = 'btn btn-lg btn-ligth opcion';
        btnVideos.classList = 'btn btn-lg btn-dark opcion';
        btnLibros.classList = 'btn btn-lg btn-dark opcion';
    }else if(id == "2"){
        notas.style.display = 'none';
        videos.style.display = 'block';
        libros.style.display = 'none';

        btnNnotas.classList = 'btn btn-lg btn-dark opcion';
        btnVideos.classList = 'btn btn-lg btn-ligth opcion';
        btnLibros.classList = 'btn btn-lg btn-dark opcion';
    }else if(id == "3"){
        notas.style.display = 'none';
        videos.style.display = 'none';
        libros.style.display = 'block';
        
        btnNnotas.classList = 'btn btn-lg btn-dark opcion';
        btnVideos.classList = 'btn btn-lg btn-dark opcion';
        btnLibros.classList = 'btn btn-lg btn-ligth opcion';
    }
}

//Los arreglos globales nos permiten tener los materiales en todo momento
//permitiendo que en cualquier momento podamos disponer de los materiales
//que fueron recuperados de la base de datos
var Materiales = new Array();

// Esta función recupera todos los materiales que están almacenados en la Base de Datos
// realizando el guardado en su respectivo arrgelo de tipo de material 
function recuperarMaterialesBD(){
    $.ajax({
        type:"GET",
        url: "Controlador/Operaciones/listarMateriales.php",
        success: function(response){
            const tipos = JSON.parse(response);
            tipos.forEach((element)=>{
                // console.log(element.idTemario +" "+ element.idTema);
                // console.log(element.idTipoMat +" "+ element.nombreMaterial +" "+ element.url);
                //console.log(element);
                var arr = new Array();
                arr.push(element.idTipoMat);
                arr.push(element.idTemario);
                arr.push(element.idTema);
                arr.push(element.nombreMaterial);
                arr.push(element.url);
                Materiales.push(arr);
            })
        }
    });
}

//Esta funcion nos sirve para cargar los materiales de la UEA
//que fue seleccionada por el usuario, haciendo el cargado de la 
//la información en los apartados de videos, notas de curso y libros
var listaPDFs = document.getElementById('listaPDFs');
var listaVideos = document.getElementById('listaVideos');
var listaLibros = document.getElementById('listaLibros');
function cargarMateriales(idTema){
    $("#listaPDFs li").remove();
    $("#listaVideos div").remove();
    var flag = false;
    for(var i = 0; i < Materiales.length ; ++i){
        // console.log(Materiales[i][0]); //idTipoMat 
        // console.log(Materiales[i][1]); //idTemario
        // console.log(Materiales[i][2]); ///idTema
        // console.log(Materiales[i][3]); //nombreMat
        // console.log(Materiales[i][4]); //url
        if(Materiales[i][2] == idTema){
            if(Materiales[i][0] == 1){
                var li = document.createElement('li');
                li.innerHTML = `<a href="${Materiales[i][4]}"> 
                                    <button type="button" class= "btn btn-secondary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-pdf" viewBox="0 0 16 16">
                                            <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"></path>
                                            <path d="M4.603 14.087a.81.81 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.68 7.68 0 0 1 1.482-.645 19.697 19.697 0 0 0 1.062-2.227 7.269 7.269 
                                            0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.188-.012.396-.047.614-.084.51
                                            -.27 1.134-.52 1.794a10.954 10.954 0 0 0 .98 1.686 5.753 5.753 0 0 1 1.334.05c.364.066.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.
                                            856.856 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.712 5.712 0 0 1-.911-.95 11.651 11.651 0 0 0-1.997.406 11.307 11.307 0 0 1-1.02 1.51c-.292.35-.609.656-.927.787a.793.793
                                            0 0 1-.58.029zm1.379-1.901c-.166.076-.32.156-.459.238-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361.01.022.02.036.026.044a.266.266 0 0 0 .035-.012c.137-.056.355-.235.635
                                            -.572a8.18 8.18 0 0 0 .45-.606zm1.64-1.33a12.71 12.71 0 0 1 1.01-.193 11.744 11.744 0 0 1-.51-.858 20.801 20.801 0 0 1-.5 1.05zm2.446.45c.15.163.296.3.435.41.24.19.407.253.498
                                            .256a.107.107 0 0 0 .07-.015.307.307 0 0 0 .094-.125.436.436 0 0 0 .059-.2.095.095 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a3.876 3.876 0 0 0-.612-.053zM8.078 7.8a6.7 6.7 
                                            0 0 0 .2-.828c.031-.188.043-.343.038-.465a.613.613 0 0 0-.032-.198.517.517 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822.024.111.054.227.09.346z"></path>
                                        </svg>
                                        <p>${Materiales[i][3]}</p>
                                    </button>
                                </a>`;
                listaPDFs.appendChild(li);
            }else if(Materiales[i][0] == 2){
                var div = document.createElement('div');
                if(flag == false){
                    div.className = "carousel-item active";
                    flag= true;
                }else{
                    div.className = "carousel-item ";
                }
                div.innerHTML = `<iframe class="video" src="${Materiales[i][4]}" 
                            title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; 
                            clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`;
                listaVideos.appendChild(div);
            }
        }
    }
}

function cargarLibrosUEA(idTemario){
    $("#listaLibros li").remove();
    var ultimaURL;
    for(var i = 0; i < Materiales.length ; ++i){
        if(Materiales[i][1] == idTemario && Materiales[i][0] == 3 && Materiales[i][4] != ultimaURL){
                ultimaURL = Materiales[i][4];
                var li = document.createElement('li');
                li.innerHTML = `<a href="${Materiales[i][4]}"> 
                            <button type="button" class= "btn btn-secondary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-pdf" viewBox="0 0 16 16">
                                    <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"></path>
                                    <path d="M4.603 14.087a.81.81 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.68 7.68 0 0 1 1.482-.645 19.697 19.697 0 0 0 1.062-2.227 7.269 7.269 
                                    0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.188-.012.396-.047.614-.084.51
                                    -.27 1.134-.52 1.794a10.954 10.954 0 0 0 .98 1.686 5.753 5.753 0 0 1 1.334.05c.364.066.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.
                                    856.856 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.712 5.712 0 0 1-.911-.95 11.651 11.651 0 0 0-1.997.406 11.307 11.307 0 0 1-1.02 1.51c-.292.35-.609.656-.927.787a.793.793
                                     0 0 1-.58.029zm1.379-1.901c-.166.076-.32.156-.459.238-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361.01.022.02.036.026.044a.266.266 0 0 0 .035-.012c.137-.056.355-.235.635
                                     -.572a8.18 8.18 0 0 0 .45-.606zm1.64-1.33a12.71 12.71 0 0 1 1.01-.193 11.744 11.744 0 0 1-.51-.858 20.801 20.801 0 0 1-.5 1.05zm2.446.45c.15.163.296.3.435.41.24.19.407.253.498
                                     .256a.107.107 0 0 0 .07-.015.307.307 0 0 0 .094-.125.436.436 0 0 0 .059-.2.095.095 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a3.876 3.876 0 0 0-.612-.053zM8.078 7.8a6.7 6.7 
                                     0 0 0 .2-.828c.031-.188.043-.343.038-.465a.613.613 0 0 0-.032-.198.517.517 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822.024.111.054.227.09.346z"></path>
                                </svg>
                                <p>${Materiales[i][3]}</p>
                            </button>
                       </a>`;
                listaLibros.appendChild(li);
        }
    }
}

//Esta funcion nos sirve para actualizar la pagina en el apartado
//del temario con los temas de las materias que el usuario este seleccionando
function cargarTemas(id,nombreTem){
    $("#nombreTemario").remove();
    $("#Temas input").remove();
    var tituloTemario = document.querySelector("#nombreTem");
    var h2  = document.createElement('h2');
    h2.className = "nombreTemario";
    h2.id = "nombreTemario";
    h2.innerText = `${nombreTem}`;
    tituloTemario.appendChild(h2);
    var temas = document.querySelector("#Temas"); 
    var num = 1 ;
    ocultarAside();
    $.ajax({
        type:"GET",
        url: "Controlador/Operaciones/listarTemas.php",
        success: function(response){
            const tipos = JSON.parse(response);
            tipos.forEach((element)=>{
                if(element.idTemario == id){
                    var inputt = document.createElement('input');
                    inputt.className = 'btn btn-dark btn-lg btn-block';
                    inputt.id = element.idTema;
                    inputt.value = num +"-  "+element.nombreTema;
                    inputt.setAttribute("onClick", `cargarMateriales(${element.idTema}); mostrarAside();`);
                    temas.appendChild(inputt);
                    num++;
                }
            })
        }
    });
}

//Esta funcion sirve para cargar todas las materias que se tengan almacenadas en ela BD
var reg = document.querySelector("#UEAs");
function cargarUEAs(){
    $.ajax({
        type:"GET",
        url: "Controlador/Operaciones/listarUEAS.php",
        success: function(response){
            const tipos = JSON.parse(response);
            tipos.forEach((element)=>{
                var div = document.createElement('div');
                div.className = 'col-6';
                div.innerHTML = `<div class="uea">
                                    <input type="button" name = "${element.nombre}" 
                                    id="${element.idUEA}" value = "${element.nombre}"
                                    data-clave = ${element.clave}
                                    data-descrip = ${element.descripcion}
                                    data-idTem = ${element.idTemario}
                                    data-nomTem = ${element.nombreTemario}
                                    class="btn btn-primary btn-lg btn-block"
                                    onClick="mostrarTemario(); cargarTemas(${element.idTemario},'${element.nombreTemario}'); cargarLibrosUEA(${element.idTemario});">
                                    <p>
                                        ${element.clave}
                                        <br>
                                        ${element.descripcion}
                                    </p>
                                </div>
                                `;
                    reg.appendChild(div);
            })
        },
    });
}

cargarUEAs();
recuperarMaterialesBD();
