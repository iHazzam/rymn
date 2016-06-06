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

    //$(document).ready(function(){
    //    $('#strings').click(function() {
    //        $("#string-children").toggle(this.checked);
    //    });
    //    $('#wind').click(function() {
    //        $("#wind-children").toggle(this.checked);
    //    });
    //    $('#brass').click(function() {
    //        $("#brass-children").toggle(this.checked);
    //    });
    //    $('#keys').click(function() {
    //        $("#keys-children").toggle(this.checked);
    //    });
    //    $('#percussion').click(function() {
    //        $("#percussion-children").toggle(this.checked);
    //    });
    //    $('#singing').click(function() {
    //        $("#singing-children").toggle(this.checked);
    //    });
    //});
