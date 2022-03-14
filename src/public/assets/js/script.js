$(document).ready(function(e){
    $("body").on("click","#deletebtn", function(e){
        if(confirm("Are you sure?")){
            form.submit();
        }
    });
});