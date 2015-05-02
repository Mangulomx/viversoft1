$("document").ready(function()
{
     event.preventDefault();
   $("#formuser-create").validate({
       debug: true,
        rules:
        {
            user: {
              required: true,
              minlength: 3,
              maxlength: 10
            },
            password: {
              required: true,
              minlength: 4,
              maxlength: 8
            },
            password_confirmation: {
              required: true,
              minlength: 4,
              maxlength: 8,
              equalTo: "#password"
            },
            email: {
                required: true,
                email:true
            }
        },
        messages: 
        {
            user: 
            {
                required: "El campo usuario no puede quedar vacio",
                minlength: "El mínimo permito son 3 caracteres",
                maxlength: "El máximo permitido 10 caracteres"
            },
            password: 
            {
                required: "El campo password no puede quedar vacio",
                minlength: "El mínimo permitido es de 4 caracteres ",
                maxlength: "El máximo permitido es de 8 caracteres"
            },
            password_confirmation: 
            {
                required: "El campo no puede quedar vacio",
                minlength: "El mínimo permitido es de 4 caracteres ",
                maxlength: "El máximo permitido  de 8 caracteres",
                equalTo: "porfavoz, introduce la misma password"
            },
            email: 
            {
                required: "El campo email no puede quedar vacio",
                email: "Debe ser un email valido"
            }
        },
        
        submitHandler: function (form){
             $.ajax({
                url: 'users/create',
                dataType:'json',
                data: $(form).serialize(),
                type: "POST", 
                success: function(response)
                {
                    if(response.success)
                    {
                        $("#box-modal").modal('hide');
                        window.location.href = "/users";
                    }
                    else(response.error)
                    {
                        $.each(response.errors, function( index, value ) {
                        var errorDiv = "#"+index+"_error";
                        $(errorDiv).addClass('required');
                        $(errorDiv).empty().append(value);
                        });
                        $("#successMessage").empty();
                    }
                },
                error: function(xhr, textStatus)
                {
                    console.log(xhr.status);
                    console.log(textStatus);
                }
            });
        }
                
    });

}); 