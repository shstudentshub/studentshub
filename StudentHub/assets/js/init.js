/* This module is for the initialization of components */
$(function(){

	//initialize the side nav
    $(".button-collapse").sideNav();

    //initialize the modal
    $('.modal').modal();

    //initialize the dropdown
    $(".dropdown-trigger").dropdown();

    //initialize the carousel
    $('.intro-carousel').carousel({fullWidth: true});
    $('.recent-added-carousel').carousel();

    setInterval(function() {
    	$('.intro-carousel').carousel('next');
    },5000);

});
