/* This module is for the initialization of components */
$(function(){
    // Wait for window load
    $(window).load(function() {
        // Animate loader off screen
        $(".se-pre-con").fadeOut("slow");;
    });

    //initialize the drop down
    $(".dropdown-trigger").dropdown();

    //initialize the modal
    $('.modal').modal();


});
