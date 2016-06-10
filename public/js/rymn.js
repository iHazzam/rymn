/**
 * Created by harry_000 on 10/06/2016.
 */
//functions to stick the awesome email bar :D
$( document ).ready(function() {
    console.log($(document).height());
    $(".stick").css("bottom",($(document).height() > 955) ? 0 : 60);
});
$(window).scroll(function(){
    $(".stick").css("bottom",Math.max(0,60-$(this).scrollBottom()));
});

$.fn.scrollBottom = function() {
    return $(document).height() - this.scrollTop() - this.height();
};

$.fn.distToBottom= function() {
    return $(document).height()  - this.height();
};


$(document).ready(function(){
    alert('working');
    $(".teacherpanel").click(function(){
        $("#myModal").modal('show');
    });
});