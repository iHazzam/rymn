$( document ).ready(function() {
    $("#instrument_1").change(function(){
        var selected = $('#instrument_1').val();
        $('#'+selected).prop('disabled', true);
        $('#'+selected).prop('checked', true);
    });
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
        if(($('#instrument_1')[0].checkValidity()) && ($('#instrument_1_select_min')[0].checkValidity()) && ($('#instrument_1_select_max')[0].checkValidity()) && ($('#Qualification')[0].checkValidity()) && ($('#performing_experience')[0].checkValidity()) && ($('#teaching_experience')[0].checkValidity()))
        {
            $(".frm").hide("fast");
            $("#sf4").show("slow");
            if(!$('#incomplete').hasClass('hidden'))
            {
                $("#incomplete").addClass('hidden');
            }
        }
        else{
            $("#incomplete").removeClass('hidden');
        }
    });

    $(".back3").click(function() {
        $(".frm").hide("fast");
        $("#sf2").show("slow");
    });

    $(".open4").click(function() {

            $(".frm").hide("fast");
            $("#sf5").show("slow");

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
var minLimit = 2;
function addInput(divName){
    console.log(counter);
    if (counter == limit)  {
        alert("You have reached the limit of adding 4 inputs");
    }
    else {
        $("#dynamicInput"+counter).removeClass('hidden');
        counter++;
    }
}
function removeInput(divName){
    console.log(counter);
    if (counter == minLimit)  {
        alert("You cannot remove the last input");
    }
    else {
        $("#dynamicInput"+(counter-1)).addClass('hidden');
        counter--;
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