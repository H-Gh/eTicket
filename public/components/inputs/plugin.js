(function ($) {
    $.fn.input = function () {
        this.each(function () {
            var $id = $(this).attr("id");
            var $class = $(this).attr("class");
            var $label = $(document).find("label[for='" + $id + "']");
            console.log($label);
            $($label).wrap("<div class='checkbox-container'></div>");
            var $container = $($label).parent();
            $($container).addClass($class);
            $(document).remove(this);
            $label.wrapInner("<span class='checkbox-text'></span>");
            $($label).append(this).append("<div class='check-mark'></div>");
        });
        return this;
    };
}(jQuery));
