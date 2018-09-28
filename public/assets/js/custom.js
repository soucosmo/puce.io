$(function() {

    $(".copy").on('click', function(){
        $(this).select();
        try {
            var ok = document.execCommand('copy');
            if (ok) {
                 //alertify.set('position', 'bottom-right');
                alertify.logPosition("bottom right");
                alertify.success('Copied to clipboard');
                $(this).unselect();

            }
        } catch (e) {}
    });
});