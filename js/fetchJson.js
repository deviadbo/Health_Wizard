

var counter = 0;

function getNutritionalProfile(clientId) {

    $.getJSON("json/health_profile.json", function(data){

        for(i = 1; i < 21; i++) {
            
            if(data.profiles[i-1].id == clientId) {
                var newtd = document.createElement("td");
                var text = document.createTextNode(data.profiles[i-1].nutritional_pro);
                newtd.appendChild(text);
                var parent = document.getElementsByClassName("desc");
                parent[counter++].appendChild(newtd);
            }
        }
    });
}


