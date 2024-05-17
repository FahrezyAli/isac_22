$('#pas_foto').change(() => {
    let reader = new FileReader();
    reader.onload = e => {
        $('.view-pasFoto').attr('src', e.target.result);
    }

    reader.readAsDataURL($('#pas_foto')[0].files[0]);
})
