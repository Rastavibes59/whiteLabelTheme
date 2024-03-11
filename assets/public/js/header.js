function deployHeaderNav() {
    $('hamburger-icon').on('click', function(e) {
        e.stopPropagation();
        var $this = $(this).parent();
        if ($this.hasClass('collapsed')) {
            $(this).removeClass('collapsed');
        } else {
            $(this).addClass('collapsed');
            $('.menu-item-has-children').each(function() {
                $(this).removeClass('deployed')
            });
        }
    })
     $('nav *').on('click', function(e) {
        e.stopPropagation();
    })    
}
function deployHeaderSubNav() {
    $('.menu-item-has-children').on('click', function(e) {
        e.stopPropagation();
        var $this = $(this);
        $('.menu-item-has-children').each(function() {
            $(this).removeClass('deployed')
        })
        $this.toggleClass('deployed');
    }) 
}

function prependCloseBtn() {
    $('nav  ul.sub-menu').each(function() {
        $(this).prepend('<div class="closeBtn">×</div>');
    })
}

function closeSubNav() {
    $('.closeBtn').on('click', function() {
        $('.menu-item-has-children').each(function() {
            $(this).removeClass('deployed')
        })
    })   
}


$(document).ready(function() {
    var documentWidth = Math.max(document.documentElement.clientWidth || 0, window.innerWidth || 0)
    
    if (window.matchMedia("(max-width: 1024px)").matches ) {
        //prependCloseBtn();
        closeSubNav();
    }

    deployHeaderNav();
    deployHeaderSubNav();
});

