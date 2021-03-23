function submitForm() {
   console.log("injs")
    $.ajax({
        type: "POST",
        url: "manage.php",
        cache: false,
        data: $('form#insertForm').serialize(),
        success: function (response) {
            console.log(response)
            $("#insertNotification").html(response);
            $("#insertModal").modal('hide');
            //location.reload();
        },
        error: function () {
            alert("Error");
        }
    });
}

$(document).ready(function() {
    $('#newsTable').DataTable({
        "order": [[ 0, "desc" ]]
    });
});

function editForm() {
    $.ajax({
        type: "POST",
        url: "manage.php",
        cache: false,
        data: $('form#editForm').serialize(),
        success: function (response) {
            console.log(response)
            if(response)
            {
                location.href = "./newsDetail.php";
            }
            else
            {
                location.reload();
            }
        },
        error: function () {
            alert("Error");
        }
    });
}