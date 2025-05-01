jQuery(document).ready(function ($) {
    let debounceTimer;
    $('#search-input').on('input', function () {
        clearTimeout(debounceTimer);
        const searchTerm = $(this).val();
        debounceTimer = setTimeout(function () {
            if (searchTerm.length > 0) {
                $.ajax({
                    url: ajax_object.ajaxurl,
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        action: 'custom_search',
                        query: searchTerm,
                    },
                    success: function (response) {
                        let output = '';
                        if (response.length > 0) {
                            output += `<div class="search-title">Resultados Búsqueda (${response.length})</div><div class="search-list">`;
                            response.forEach(function (post) {
                                output += `
                                    <div class="search-card">
                                    <a href="${post.link}">
                                    <h4>${post.title}</h4>
                                    </a>
                                    </div>`;
                            });
                            output += `</ul>`;
                        } else {
                            output = '<p class="noResults">No se encontraron resultados.</p>';
                        }
                        $('#search-results').html(output);
                    },
                    error: function () {
                        $('#search-results').html('<p>Hubo un error en la búsqueda.</p>');
                    }
                });
            } else {
                $('#search-results').empty();
            }
        }, 300); // Espera 300ms después de que el usuario deja de escribir
    });
 });