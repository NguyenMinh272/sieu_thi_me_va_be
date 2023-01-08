$(function () {
  $('a.btn-delete').click(function (event) {
    event.preventDefault();
    $('#modal-delete').modal('show');
    let idDelete = $(this).attr('id');
    $('#btn-delete-ok').click(function () {
      $('#form_'+idDelete).submit();
    });
  });
  $("#toast_error").toast('show');
  $("#toast_success").toast('show');
});