$( document ).ready(function() {
    console.log( "ready!" );
});


  $(".open1").click(function() {
      if( ($('#firstname')[0].checkValidity()) && ($('#lastname')[0].checkValidity()) && ($('#addr1')[0].checkValidity()) &&($('#city')[0].checkValidity()) && ($('#postcode')[0].checkValidity()))
      {
          $(".frm").hide("fast");
          $("#sf2").show("slow");
          if(!$('#incomplete').hasClass('hidden'))
          {
              $("#incomplete").addClass('hidden');
          }
      }
      else{
          $("#incomplete").removeClass('hidden');
      }
    });

    $(".open2").click(function() {
        if(($('#email')[0].checkValidity()))
        {
            $(".frm").hide("fast");
            $("#sf3").show("slow");
            if(!$('#incomplete').hasClass('hidden'))
            {
                $("#incomplete").addClass('hidden');
            }
        }
        else{
            $("#helpemail").removeClass('hidden');
            $("#incomplete").removeClass('hidden');
        }
    });

    $(".back2").click(function() {
      $(".frm").hide("fast");
      $("#sf1").show("slow");
    });

    $(".open3").click(function() {
        if($('#basicform input[type=checkbox]:checked').length)
        {
            $(".frm").hide("fast");
            $("#sf4").show("slow");
        }
        else{
            $("#helpcheckbox").removeClass('hidden');
        }
    });

    $(".back3").click(function() {
        $(".frm").hide("fast");
        $("#sf2").show("slow");
    });

    $(".open4").click(function() {
        if(($('#instrument_1')[0].checkValidity()) && ($('#instrument_1_select_min')[0].checkValidity()) && ($('#instrument_1_select_max')[0].checkValidity()) && ($('#Qualification')[0].checkValidity()) && ($('#performing_experience')[0].checkValidity()) && ($('#teaching_experience')[0].checkValidity()))
        {
            $(".frm").hide("fast");
            $("#sf5").show("slow");
            if(!$('#incomplete').hasClass('hidden'))
            {
                $("#incomplete").addClass('hidden');
            }
        }
        else{
            $("#incomplete").removeClass('hidden');
        }
    });

    $(".back4").click(function() {
        $(".frm").hide("fast");
        $("#sf3").show("slow");
    });
    $(".open5").click(function() {
        if(($('#minage')[0].checkValidity()) && ($('#maxage')[0].checkValidity()))
        {
            $(".frm").hide("fast");
            $("#sf6").show("slow");
            if(!$('#incomplete').hasClass('hidden'))
            {
                $("#incomplete").addClass('hidden');
            }
        }
        else{
            $("#incomplete").removeClass('hidden');
        }
    });

    $(".back5").click(function() {
        $(".frm").hide("fast");
        $("#sf4").show("slow");
    });
    $(".back6").click(function() {
        $(".frm").hide("fast");
        $("#sf5").show("slow");
    });

var counter = 2;
var limit = 5;
function addInput(divName){
    if (counter == limit)  {
        alert("You have reached the limit of adding 4 inputs");
    }
    else {
        var newdiv = document.createElement('div');
        newdiv.innerHTML = '</br><div id="generated_'+counter+'"> <div class="form-group"> <div class="form-group" id="dynamicInput"> <div class="form-inline"> <div class="form-group"> <label for="instrument'+counter+'" class="control-label">Instrument '+counter+'&nbsp;</label> <select class="form-control" id="instrument_'+counter+'"> <option value="">-</option> <optgroup label="String Instruments"> <option value="Violin">Violin</option> <option value="Viola">Viola</option> <option value="Cello">Cello</option> <option value="Double Bass">Double Bass</option> <option value="Harp">Harp</option> <option value="Guitar">Guitar</option> </optgroup> <optgroup label="Wind Instruments"> <option value="Flute">Flute</option> <option value="Oboe">Oboe</option> <option value="Clarinet">Clarinet</option> <option value="Bassoon">Bassoon</option> <option value="Recorder">Recorder</option> </optgroup> <optgroup label="Brass Instruments"> <option value="Horn">(French) Horn</option> <option value="Trumpet">Trumpet</option> <option value="Trombone">Trombone</option> <option value="Tuba">Tuba</option> </optgroup> <optgroup label="Percussion Instruments"> <option value="Timpani">Timpani</option> <option value="Orchestral_Percussion">Orchestral Percussion</option> <option value="Tuned_Percussion">Tuned Percussion</option> <option value="Drum_Kit">Drum Kit</option> </optgroup> <optgroup label="Keyboard/Piano"> <option value="Piano">Piano</option> <option value="Organ">Organ</option> </optgroup> <optgroup label="Singing"> <option value="Male">Male</option> <option value="Female">Female</option> </optgroup> </select> </div><br><br><div class="form-group"> <label for="sel'+counter+'">&nbsp;Minimum Level:&nbsp;</label> <select  id="instrument_'+counter+'_select_min"> <option value="">-</option> <option value="grade1">Grade 1</option> <option value="grade2">Grade 2</option> <option value="grade3">Grade 3</option> <option value="grade4">Grade 4</option> <option value="grade5">Grade 5</option> <option value="grade6">Grade 6</option> <option value="grade7">Grade 7</option> <option value="grade8">Grade 8</option> <option value="diploma">Diploma</option> <option value="concert_soloist">Concert Soloist</option> </select> </div> <div class="form-group"> <label for="sel'+counter+'">&nbsp;Maximum Level:&nbsp;</label> <select  id="instrument_'+counter+'_select_max"> <option value="">-</option> <option value="grade1">Grade 1</option> <option value="grade2">Grade 2</option> <option value="grade3">Grade 3</option> <option value="grade4">Grade 4</option> <option value="grade5">Grade 5</option> <option value="grade6">Grade 6</option> <option value="grade7">Grade 7</option> <option value="grade8">Grade 8</option> <option value="diploma">Diploma</option> <option value="concert_soloist">Concert Soloist</option> </select> </div> </br> </div> </div>';
        document.getElementById(divName).appendChild(newdiv);
        counter++;
    }
}

function valueChangedTmt()
{
    if($('#tmt-cb').is(":checked"))
        $("#tmt").removeClass('hidden');
    else
        $("#tmt").addClass('hidden');
}
function valueChangedTa()
{
    if($('#ta-cb').is(":checked"))
        $("#ta").removeClass('hidden');
    else
        $("#ta").addClass('hidden');
}
function valueChangedTc()
{
    if($('#tc-cb').is(":checked"))
        $("#tc").removeClass('hidden');
    else
        $("#tc").addClass('hidden');
}
function valueChangedAcc()
{
    if($('#cb-acc').is(":checked"))
        $("#acc").removeClass('hidden');
    else
        $("#acc").addClass('hidden');
}
function valueChangedRepair()
{
    if($('#repair').is(":checked"))
        $("#repair_inst").removeClass('hidden');
    else
        $("#repair_inst").addClass('hidden');
}
// $(".open1").click(function() {
//     if($('#groupform')[0].checkValidity())
//     {
//         $(".frm").hide("fast");
//         $("#sf2").show("slow");
//     }
//     else
//     {
//         $("#incomplete").removeClass('hidden');
//         if(!$('#email')[0].checkValidity())
//         {
//             $("#helpemail").removeClass('hidden');
//         }
//     }
// });