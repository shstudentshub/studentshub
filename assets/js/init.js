/* This module is for the initialization of components */
$(function(){
    // Wait for window load
    $(window).load(function() {
        // Animate loader off screen
        $(".se-pre-con").fadeOut("slow");;
    });

	//initialize the side nav
    $(".button-collapse").sideNav();

    //initialize the modal
    $('.modal').modal();

    //initialize the select element
    $('select').material_select();

    //initialize the dropdown
    $(".dropdown-trigger").dropdown();

    //initialize the carousel
    $('.intro-carousel').carousel({fullWidth: true});
    $('.recent-added-carousel').carousel();

    setInterval(function() {
    	$('.intro-carousel').carousel('next');
    },5000);

    $(".parallax").parallax();
});
