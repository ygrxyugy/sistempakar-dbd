const btnMulai = document.querySelector('.btnMulai');
const formSurvey = document.querySelector('.formSurvey');

$('.btnMulai').click(function () {
  formSurvey.classList.toggle('d-none');
  btnMulai.classList.toggle('d-none');
});

$(function () {
  $('.tampilModalKeterangan').on('click', function () {
    const id = $(this).data('id');
    $.ajax({
      url: 'http://localhost:8080/user/history/getDataKeterangan',
      data: { id: id },
      method: 'post',
      dataType: 'json',
      success: function (data) {
        $('#penyakit').val(data.penyakit);
        $('#keterangan').val(data.keterangan);
        console.log(data);
      },
    });
  });
});
