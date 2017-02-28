(function($){
  $(function(){

    $('.button-collapse').sideNav();
    $('select').material_select(function() {
      $("#close-combo").click(function(){
        $('input.select-dropdown').trigger('close');
      });

      });


     $('.datepicker').pickadate({
	selectMonths: true,//Creates a dropdown to control month
	selectYears: 15,//Creates a dropdown of 15 years to control year
	labelMonthNext: 'Siguiente',
	labelMonthPrev: 'Anterior',
	//The title label to use for the dropdown selectors
	labelMonthSelect: 'Mes',
	labelYearSelect: 'Año',
	//Months and weekdays
	monthsFull: [ 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre' ],
	monthsShort: [ 'Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic' ],
	weekdaysFull: [ 'Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado' ],
	weekdaysShort: [ 'Dom', 'Lun', 'Mar', 'Mier', 'Juev', 'Vie', 'Sab' ],
	//Materialize modified
	weekdaysLetter: [ 'D', 'L', 'M', 'M', 'J', 'V', 'S' ],
	//Today and clear
	today: 'Hoy',
	clear: 'Limpiar',
	close: 'Cerrar',
	//The format to show on the `input` element
	format: 'mm/dd/yyyy'
    });


  }); // end of document ready
})(jQuery); // end of jQuery name space
