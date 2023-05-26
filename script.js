function generateDropdown()
{
    var numDropdowns = document.getElementById("endsNumber").value;
    var container = document.getElementById("dropdownContainer");
    container.innerHTML = "";
    var number = 0;
    //for (var i = 1; i <= numDropdowns; i++) {
        console.log(numDropdowns);
        var end = document.createElement("p")
        end.innerHTML = "End " + (numDropdowns); 
        container.appendChild(end);
        for (var k = 1; k <= 5; k++) {
            var dropdown = document.createElement("select");
            dropdown.name = "score"+number; // Use an array to collect the values
            dropdown.required = true;
            number ++;
            
            scoreOptions = ["X", 10, 9, 8, 7, 6, 5, 4, 3, 2, 1, "M"]
            for (var j = 0; j <= scoreOptions.length-1; j++) {
                var option = document.createElement("option");
                option.value = scoreOptions[j];
                option.text = scoreOptions[j];
                dropdown.appendChild(option);
            }
            //console.log(i);
            container.appendChild(dropdown);
            container.appendChild(document.createElement("br"));

        }
  //  }

    var button = document.getElementById("doneButton");
    button.type = "hidden";

    var submitButton = document.getElementById("submitWrapper")
    submitButton.hidden=false

}
