$(document).ready(
    function () {
        var rollCheckboxes = $(".role input[type='checkbox']");
        var permissionCheckboxes = $(".permissions input[type='checkbox']");
        rollCheckboxes.on(
            "change",
            function () {
                checkInheritance(this);
            }
        );

        permissionCheckboxes.on(
            "change",
            function () {
                var container = $(this).parents(".role-permissions-container");
                var areAllPermissionsChecked = container.find(".permissions input[type='checkbox']").not(":checked").length === 0;
                if (areAllPermissionsChecked) {
                    var roleCheckbox = container.find(".role input[type='checkbox']");
                    roleCheckbox.prop("checked", "checked");
                    checkInheritance(roleCheckbox);
                }
            }
        );

        function checkInheritance(element, firstInit) {
            if (firstInit === undefined) {
                firstInit = false;
            }
            var container = $(element).parents(".role-permissions-container");
            var isRoleChecked = container.find(".role input[type='checkbox']").is(":checked");
            var permissionsInput = container.find(".permissions input[type='checkbox']");
            permissionsInput
                .each(
                    function () {
                        if (!firstInit || firstInit && isRoleChecked) {
                            $(this).prop("checked", isRoleChecked).attr("disabled", isRoleChecked);
                        }
                    }
                );
            firstInit = false;
            input.rerender();
        }

        rollCheckboxes.each(
            function () {
                checkInheritance(this, true);
            }
        );
    }
);
