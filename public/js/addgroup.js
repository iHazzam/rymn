$( document ).ready(function() {
    console.log( "ready!" );

});


  $(".open1").click(function() {
      if($('#groupform')[0].checkValidity())
      {
          $(".frm").hide("fast");
          $("#sf2").show("slow");
          if(!$("#incomplete".hasClass('hidden')))
          {
              $("#incomplete").addClass('hidden');
          }
      }
      else
      {
          $("#incomplete").removeClass('hidden');
          if(!$('#email')[0].checkValidity())
          {
              $("#helpemail").removeClass('hidden');
          }
      }
    });
    $(".back2").click(function() {
        $(".frm").hide("fast");
        $("#sf1").show("slow");
    });

