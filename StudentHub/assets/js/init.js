/* This module is for the initialization of components */
$(function(){

	//initialize the side nav
    $(".button-collapse").sideNav();

    //initialize the modal
    $('.modal').modal();

    //initialize the dropdown
    $(".dropdown-trigger").dropdown();

    //initialize the carousel
    $('.carousel').carousel();

    setInterval(function() {
    	$('.carousel').carousel('next');
    },3000);
        
});
