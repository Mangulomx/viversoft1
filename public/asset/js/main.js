$(document).ready(function()
{
    $("#link-modal").click(function(e)
    {
        e.preventDefault();
        $("#box-modal").modal();
    });
    
    $("#box-modal").on("shown", function()
    {
        $(this).find('.modal-body').css(
                {
                   width:'auto',
                   height:'auto',
                   maxheight:'100%'
                });
        $("button#submit").click(function(){
           alert("hola");
        });
    });
});


