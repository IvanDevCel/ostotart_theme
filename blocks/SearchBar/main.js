jQuery(document).ready(function($) {
    // Abrir búsqueda
    $(".btnSearch").on("click", function(event) {
        event.preventDefault();
        $('body').addClass('noScroll');
        $(".BarraBusqueda .searchSection").addClass("isActive");
        $(".BarraBusqueda .overlay").fadeIn();
    });

    // Cerrar búsqueda
    $(".BarraBusqueda .closeSearch").on("click", function() {
        $('body').removeClass('noScroll');
        $(".BarraBusqueda .searchSection").removeClass("isActive");
        $(".BarraBusqueda .overlay").fadeOut();
    });
});
