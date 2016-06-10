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

    $(".open3").click(function() {
        $(".frm").hide("fast");
        $("#sf4").show("slow");
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
        $(".frm").hide("fast");
        $("#sf6").show("slow");
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
        newdiv.innerHTML = '</br><div id="generated_'+counter+'"><div class="form-group"><div class="form-inline"><div class="form-group"><label for="instrument'+counter+'" class="control-label">Instrument '+counter+'&nbsp;</label><input type="text" class="form-control" id="instrument_'+counter+'" placeholder="" required=""></div><div class="form-group"><label for="sel'+counter+'">&nbsp;Level:&nbsp;</label><select class="form-control" id="instrument_'+counter+'_select"><option value="">-</option><option value="grade1">Grade 1</option><option value="grade2">Grade 2</option><option value="grade3">Grade 3</option><option value="grade4">Grade 4</option><option value="grade5">Grade 5</option><option value="grade6">Grade 6</option><option value="grade7">Grade 7</option><option value="grade8">Grade 8</option><option value="diploma">Diploma</option><option value="concert_soloist">Concert Soloist</option></select></div></div></div></div>';
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
