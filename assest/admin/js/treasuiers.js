$(document).ready(function () {
    $(document).on("input", "#search_by_text", function (e) {
        var search_by_text = $(this).val();
        var token_search = $("#token_search").val();
        var ajax_search_url = $("#ajax_search_url").val();

        jQuery.ajax({
            url: ajax_search_url,
            type: "post",
            datatype: "html",
            cache: false,
            data: {
                search_by_text: search_by_text,
                "_token": token_search,
                ajax_search_url: ajax_search_url,
            },
            success: function (data) {
                $("#ajax_responce_searchDiv").html(data);
            },
            error: function (data) {},
        });
    });
});
