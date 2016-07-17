function getRegList(){
    $.get('/admin/dashboard/getAll', function(data){
        if(data)
        {
            var obj = JSON.parse(data);
            $( "#foo" ).val(obj);

        }
    });
}


function getTeachersList(){
    $.get('/admin/dashboard/getTeach', function(data){
        if(data)
        {
            var obj = JSON.parse(data);
            $( "#foo" ).val(obj);

        }
    });

}
function getGroupsList(){
    $.get('/admin/dashboard/getGroup', function(data){
        if(data)
        {
            var obj = JSON.parse(data);
            $( "#foo" ).val(obj);

        }
    });
}