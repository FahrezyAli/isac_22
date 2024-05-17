const tabelTim = $('#tabelTim tr');

$('#filterTim').change(e => {
    $('#tabelTim')[0].innerHTML = '';
    switch (e.target.value) {
        case '0':
            no_filter(tabelTim);
            break;
        case '1':
            filter_anggota(tabelTim, 0);
            break;
        case '2':
            filter_anggota(tabelTim, 2);
            break;
        case '3':
            filter_anggota(tabelTim, 3);
            break;
        case '4':
            filter_lomba(tabelTim, 'olym');
            break;
        case '5':
            filter_lomba(tabelTim, 'ui');
            break;
        default:
            break;
    }
})

let no_filter = (datas) => {
    datas.each(x => {
        $('#tabelTim')[0].append(datas[x]);
    });
}

let filter_anggota = (datas, jumlah_anggota) => {
    datas.each(x => {
        if (datas[x].dataset.anggota == jumlah_anggota) {
            $('#tabelTim')[0].append(datas[x]);
        }
    })
}

let filter_lomba = (datas, lomba_apa) => {
    datas.each(x => {
        switch (lomba_apa) {
            case 'olym':
                if (datas[x].dataset.lomba_olym == 1) {
                    $('#tabelTim')[0].append(datas[x]);
                }
                break;
            case 'ui':
                if (datas[x].dataset.lomba_ui == 1) {
                    $('#tabelTim')[0].append(datas[x]);
                }
                break;
            default:
                break;
        }
    })
}
