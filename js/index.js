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
        location.href="../public/personajes-admin"
    }}
    function alertaUsuario(ideliminar) {
    var eliminar = ideliminar;
    var r = confirm('Desdea eliminar el usuario?');
    if (r == true){
        location.href="../back/eliminarUsuario.php?id=" + ideliminar;
    }else {
        location.href="../public/usuarios-admin";
    }}

    function alertaRestablecer(ideliminar) {
    var eliminar = ideliminar;
    var r = confirm('Desdea restablecer la contraseña del usuario?');
    if (r == true){
        location.href="../back/restablecerAdmin.php?id=" + ideliminar;
    }else {
        location.href="../public/usuarios-admin";
    }}

function contarcaracteres(){

    var total=600;

    setTimeout(function(){
        var valor=document.getElementById('publicacion');
        var respuesta=document.getElementById('res');
        var cantidad=valor.value.length;
        document.getElementById('res').innerHTML = cantidad + ' / 600 ';
    },10);

}

function contarcaracteres2(){

    var total=600;

    setTimeout(function(){
        var valor=document.getElementById('edicion');
        var respuesta=document.getElementById('res');
        var cantidad=valor.value.length;
        document.getElementById('res').innerHTML = cantidad + ' / 600 ';
    },10);

}

$(document).ready(function()
{
    $("#notificationLink").click(function()
    {
        $("#notificationContainer").fadeToggle(300);
        $("#notification_count").fadeOut("slow");
        return false;
    });

    //Document Click hiding the popup
    $(document).click(function()
    {
        $("#notificationContainer").hide();
    });

    //Popup on click
    $("#notificationContainer").click(function()
    {
        return false;
    });

});

$(document).ready(function(){
    $('#expresion').click(function(){
        $('#expresiones').css('display', 'none');
    });
});