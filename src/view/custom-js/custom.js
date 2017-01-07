function checkFakeBet(selectClass, submitId) {
    $(selectClass).change(function () {
        var duplicate = '';
        var nullRecords = false;

        var selects = [];
        $(selectClass).each(function () {
            selects.push($(this).val());
        });

        for (i = 0; i < selects.length; i++) {
            for (j = 0; j < selects.length; j++) {
                if (i !== j) {
                    if (selects[i] === selects[j] && selects[i] !== "") {
                        duplicate = selects[i];
                    }
                }
            }
        }

        $(selectClass).each(function () {
            if ($(this).val() == duplicate && duplicate !== "") {
                $(this).css('border', '3px solid red');
            } else {
                $(this).css('border', '1px solid #ccc');
            }
            if ($(this).val() == "") {
                nullRecords = true;
            }
        });

        if (duplicate == '' && !nullRecords) {
            $(submitId).prop('disabled', false);
        } else {
            $(submitId).prop('disabled', true);
        }

    });
}

$(document).ready(function () {
    // Toggle modules
    $(".toggle").click(function () {
        var toggleClassName = $(this).attr('id');
        $(".toggle-able-" + toggleClassName).toggle('medium');
        $(this).toggleClass('glyphicon-minus-sign').toggleClass('glyphicon-plus-sign');
        $.ajax({
            method: "POST",
            url: "/src/Ajax/SetSessionVariable.php",
            data: { name: "John", location: "Boston" }
        });
    });

    // Remove modules
    $(".remove").click(function () {
        var removeClassName = $(this).attr('id');
        $(".remove-able-" + removeClassName).hide('medium');
    });
});