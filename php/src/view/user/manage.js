function submitForm() {
    console.log("injss")
    $.ajax({
        type: "POST",
        url: "manage.php",
        cache: false,
        data: $('form#insertForm').serialize(),
        success: function (response) {
            $("#insertUser").html(response);
            $("#insertModal").modal('hide');
            //location.reload();
        },
        error: function () {
            alert("Error");
        }
    });
}

function editForm(){
    $.ajax({
        type: "POST",
        url: "manage.php",
        cache: false,
        data: $('form#editForm').serialize(),
        success: function (response) {
            if(response)
            {
                location.href = "./userProfile.php";
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


function load_data(type, id = '') {
    $.ajax({
        url: "manage.php",
        method: "POST",
        data: {
            type: type,
            id: id
        },
        dataType: "json",
        success: function(data) {
            var html = '';
            for (var count = 0; count < data.length; count++) {
                html += '<option value="' + data[count].id + '">' + data[count].name + '</option>';
            }
            if (type == 'province') {
                $('#province_item').html(html);
                $('#province_item').selectpicker('refresh');
            } else if(type == 'district') {
                $('#district_item').html(html);
                $('#district_item').selectpicker('refresh');
            } else if(type == 'sub_district'){
                $('#sub_district_item').html(html);
                $('#sub_district_item').selectpicker('refresh');
            }
        }
    })
}

function initMap() {
    map = new google.maps.Map(document.getElementById("map"), {
      center: { lat: -34.397, lng: 150.644 },
      zoom: 8,
    });
}