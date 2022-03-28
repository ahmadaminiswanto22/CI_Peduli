// dataTabel
$(document).ready(function() {
        $('#example').DataTable();
} );

// sweetalert
const flashData = $('.flash-data').data('flashdata');
if( flashData ) {
    Swal.fire({
        title: 'Data ',
        text: 'Berhasil ' + flashData,
        icon: 'success',
        confirmButtonText: 'Oke'
    });
}
//console.log(flashData);

//tombol hapus
$('.tombol').on('click', function(e) {
  e.preventDefault();
  const href = $(this).attr('href');

  Swal.fire({
      title: 'Apakah Anda Yaikin?',
      text: "Data Akan Dihapus",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Hapus Data!'
    }).then((result) => {
      if (result.isConfirmed) {
       document.location.href = href;
      }
    })
    
});

// ajax edit surat
$(function(){
  $('.tambahSuratMasuk').on('click', function() {
    $('#judulSuratMasuk').html('Tambah Data Surat Masuk');
    $('.modal-footer button[type=submit]').html('Simpan');
    $('#nomor').val("");
    $('#lampiran').val("");
    $('#perihal').val("");
    $('#asal_surat').val("");
    $('#siswa').val("");
    $('#kelas').val("");
    $('#petugas').val("");
    $('#tgl_srtMasuk').val("");
    $('#gambar').val("");
    $('#id_suratMasuk').val("");
  });

  $('.tampilUbahSuratMasuk').on('click', function(){
    $('#judulSuratMasuk').html('Edit Data Surat Masuk');
    $('.modal-footer button[type=submit]').html('Edit');
    $('.modal-body form').attr('action', '<?= base_url();?>SuratMasuk/edit_surat');
    const id_suratMasuk = $(this).data('id');
    // console.log(id);

    $.ajax({
      url:'http://localhost/ci-eSurat/SuratMasuk/getedit_surat',
      data: {id : id_suratMasuk},
      method: 'post',
      dataType: 'json',
      success: function(data){
        // console.log(data);
        $('#nomor').val(data.nomor);
        $('#lampiran').val(data.lampiran);
        $('#perihal').val(data.perihal);
        $('#asal_surat').val(data.asal_surat);
        $('#siswa').val(data.id_siswa);
        $('#kelas').val(data.id_kelas);
        $('#petugas').val(data.petugas);
        $('#tgl_srtMasuk').val(data.tgl_srtMasuk);
        $('#gambar').val(data.gambar);
        $('#output').val(data.gambar);

        $('#id_suratMasuk').val(data.id_suratMasuk);
      }
    }); 
  });
  
});

// ajax edit siswa
$(function(){
  $('.tambahSiswa').on('click', function() {
    $('#judulSiswa').html('Tambah Data Siswa');
    $('.modal-footer button[type=submit]').html('Simpan');
    $('#nis').val("");
    $('#nama').val("");
    $('#jenis_kelamin').val("");
    $('#id_kelas').val("--Pilih Kelas--");
    $('#tempat_lahir').val("");
    $('#tgl_lahir').val("");
    $('#alamt').val("");
    $('#id_siswa').val("");
    
  });

  $('.tampilUbahSiswa').on('click', function(){
    $('#judulSiswa').html('Edit Data Siswa');
    $('.modal-footer button[type=submit]').html('Edit');
    $('.modal-body form').attr('action', 'http://localhost/ci-eSurat/siswa/edit_siswa');
    const id_siswa = $(this).data('id');
    // console.log(id);

    $.ajax({
      url:'http://localhost/ci-eSurat/siswa/getedit_siswa',
      data: {id : id_siswa},
      method: 'post',
      dataType: 'json',
      success: function(data){
        // console.log(data);
        $('#nis').val(data.nis);
        $('#nama').val(data.nama);
        $('#tempat_lahir').val(data.tempat_lahir);
        $('#tgl_lahir').val(data.tgl_lahir);
        $('#alamt').val(data.alamt);
        $('#kelas').val(data.id_kelas);
        $('#id_siswa').val(data.id_siswa);
        if(data.jenis_kelamin=="L"){
          $('input:radio[id=jenis_kelaminL]')[0].checked = true;
          $('input:radio[id=jenis_kelaminP]')[0].checked = false;
        }else{
          $('input:radio[id=jenis_kelaminL]')[0].checked = false;
          $('input:radio[id=jenis_kelaminP]')[0].checked = true;
        }
        
      }
    }); 
  });
  
});

// ajax edit kelas
$(function(){
  $('.tambahKelas').on('click', function() {
    $('#judulKelas').html('Tambah Data Kelas');
    $('.modal-footer button[type=submit]').html('Simpan');
    $('#jenjang').val("--Pilih Jenjang--");
    $('#jurusan').val("--Pilih Jurusan--");
    $('#jmlh').val("");
    $('#id_kelas').val("");
  });

  $('.tampilUbahKelas').on('click', function(){
    $('#judulKelas').html('Edit Data Kelas');
    $('.modal-footer button[type=submit]').html('Edit');
    $('.modal-body form').attr('action', 'http://localhost/ci-eSurat/kelas/edit_kelas');
    const id_kelas = $(this).data('id');
    // console.log(id);

    $.ajax({
      url:'http://localhost/ci-eSurat/kelas/getedit_kelas',
      data: {id : id_kelas},
      method: 'post',
      dataType: 'json',
      success: function(data){
        // console.log(data);
        $('#jenjang').val(data.jenjang);
        $('#jurusan').val(data.jurusan);
        $('#jmlh').val(data.jmlh);
        $('#id_kelas').val(data.id_kelas);
        
      }
    }); 
  });
  
});



