$(document).ready(function () {
    $('#notiImportantTable').DataTable({
        "order": [
            [0, "desc"]
        ]
    });
});

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


function editForm() {
    $.ajax({
        type: "POST",
        url: "manage.php",
        cache: false,
        data: $('form#editForm').serialize(),
        success: function (response) {
            
            if(response)
            {
                
                location.href = "./notificationImportantDetail.php";
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

