const flashData = $('.flash-data').data('flashdata');

if (flashdata) {
    Swal.fire({
        title: 'Agenda',
        text: 'Berhasil' + flashData,
        type: 'success'
    });
}

//tombol hapus
$('.tombol-hapus').on('click', function (e) {

    e.preventDefault();

    Swal.fire({
        title: 'Apakaah anda yakin',
        text: "Data Agenda Akan dihapus",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus Data!'

    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })
});


