
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
/*END of script save form data in local storage*/

/*Makes form steps and save current step in local storage */


$(document).ready(function() {
    $('.next').click(function(e) {
        e.preventDefault();
        
        var $parentDiv = $(this).closest('div');
        var $nextDiv = $parentDiv.next('div');
        var $divs = $('.divs').removeClass('active');

        if (!$nextDiv.length)
            $nextDiv = $divs.first();

        $nextDiv.addClass('active');
        localStorage.setItem("activeDiv", $nextDiv.index('.divs'));
    });

    $('.previous').click(function(e) {
        e.preventDefault();
        var $parentDiv = $(this).closest('div');
        var $prevDiv = $parentDiv.prev('div');
        var $divs = $('.divs').removeClass('active');
        $prevDiv.addClass('active');
        localStorage.setItem("activeDiv", $prevDiv.index('.divs'));
    });

    var activeIndex = localStorage.getItem("activeDiv");
    if (activeIndex)
        $('.divs').removeClass('active').eq(activeIndex).addClass('active')
});


/* END Makes form steps and save current step in local storage */

/* Submit form  */

var form = document.getElementById("localStorage");
document.getElementById("btn-third").addEventListener("click", function () {
  form.submit();
});

/* END Submit form  */

/* Reset local storage, send form at first step  */

$(document).ready(function() {
    $('#btn-four').click(function(e) {
        e.preventDefault();
        localStorage.clear();
        location.reload();
    });
});
/* END Reset local storage  */


