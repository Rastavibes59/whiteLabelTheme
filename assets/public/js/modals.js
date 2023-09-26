function fillModal(clickTarget) {
    if(clickTarget.length != 0 ) {
        var content = clickTarget.data('content');
    }
}

function openModal(modal) {
    modal.addClass('opened');
    $('.mainContainer').addClass('blured')
}

function closeModal(modal) {
    modal.removeClass('opened');
    $('.mainContainer').removeClass('blured')
}