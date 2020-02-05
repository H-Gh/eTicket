$(document).ready(
    function () {
        $(".side-bar .list li").find(".toggle").click(
            function () {
                var li = $(this).parents("li");
                var children = li.find(".children.sliding");
                $(this).toggleClass("toggled");
                // if (children.hasClass("dropped"))
                children.slideToggle(
                    "fast",
                    function () {
                        $(this).toggleClass("dropped");
                    }
                );
                // else
                //     children.slideDown("fast", function () {
                //         $(this).addClass("dropped");
                //     });
            }
        );
    }
);