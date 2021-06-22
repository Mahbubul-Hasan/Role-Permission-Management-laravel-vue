$.each($(".sidebar-menu .active"), function (index, value) {
    $(value).parent().parent().addClass("active");
});

$(".delete-item").click(function () {
    if (confirm("Do you really want to delete this record?")) {
        let url = $(this).data("url");
        let token = $(this).data("token");
        $.ajax({
            url: url,
            type: "POST",
            data: { _method: "DELETE", _token: token },
            dataType: "JSON",
            success: function () {
                location.reload();
            },
        });
    }
});
