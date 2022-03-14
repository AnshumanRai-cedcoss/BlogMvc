$(document).ready(function(e){
    $("body").on("click","#deleteUser", function(e){
        if(confirm("Are you sure?")){
            form.submit();
        }
    });
});