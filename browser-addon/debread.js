// Handler when the DOM is fully loaded
$(document).ready(function() {
	// Removes the class that hides the scroll bar and prevents text selection
	$("body").removeClass("modal-open");
	// Removes the ABO + banner
	$("#overlay_wrap").remove();
	$("#tamovl_page_wrap").remove();
	// Removes ad videos in articles
	$(".teads-inread").remove();
});