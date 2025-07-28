$(document).on("click", ".imgPerfil", function(event) { 
    
    event.preventDefault();

    // Selecciona el menú desplegable
    let $menuDesplegable = $('.menu_desplegable');

    // Si ja està visible, s'amaga
    if ($menuDesplegable.hasClass('show')) {
        $menuDesplegable.removeClass('show');
    } else {
        
        let opcio_logejat = document.getElementById("select_loggin");
        let valorSeleccionat = 1;
        
        if (opcio_logejat) 
            valorSeleccionat = opcio_logejat.value;

        
        $menuDesplegable.load('/GameZone/controller/c_menuDesplegable.php?logejat=' + encodeURIComponent(valorSeleccionat), function() {
        // Una vez cargado, muestra el menú
        $menuDesplegable.addClass('show');
        });

    }
});


$(document).on("click", function(event) {
    // Si el clic no es en el menú o en la imagen del perfil, cierra el menú
    if (!$(event.target).closest('.menu_desplegable, .imgPerfil').length) {
        $('.menu_desplegable').removeClass('show');
    }
});
