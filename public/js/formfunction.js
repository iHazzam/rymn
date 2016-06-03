$( document ).ready(function() {
    console.log( "ready!" );
});


jQuery().ready(function() {

  $.validator.addMethod("players_not_same", function(value, element) {
   return $('#player2').val() != $('#player1').val()
}, "* Blue Team and Orange Team must not be the same ");
  var v = jQuery("#basicform").validate({
      rules: {
        player1: {
          required:   true,
          players_not_same: true,
        },
        player2: {
          required: true,
        },
        numberofmatches: {
          required: true,
          range: [1, 9],
        }

      },
      errorElement: "span",
      errorClass: "help-inline",
    });

  $(".open1").click(function() {
    if (v.form()) {
        $(".frm").hide("fast");
        $("#sf2").show("slow");
      }
    });

    $(".open2").click(function() {
      if (v.form()) {
        storeGames();
        $(".frm").hide("fast");
        $("#sf3").show("slow");
      }
    });


    $(".back2").click(function() {
      $(".frm").hide("fast");
      $("#sf1").show("slow");
    });

    $(".back3").click(function() {
      $(".frm").hide("fast");
      $("#sf2").show("slow");
    });

});
function storeGames()
{
   var games = document.getElementById("numberofmatches").value;
   var player1 =  document.getElementById("player1").value;
   var player2 =  document.getElementById("player2").value;
   addFields(player1,player2,games);
}

function addFields(player1, player2, number){
    document.getElementById('container').innerHTML = "";
    for (i=0;i<number;i++){
      var dummy = '<div id="allignme1"> \r\n <div class="form-group"> \r\n <label class="col-md-2 control-label" for="p1score'+(i+1)+'">Game '+(i+1)+'</label>\r\n <div class="col-md-4">\r\n <div class="input-group">\r\n <span class="input-group-addon">'+(player1)+'</span>\r\n <input id="prependedtext" name="p1score'+(i+1)+'" class="form-control" placeholder="0" type="number">\r\n </div>\r\n </div>\r\n </div>\r\n <div class="form-group">\r\n <div class="col-md-4">\r\n <div class="input-group">\r\n <input id="appendedtext" name="p2score'+(i+1)+'" class="form-control" placeholder="0" type="number">\r\n <span class="input-group-addon">' + (player2) + '</span>\r\n  </div>\r\n </div>\r\n </div>\r\n <div class="form-group">\r\n <div class="col-md-1">\r\n <div class="input-group">\r\n <p class="form-control">Overtime?</p>\r\n <span class="input-group-addon"> \r\n <input name="overtime'+(i+1)+'" type="checkbox">\r\n </span>\r\n </div>\r\n </div>\r\n </div>\r\n </div>\r\n   <div class="clearfix" style="height: 10px;clear: both;"> \r\n </div>\r\n';
      document.getElementById('container').innerHTML += dummy;
    }
}
