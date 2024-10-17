

//....................side navbar
$(function()
{
	$('#sidebar_collapse').on('click',function()
	{
		$('#sidebar,#content').toggleClass('active');
	});
});


//....................showing "modal_profile"
function show_profile()
{
	document.getElementById('modal_profile').style.display = 'block';
};


//....................hiding "modal_profile when click outside"
window.addEventListener('mouseup', function(event)
{
	var box = document.getElementById('modal_profile');
	if (event.target != box && event.target.parentNode != box)
	{
        box.style.display = 'none';
    }
});

//....................header js................"
function show_profile() {
// Get the profile modal element
var modal = document.getElementById("modal_profile");

// Display the modal
modal.style.display = "block";
}

// Close the modal when the user clicks outside of it
window.onclick = function(event) {
var modal = document.getElementById("modal_profile");
if (event.target == modal) {
	modal.style.display = "none";
}
}


