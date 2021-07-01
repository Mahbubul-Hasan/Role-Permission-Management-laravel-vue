$.each($(".router-link-exact-active.router-link-active"), function(index, value) {
    $(value).parent().addClass("active");
    $(value).parent().parent().parent().addClass("active");
});

$(".nav-link").on('click load', function () {
    $('.nav-link').parent().removeClass("active");
    $('.nav-link').parent().parent().parent().removeClass("active");
    $('.router-link-exact-active.router-link-active').parent().addClass("active");
    $('.router-link-exact-active.router-link-active').parent().parent().parent().addClass("active");
})

$(".delete-item").click(function() {
    if (confirm("Do you really want to delete this record?")) {
        let url = $(this).data("url");
        let token = $(this).data("token");
        $.ajax({
            url: url,
            type: "POST",
            data: { _method: "DELETE", _token: token },
            dataType: "JSON",
            success: function() {
                location.reload();
            }
        });
    }
});
