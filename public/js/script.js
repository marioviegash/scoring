$(document).ready(function(){
    $('.amoeba').click(function(e){
       if($(this).parent().find('.hidden').length != 0)
           $(this).parent().find('.amoeba-detail').removeClass('hidden');
       else
           $(this).parent().find('.amoeba-detail').addClass('hidden');
    });

    $('#btnAddFriend').click(function(e){
        $('#anotherFriend').append('<div><input type="text" name="name" placeholder="Name" style="float: left; width: 48%;" /><input type="email" name="email" placeholder="Email" style="float: left; width: 48.5%;"/><button class="btnDelete" type="button" style="float: left; width: 25px; height: 48px; border:none; cursor: pointer;">-</button></div>');

        $('.btnDelete').click(function(e){
            $(this).parent().remove();
        });
    });
});