function toggleHeaderNav(nav) {
    nav.on('click', function() {
        const nav = $(this);
        if (nav.hasClass('collapsed')) {
            nav.removeClass('collapsed');
        } else {
            $('.menu-item-has-children').each(function() {
                $(this).removeClass('deployed')
            });
            nav.addClass('collapsed');

        }
    })
    $('.menu-item-has-children').on('click', function(e) {
        e.stopPropagation();
    })    
}

function toggleHeaderSubNav(subnav) {
    subnav.on('click', function() {
        const subnav = $(this);
        console.log(subnav)
        if (subnav.hasClass('deployed')) {
            subnav.removeClass('deployed');
        } else {
            $('.menu-item-has-children').each(function() {
                $(this).removeClass('deployed')
            });
            subnav.addClass('deployed');

        }
    }) 

    $('.menu-item-has-children').on('click', function(e) {
        e.stopPropagation();
    })    

}

/* function prependCloseBtn() {
    $('nav  ul.sub-menu').each(function() {
        $(this).prepend('<div class="closeBtn">×</div>');
    })
} */

/* function closeSubNav() {
    $('.closeBtn').on('click', function() {
        $('.menu-item-has-children').each(function() {
            $(this).removeClass('deployed')
        })
    })   
} */


$(document).ready(function() {
    var documentWidth = Math.max(document.documentElement.clientWidth || 0, window.innerWidth || 0)
    
    if (window.matchMedia("(max-width: 1024px)").matches ) {
        /* prependCloseBtn(); 
        closeSubNav();*/
    }

    toggleHeaderNav($('.mobileNav'));
    toggleHeaderSubNav($('.menu-item-has-children'));
});

