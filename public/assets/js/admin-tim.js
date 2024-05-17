$('.detail__delete-btn').click(e => {
    let data = e.target.dataset;
    $('.detail__delete-dialog')[0].setAttribute('action', data.action);
    $('.detail__delete-dialog>.dialog__desc>span')[0].innerHTML = data.member;

    $('.detail__delete-dialog')[0].classList.add('active');
    $('.dialog__bg')[0].classList.add('active');
})

$('.submit-sertif').change(e => {
    // console.log(e);
    e.target.form.submit();
})