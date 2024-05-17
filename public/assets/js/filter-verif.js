const tabelVerif = $('#tabelVerif tr');

$('#filterVerif').change(e => {
    $('#tabelVerif')[0].innerHTML = '';
    switch (e.target.value) {
        case '0':
            no_filter(tabelVerif);
        case '1':
            filter_olym(tabelVerif, true);
            break;
        case '2':
            filter_ui(tabelVerif, true);
            break;
        case '3':
            filter_olym(tabelVerif);
            break;
        case '4':
            filter_ui(tabelVerif);
            break;
        default:
            break;
    }
})

let no_filter = (datas) => {
    datas.each(x => {
        $('#tabelVerif')[0].append(datas[x]);
    });
}

let filter_olym = (datas, unverif = false) => {
    datas.each(x => {
        if (unverif) {
            if (datas[x].dataset.lomba_olym == 1 && datas[x].dataset.unverif_olym == 0) {
                $('#tabelVerif')[0].append(datas[x]);
            }
        } else {
            if (datas[x].dataset.lomba_olym == 1) {
                $('#tabelVerif')[0].append(datas[x]);
            }
        }
    })
}

let filter_ui = (datas, unverif = false) => {
    datas.each(x => {
        if (unverif) {
            if (datas[x].dataset.lomba_ui == 1 && datas[x].dataset.unverif_ui == 0) {
                $('#tabelVerif')[0].append(datas[x]);
            }
        } else {
            if (datas[x].dataset.lomba_ui == 1) {
                $('#tabelVerif')[0].append(datas[x]);
            }
        }
    })
}
