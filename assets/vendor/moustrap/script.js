function search() {
    var search = $('#search');
    search.val('');
    search.focus();
}

function home() {
    window.location.href = "home";
}

function proyek() {
    window.location.href = "proyek";
}

function pinjam() {
    window.location.href = "peminjaman";
}

function pegawai() {
    window.location.href = "pegawai";
}

function kembali() {
    window.location.href = "pengembalian";
}

function barang() {
    window.location.href = "barang";
}

function tambahBarang() {
    window.location.href = "barang/tambah";
}

function highLight(letter) {
    var media  = $('.media');
    var hlight = $('.highlight');
    var index  = media.index(hlight);

    console.log('work');
    
    media.eq(index).removeClass('highlight');

    if ( letter === 'k' ) {
        media.eq(index - 1).addClass('highlight');       
    } else if ( letter === 'j' ) {
        media.eq(index + 1).addClass('highlight');
    }

    addShare();
}



Mousetrap.bind({
    'h':home,
    'a':tambahBarang,
    'o':pinjam,
	'i':kembali,
	'l':barang,
	'e':pegawai,
	'p':proyek,
    // '?': function modal() { $('#help').modal('show'); },
    'j': function next() { highLight('j') },
    'k': function prev() { highLight('k') }
});

