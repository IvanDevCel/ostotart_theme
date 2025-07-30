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
                            $('.searchSection').addClass('searching'); // Solo si hay resultados
                            output += `<div class="search-title">Resultados Búsqueda (${response.length})</div><div class="search-list">`;
                            response.forEach(function (post) {
                            output += `
                                <div class="search-card">
                                    <a href="${post.link}" class="search-link">
                                        ${post.image ? `
                                            <div class="imgCont">
                                                <img src="${post.image}" alt="${post.title}">
                                            </div>
                                        ` : ''}
                                        <div class="search-info">
                                            <h4>${post.title}</h4>
                                            ${post.excerpt ? `<p>${post.excerpt}</p>` : ''}
                                        </div>
                                    </a>
                                </div>`;
                            });
                            output += `</div>`;

                        } else {
                            $('.searchSection').removeClass('searching'); // Si no hay resultados
                            output = '<p class="noResults">No se encontraron resultados.</p>';
                        }
                        $('#search-results').html(output);
                    },
                    error: function () {
                        $('#search-results').html('<p>Hubo un error en la búsqueda.</p>');
                        $('.searchSection').removeClass('searching');
                    }
                });
            } else {
                $('#search-results').empty();
                $('.searchSection').removeClass('searching');
            }
        }, 300);
    });
});
