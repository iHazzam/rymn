
function openModalTeacher(id,name){
    $.get('/teach/teacher_details/'+id, function(data){
        if(data)
        {
            var obj = JSON.parse(data);
            console.log(obj);
            var message = "Email: " + obj.email;
            if(obj.phone){
                message = message + "\n Phone: " + obj.phone;
            }
            if(obj.mobile){
                message = message + "\n Mobile: " + obj.mobile;
            }
            var dialogInstance3 = new BootstrapDialog()
                .setTitle(name)
                .setMessage(message)
                .setType(BootstrapDialog.TYPE_INFO)
                .open();
        }
    });

}
function openModalRepairer(id,name){
    $.get('/teach/repairer_details/'+id, function(data){
        if(data)
        {
            var obj = JSON.parse(data);
            console.log(obj);
            var message = "Email: " + obj.email;
            if(obj.phone){
                message = message + "\n Phone: " + obj.phone;
            }
            if(obj.mobile){
                message = message + "\n Mobile: " + obj.mobile;
            }
            var dialogInstance3 = new BootstrapDialog()
                .setTitle(name)
                .setMessage(message)
                .setType(BootstrapDialog.TYPE_INFO)
                .open();
        }
    });

}
