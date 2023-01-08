$("#list_check").click(function () {
    $('input:checkbox').not(this).prop('checked', this.checked);
    if ($('input[name="list[]"]:checked').length > 0) {
        $('#btn_teacher_delete').removeAttr('disabled');
    } else {
        $('#btn_teacher_delete').attr('disabled','disabled');
    }
});

$('input[name="list[]"]').click(function () {
    if ($('input[name="list[]"]:checked').length > 0) {
        $('#btn_teacher_delete').removeAttr('disabled');
    } else {
        $('#btn_teacher_delete').attr('disabled','disabled');
    }
});

$(function () {
    $('#btn_teacher_delete').click(function (event) {
        event.preventDefault();
        $('#modal-delete').modal('show');
        $('#btn-delete-ok').click(function () {
            $('#form_delete_teacher').submit();
        });
    });

    $('.btn-delete-teacher').click(function (event) {
        event.preventDefault();
        $('#modal-delete').modal('show');
        let idDelete = $(this).attr('id');
        $('#btn-delete-ok').click(function () {
            $('input[name="account_id"]').val(idDelete);
            $('#form_delete').submit();
        });
    });

    $('.btn-update-teacher').click(function (event) {
        event.preventDefault();
        //console.log($(this).attr('id'), $(this).attr('teacher'))
        $('input[name="account_update_id"]').val($(this).attr('id'));
        $('input[name="account_update_name"]').val($(this).attr('name_user'));
        $('.account_update_email').val($(this).attr('email'));
        $('#modal-update-teacher').modal('show');
    });

});
