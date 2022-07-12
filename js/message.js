//after the field is being selected, display its value on the right
$('#achieveGoalsInput').on("input",function() {
    $('#achieveGoals').text($(this).val());
})

$('#lowestCompatibilityProductInput').on("input",function() {
    $('#lowestCompatibilityProduct').text($(this).val());
})

$('#compatibilityInput').on("input",function() {
    $('#compatibility').text($(this).val());
})

$('#unachievedGoalInput').on("input",function() {
    $('#unachievedGoal').text($(this).val());
})


document.getElementById("buildReport").onclick = function() {

//make some validations
    if(document.getElementById('lowestCompatibilityProductInput').value == "")

        alert("Please fill in 'Product That Caught My Attention'");

    else if(document.getElementById('unachievedGoalInput').value == "")

        alert("Please fill in 'Unachieved Goal'");

    else {
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("closeModal")[0];

        // When the user clicks on the button, open the modal
        modal.style.display = "block";

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

    }
}





