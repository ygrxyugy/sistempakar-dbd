const btnMulai = document.querySelector('.btnMulai');
const formSurvey = document.querySelector('.formSurvey');

$('.btnMulai').click(function () {
  formSurvey.classList.toggle('d-none');
  btnMulai.classList.toggle('d-none');
});

$(function () {
  $('.btnDetail').on('click', function () {
    const id = $(this).data('id');

    $.ajax({
      url: 'http://localhost/kelasti/ProjekAkhir/getData.php',
      data: { id: id },
      method: 'post',
      dataType: 'json',
      success: function (data) {
        console.log(data);
        $('#nama').val(data.nama);
        $('#ttlTempat').val(data.ttlTempat);
        $('#ttlTanggal').val(data.ttlTanggal);
        $('#gender').val(data.gender);
        $('#kewarganegaraan').val(data.kewarganegaraan);
        $('#pendidikan').val(data.pendidikan);
        $('#agama').val(data.agama);
        $('#pekerjaan').val(data.pekerjaan);
        $('#asuransi').val(data.asuransi);
        $('#alamat').val(data.alamat);
        $('#noHP').val(data.noHP);
        $('#email').val(data.email);
        $('#namaWali').val(data.namaWali);
        $('#hubunganWali').val(data.hubunganWali);
        $('#alamatWali').val(data.alamatWali);
        $('#noHPwali').val(data.noHPwali);
      },
    });
  });
});

$(function () {
  $('.btnPilih').on('click', function () {
    const id = $(this).data('id');

    $.ajax({
      url: 'http://localhost/kelasti/ProjekAkhir/getJadwal.php',
      data: { id: id },
      method: 'post',
      dataType: 'json',
      success: function (data) {
        console.log(data);
        $('#idJadwal').val(data.id);
        $('#jadwal').val(data.jadwal);
        $('#waktu').val(data.waktu);
        $('#kuota').val(data.kuota);
        $('#sisa').val(data.sisa);
      },
    });
  });
});
