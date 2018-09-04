$(document).ready(function(){
    // menu mobil
    $('.sidenav').sidenav();

    // carusel slider
    $('.carousel.carousel-slider').carousel({
        fullWidth: true,
        indicators: true,
        next: 3
      });
      
    //dropdown
    $(".dropdown-trigger").dropdown(); 

    //select
    $('select').formSelect();

    //inputs
    $('input#input_text, textarea#textarea2').characterCounter();

    //datepicker
    $('.datepicker').datepicker({
      format: 'yyyy-mm-dd'
    });
  });
  