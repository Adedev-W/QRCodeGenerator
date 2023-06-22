
var selectElement = document.getElementById("floatingSelect1");
for (var i = 1; i <= 20; i++) {
  var optionElement = document.createElement("option");
  optionElement.value = i;
  optionElement.text = i;
  selectElement.appendChild(optionElement);
}
document.getElementById("formqrcode").addEventListener("submit", function(event) {
    var errors = [];
    var selectElement1 = document.getElementById('floatingSelect');
	var selectElement2 = document.getElementById('floatingSelect1');
	var textInput = document.getElementById('floatingInputGroup2');
	var selectedValue1 = selectElement1.value;
	var selectedValue2 = selectElement2.value;
	var inputValue = textInput.value;
	
	var d = [
    "Masukkan data atau teks",
    "Tolong pilih ECC",
    "Tolong pilih Size"   
    ];
    var div = document.querySelectorAll(".invalid-feedback");
    for (let i = 0; i < div.length; i++) {
		if (selectedValue1 === 'Pilih ECC') {
			div[i].textContent = d[i];
			selectElement1.classList.add("is-invalid");
			errors.push("error");
		} else {
			div[i].textContent = "";
			selectElement1.classList.remove("is-invalid");
	        errors.splice(0, errors.length);
			
		}
	    if (selectedValue2 === 'PILIH Ukuran') {
	    	div[i].textContent = d[i];
	    	selectElement2.classList.add("is-invalid");
			errors.push("error");
	    	
	    } else {
	    	div[i].textContent = "";
	    	selectElement2.classList.remove("is-invalid");
	        errors.splice(0, errors.length);
	    }
	    if (inputValue.trim() === '') {
	    	div[i].textContent = d[i];
			textInput.classList.add("is-invalid");
			errors.push("error");
		} else {
			div[i].textContent = "";
			textInput.classList.remove("is-invalid");
	        errors.splice(0, errors.length);
			
		}
    }
	if (errors.length > 0) {
		event.preventDefault();
	}
});


