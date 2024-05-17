let selectProv = document.querySelector('#provinsiSekolah');

if (selectProv.value) {
    fetch('https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=' + selectProv.value).
    then(x => x.json()).then(y => {
        let kota = document.querySelector('#kotaSekolah');
        kota.innerHTML = '';
        for (let i = 0; i < y['kota_kabupaten'].length; i++) {
            let dropDownOption = document.createElement('option');
            dropDownOption.innerText = y['kota_kabupaten'][i]['nama'];
            dropDownOption.setAttribute('value', y['kota_kabupaten'][i]['nama']);
            if (kotaSekolah.dataset.old == y['kota_kabupaten'][i]['nama']) {
                dropDownOption.setAttribute('selected', 'selected');
            }

            kota.appendChild(dropDownOption);
        }
    });
}

selectProv.addEventListener('change', function (e) {
    fetch('https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=' + e.target.value).
    then(x => x.json()).then(y => {
        let kota = document.querySelector('#kotaSekolah');
        kota.innerHTML = '';
        for (let i = 0; i < y['kota_kabupaten'].length; i++) {
            let dropDownOption = document.createElement('option');
            dropDownOption.innerText = y['kota_kabupaten'][i]['nama'];
            dropDownOption.setAttribute('value', y['kota_kabupaten'][i]['nama']);
            kota.appendChild(dropDownOption);
        }
    });
})
