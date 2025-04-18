jQuery(document).ready(function($) {

    // Botón de búsqueda
    $(".btnSearch").on("click", function() {
        $(".searchSection").toggleClass("isActive");
    });

    // Selector de idioma con fadeToggle
    const $langSelector = $('.language-selector');
    const $toggleBtn = $langSelector.find('.lang-toggle');
    const $dropdown = $langSelector.find('.lang-dropdown');

    $toggleBtn.on("click", function(e) {
        e.stopPropagation();
        $toggleBtn.toggleClass("active");
        $dropdown.fadeToggle(150);
    });

    $(document).on("click", function(e) {
        if (!$langSelector.is(e.target) && $langSelector.has(e.target).length === 0) {
            $dropdown.fadeOut(150);
            $toggleBtn.removeClass("active");
        }
    });

});