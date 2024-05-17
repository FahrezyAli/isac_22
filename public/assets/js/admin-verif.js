$('.list__btn--belum-verif').click(e => {
    let data = e.target.dataset;
    $('.list__verif-dialog')[0].setAttribute('action', data.action);
    $('.list__dialog-img')[0].setAttribute('src', data.link);
    $('.list__verif-dialog>.dialog__desc>span')[0].innerHTML = data.tim;

    $('.list__verif-dialog')[0].classList.add('active');
    $('.dialog__bg')[0].classList.add('active');
})

$('.list__btn--sudah-verif').click(e => {
    let data = e.target.dataset;
    $('.list__open-img')[0].setAttribute('src', data.link);

    $('.list__open-img-dialog')[0].classList.add('active');
    $('.dialog__bg')[0].classList.add('active');
})

$('input[name="verify"]').change(e => {
    e.target.form.submit();
})
