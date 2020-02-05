$(document).ready(
    function () {
        var topBarElement = $(".page .main-column .top-bar");
        var navigationElement = $(".page .main-column .top-bar .navigation");
        var logoElement = $(".page .side-column .logo");
        var elementOffset = navigationElement.offset().top;
        var scrollTop = $(window).scrollTop();
        var distance = calculateDistance(elementOffset, scrollTop);
        toggleFix(distance);
        $(window).scroll(
            function () {
                scrollTop = $(window).scrollTop();
                distance = calculateDistance(elementOffset, scrollTop);
                toggleFix(distance);
            }
        );

        function calculateDistance(elementOffset, scrollTop)
        {
            return elementOffset - scrollTop - 32;
        }

        function toggleFix(distance)
        {
            if (distance <= 0) {
                fixNavigation();
            } else {
                unfixNavigation();
            }
        }

        function fixNavigation()
        {
            if (!topBarElement.hasClass("fixed")) {
                topBarElement.addClass("fixed");
            }
            if (!logoElement.hasClass("fixed")) {
                logoElement.addClass("fixed");
            }
        }

        function unfixNavigation()
        {
            if (topBarElement.hasClass("fixed")) {
                topBarElement.removeClass("fixed");
            }
            if (logoElement.hasClass("fixed")) {
                logoElement.removeClass("fixed");
            }
        }
    }
);