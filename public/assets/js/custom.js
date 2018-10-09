$(function() {

    $(".copy").on('click', function(){
        $(this).select();
        try {
            var ok = document.execCommand('copy');
            if (ok) {
                alertify.success('Copied to clipboard');
                $(this).unselect();

            }
        } catch (e) {}
    });
});