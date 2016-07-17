
function openModal(id,name){
    $.get('/play/join/get/'+id, function(data){
        if(data)
        {
            var obj = JSON.parse(data);
            console.log(obj);
            var message = "<span class='htb4'>Email: </span> " + obj.email;
            $( "button#"+id).replaceWith( message );

        }
    });

}
