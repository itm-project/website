function submitForm() {
   
    $.ajax({
        type: "POST",
        url: "manage.php",
        cache: false,
        data: $('form#insertForm').serialize(),
        success: function (response) {
            $("#insertNotification").html(response);
            $("#insertModal").modal('hide');
            location.reload();
        },
        error: function () {
            alert("Error");
        }
    });
}
