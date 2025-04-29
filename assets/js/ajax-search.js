jQuery(document).ready(function($) {
    $('#search-input').on('input', function() {
        var searchTerm = $(this).val();

        if (searchTerm.length >= 2) {
            $.ajax({
                url: ajax_object.ajaxurl, // ESTO usa admin-ajax.php automáticamente
                type: 'POST',
                dataType: 'json',
                data: {
                    action: 'custom_search', // EL MISMO nombre del add_action
                    query: searchTerm
                },
                success: function(response) {
                    if (response.length > 0) {
                        let output = '<ul>';
                        $.each(response, function(index, post) {
                            output += `<li><a href="${post.link}">${post.title}</a></li>`;
                        });
                        output += '</ul>';
                        $('#search-results').html(output);
                    } else {
                        $('#search-results').html('<p>No se encontraron resultados.</p>');
                    }
                },
                error: function() {
                    $('#search-results').html('<p>Hubo un error en la búsqueda.</p>');
                }
            });
        } else {
            $('#search-results').empty();
        }
    });
});
