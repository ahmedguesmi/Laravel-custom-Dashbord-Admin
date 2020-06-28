// Slide toggle upload form
$(document).ready(function(){
    $("#file-create p").click(function(){
        $("#file-create form").slideToggle("1100");
    });
});

// Confirm file delete
$(document).ready(function() {
    $("#file-dl").click(function() {
        return confirm("Are you sure you want to delete this file?");
    });
});
