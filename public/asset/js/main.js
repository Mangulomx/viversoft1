$("document").ready(function()
{
   $("#formuser-create").submit(function()
   {
      event.preventDefault();
      var form = $(this);
      $.ajax({
         url: 'users/create',
         dataType:'json',
         data: form.serialize(),
         type: "POST", 
         success: function(response)
         {
             if(response.success)
             {
                 alert("ok!");
             }
             else(response.error)
             {
                $.each(response.errors, function( index, value ) {
                $("input[name='"+index+"']" ).css('border-color: #a94442;');
                $("input[name='"+index+"']" ).parent().append(value[0]);
                });
             }
         },
         error: function(xhr, textStatus, thrownError)
         {
             console.log(xhr.status);
             console.log(thrownError);
             console.log(textStatus);
         }
      });
   }); 
});