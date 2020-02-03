(function ($) {
    $.fn.input = function () {
        this.initialize = function () {
            $(this).each(
                function () {
                    var $id = $(this).attr("id");
                    var $class = $(this).attr("class");
                    var $label = $(document).find("label[for='" + $id + "']");
                    $($label).wrap("<div class='checkbox-container'></div>");
                    var $container = $($label).parent();
                    $($container).addClass($class);
                    $(document).remove(this);
                    $label.wrapInner("<span class='checkbox-text'></span>");
                    $($label).append(this).append("<div class='check-mark'></div>");
                    checkDisabled($container);
                }
            );

            return this;
        };

        this.rerender = function () {
            $(this).each(
                function () {
                    var $container = $(this).parents(".checkbox-container");
                    checkDisabled($container);
                }
            );
            return this;
        };

        var checkDisabled = function ($container) {
            var $element = $($container).find("input[type='checkbox']");
            var $disabled = $element.is(":disabled");
            if ($disabled) {
                $($container).addClass("disabled");
            } else {
                $($container).removeClass("disabled");
            }

            $element.attr("disabled", $disabled);
        };

        return this;
    };
}(jQuery));
