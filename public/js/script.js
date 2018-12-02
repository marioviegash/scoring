$(document).ready(function(){
    $('.amoeba').click(function(e){
       if($(this).parent().find('.hidden').length != 0)
           $(this).parent().find('.amoeba-detail').removeClass('hidden');
       else
           $(this).parent().find('.amoeba-detail').addClass('hidden');
    });

    $('#btnAddFriend').click(function(e){
        $('#anotherFriend').append('<div><input type="text" name="name[]" placeholder="Name" style="float: left; width: 48%;" /><input type="email" name="email[]" placeholder="Email" style="float: left; width: 48.5%;"/><button class="btnDelete" type="button" style="float: left; width: 25px; height: 48px; border:none; cursor: pointer;">-</button></div>');

        $('.btnDelete').click(function(e){
            $(this).parent().remove();
        });
    });

    $('.btnAddEmployee').click(function(e){
        $('.dataCriteriaEmployee').append('<div><input class="form-control" placeholder="Input Criteria Employee" value="" name="criteria_employee[]" style="width: 94%; float: left;" /><button class="btnDeleteEmployee" type="button" style="float: left; width: 6%; height: 34px; border:none; cursor: pointer;">-</button><br><br><br></div>');

        $('.btnDeleteEmployee').click(function(e){
            $(this).parent().remove();
        });
    });

    $('.btnDeleteEmployee').click(function(e){
        $(this).parent().remove();
    });

    $('.btnAddInnovator').click(function(e){
        $('.dataCriteriaInnovator').append('<div><input class="form-control" placeholder="Input Criteria Innovator" value="" name="criteria_innovator[]" style="width: 94%; float: left;" /><button class="btnDeleteInnovator" type="button" style="float: left; width: 6%; height: 34px; border:none; cursor: pointer;">-</button><br><br><br></div>');

        $('.btnDeleteInnovator').click(function(e){
            $(this).parent().remove();
        });
    });

    $('.btnDeleteInnovator').click(function(e){
        $(this).parent().remove();
    });
});