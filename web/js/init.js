(function($){
  $(function(){

    $('.button-collapse').sideNav();
    $('select').material_select(function() {
      $("#close-combo").click(function(){
        $('input.select-dropdown').trigger('close');
      });

      });
    $('.datepicker').pickadate({
      selectMonths: true, // Creates a dropdown to control month
      selectYears: 15 // Creates a dropdown of 15 years to control year
    });


  }); // end of document ready
})(jQuery); // end of jQuery name space