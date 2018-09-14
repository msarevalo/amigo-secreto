function noVolver() {
    window.location.hash="no-back-button";
    window.location.hash="Again-No-back-button" //chrome
    window.onhashchange=function(){window.location.hash="";}
}

var i=0
$(document).ready(function(){
    $('#ver').click(function(){
        if(i==0){
            $('#pass').attr('type', 'text');
            i++;
        }else{
            $('#pass').attr('type', 'password');
            i=0;
        }
    });
});

function alertaPersonaje(ideliminar) {
    var eliminar = ideliminar;
    var r = confirm('Desdea eliminar el personaje?');
    if (r == true){
        location.href="../back/eliminarPersonaje.php?id=" + ideliminar;
    }else {
        //alert('Falso');
    }}
    function alertaUsuario(ideliminar) {
    var eliminar = ideliminar;
    var r = confirm('Desdea eliminar el usuario?');
    if (r == true){
        location.href="../back/eliminarUsuario.php?id=" + ideliminar;
    }else {
        //alert('Falso');
    }}

    function alertaRestablecer(ideliminar) {
    var eliminar = ideliminar;
    var r = confirm('Desdea restablecer la contraseña del usuario?');
    if (r == true){
        location.href="../back/restablecerAdmin.php?id=" + ideliminar;
    }else {
        //alert('Falso');
    }}