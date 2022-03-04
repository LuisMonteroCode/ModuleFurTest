$(document).ready(function () {
    $("#cats").change(function () { 
        $.ajax({
            url: mp_ajax,
            data: {
                id_category: $(this).val()
            },
            method: "POST",
            success: function (data) {
                $(".ajax_product").html(data);
            }
        });
    });
});