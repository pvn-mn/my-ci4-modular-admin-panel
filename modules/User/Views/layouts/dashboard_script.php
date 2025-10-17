
<script>
$(document).on('click', '[data-url]', function(e){

    //to prevent the browser from following the href by default ---
    e.preventDefault();
    // --- which helps ajax find the relevant page to fetch with data-url?
    const url = $(this).data('url');
    
    //'#ajax-content' is the area inside dashboard where content loads
    const $content = $('#ajax-content');

    $.ajax({
        url: url,
        type: 'GET',
        beforeSend: function() {
        $content.html('<div class="text-center p-3">Loading...</div>');
        },
        success: function(response) {
        $content.html(response);
        }
    });
});
</script>
