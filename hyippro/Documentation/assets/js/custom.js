$(document).ready(function() {

    // Scrollbar;
    $('.left-menu').niceScroll({
        cursorcolor: "#ddd",
        cursorwidth: "10px",
    });

    // navbar;
    $('.navbar-toggler').on('click', function() {
        $('.left-menu').toggleClass('active');
    })


    $('.main-content ul.folder').find('li').prepend('<span class="mr-2">&#x1F4C2;</span>');
    $('.right').find('li').prepend('<span class="mr-2"><i class="fas fa-chevron-right"></i></span>');
    $('.left-menu-item').find('a').prepend('<i class="fas fa-circle"></i>');



        // Handler object;
        const MENU_INFO = {
            navLink: $('a[href^="#"]'),
            activeClassName: 'active',
            scrollTime: 500,
            offsetTop: 70,
        }
    
        // Smooth Scroll;
        MENU_INFO.navLink.click(function(e) {
            e.preventDefault();
            $('html, body').animate({
                scrollTop: $(this.hash).offset().top - (MENU_INFO.offsetTop - 20), 
            }, MENU_INFO.scrollTime);
        });
    
        // Active link when scrolling;
        function activeNavLink() {
            let scrollFromTop = $(this).scrollTop();
            $('.left-menu a[href^="#"]').each(function(e) {
                if($(this.hash).offset()) {
                    let sectionOffset = $(this.hash).offset().top;
                    if(sectionOffset <= scrollFromTop + MENU_INFO.offsetTop) {
                        $(this).parent().addClass(MENU_INFO.activeClassName);
                        $(this).parent().siblings().removeClass(MENU_INFO.activeClassName);
                    } 
                }
            });
        } activeNavLink();

        
        $(window).scroll(function() {
            activeNavLink(); 
        });


        




});