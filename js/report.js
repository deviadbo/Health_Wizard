//no fields are selected
var len = document.getElementsByClassName("fid").length;
for (var i = 1; i <= len; i++) {
    $('#f' + i).hide();
}

//after being clicked, toggle the field state
$('.form-check-input').click(function () {
    var index = (this.id.toString()).substr("cb".length);
    $("#f" + index).toggle();
});

//validate that at least one check box is selected
function checkboxs() {
    var checkboxs = document.getElementsByClass("form-check-input");
    var okay = false;
   for (var i = 0, l = checkboxs.length; i < l; i++) {
        if (checkboxs[i].checked) {
            okay = true;
        }
    }
    if (okay == false) return false;
    else return true;
}

//call validation function
$('#buildReportBtn').click(function () {
    if (checkboxs() == false) { alert("You must select at least one field!"); }
});

//select/unselect all fields
var numOfClicks = 0;
$('#selectAllBtn').click(function () {

    if (numOfClicks % 2 == 0) {
        $('.form-check-input').prop('checked', true);
        for (var i = 1; i <= len; i++)
            $("#f" + i).show();
    } else {
        $('.form-check-input').prop('checked', false);
        for (var i = 1; i <= len; i++)
            $("#f" + i).hide();
    }
    numOfClicks++;

});

//display modal
document.getElementById("buildReportBtn").onclick = function () {
    //if data sent correctly
    if (checkboxs() == true) {
        
    // Get the modal
        var modal = document.getElementById("myModal");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("closeModal")[0];

        // When the user clicks on the button, open the modal
        modal.style.display = "block";

        // When the user clicks on <span> (x), close the modal
        span.onclick = function () {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    }
}