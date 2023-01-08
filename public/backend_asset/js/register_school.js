function addTrans() {
  let template = $('#trans_sample').clone().html();
  $('#form-school .delete-trans:last-child').after(template);
  $('#form-school .delete-trans').removeClass('hide');
}

function deleteTrans(e) {
  $(e).parent().prev().remove();
  $(e).parent().remove();
  if ($('#form-school .delete-trans').length === 1) {
    $('#form-school .delete-trans').addClass('hide');
  }
}

$(function () {
  $('#is_change_email').click(function () {
    if ($(this).is(':checked')) {
      $('#mail-container').removeClass('hide')
    } else {
      $('#mail-container').addClass('hide');
    }
  });
});