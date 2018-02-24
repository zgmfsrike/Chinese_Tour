$(document).ready(function(){
     $('.slider').slider({full_width: true});
     $('.tooltipped').tooltip();
     $('.modal').modal();

     $('.datepicker').pickadate({
       selectMonths: true, // Creates a dropdown to control month
       selectYears: 50, // Creates a dropdown of 15 years to control year,
       today: 'Today',
       clear: 'Clear',
       close: 'Ok',
       closeOnSelect: false, // Close upon selecting a date,
       max: 'Today'
    });
    $('#datepicker').pickadate({
      selectMonths: true, // Creates a dropdown to control month
      selectYears: 50, // Creates a dropdown of 15 years to control year,
      today: 'Today',
      clear: 'Clear',
      close: 'Ok',
      closeOnSelect: false, // Close upon selecting a date,
      min: 'Today'
   });
   $('#datepicker2').pickadate({
     selectMonths: true, // Creates a dropdown to control month
     selectYears: 50, // Creates a dropdown of 15 years to control year,
     today: 'Today',
     clear: 'Clear',
     close: 'Ok',
     closeOnSelect: false, // Close upon selecting a date,
     min: 'Today'
  });

    $('select').material_select();
    $(".button-collapse").sideNav();
    $('.chips-initial').material_chip('data');

});
