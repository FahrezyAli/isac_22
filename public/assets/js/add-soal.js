$('.input-file').change(x => {
    let reader = new FileReader();

    reader.onload = e => {
        x.target.parentNode.nextElementSibling.setAttribute('src', e.target.result);
    }

    reader.readAsDataURL(x.target.files[0]);
})
