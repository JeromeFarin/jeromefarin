$('body').on('click', '.details', function() {
    let element = $(this).children('p').children('i');
    if (element.hasClass('fa-caret-up')) {
        element.removeClass('fa-caret-up');
        element.addClass('fa-caret-down');
    } else {
        element.removeClass('fa-caret-down');
        element.addClass('fa-caret-up');
    }

    $(this).children('.details-popup').toggle();
});
