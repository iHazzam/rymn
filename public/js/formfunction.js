$( document ).ready(function() {
    console.log( "ready!" );
});


  $(".open1").click(function() {
        $(".frm").hide("fast");
        $("#sf2").show("slow");
    });

    $(".open2").click(function() {
        $(".frm").hide("fast");
        $("#sf3").show("slow");
    });

    $(".back2").click(function() {
      $(".frm").hide("fast");
      $("#sf1").show("slow");
    });

    $(".back3").click(function() {
      $(".frm").hide("fast");
      $("#sf2").show("slow");
    });

    $(document).ready(function(){

        $('#strings').change(function() {
            $('#strings-children').removeClass('hidden');
        })
    });