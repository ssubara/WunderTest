
/*This script save form data in local storage*/

document.getElementById("firstname").value = getSavedValue("firstname");
document.getElementById("lastname").value = getSavedValue("lastname");
document.getElementById("telephone").value = getSavedValue("telephone");
document.getElementById("street").value = getSavedValue("street");
document.getElementById("housenumber").value = getSavedValue("housenumber");
document.getElementById("zipcode").value = getSavedValue("zipcode");
document.getElementById("city").value = getSavedValue("city");
document.getElementById("accountowner").value = getSavedValue("accountowner");
document.getElementById("iban").value = getSavedValue("iban");

/* You can add more inputs to set value. if it's saved */

//Save it to localStorage as (ID, VALUE)
function saveValue(e){
var id = e.id;  // Get user id to save it . 
var val = e.value; // Get the value. 
localStorage.setItem(id, val);// Value will override . 
}
//get the saved value function from localStorage. 
function getSavedValue  (v){
if (localStorage.getItem(v) === null) {
return "";// You can change this to some defualts. 
}
return localStorage.getItem(v);
}
/*End of script save form data in local storage*/