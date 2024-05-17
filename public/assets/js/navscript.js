const navSlide = () => {
    const burger = document.querySelector('.burger');

    const nav = document.querySelector('.nav-menu');

    const navLinks = document.querySelectorAll('.nav-menu div');

    burger.addEventListener('click', () => {
        //Toggle now
        nav.classList.toggle('nav-active');

        //Animate Links
        navLinks.forEach((link, index) => {
            if (link.style.animation) {
                link.style.animation = ''
            } else {
                link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7 + 0.5}s`;
            }


        });
        //burger animation
        burger.classList.toggle('toggle');
    });
}

navSlide();


// input image
$('.file-control').change(e => {
    let value = e.currentTarget.files[0].name;
    let widthElm = $('#' + e.currentTarget.id + '_filename')[0].offsetWidth;

    if (widthElm < 300) {
        if (value.length > 16) {
            value = value.substring(0, 16) + '...';
        }
    } else if (widthElm < 400) {
        if (value.length > 28) {
            value = value.substring(0, 28) + '...';
        }
    } else if (widthElm >= 400) {
        if (value.length > 40) {
            value = value.substring(0, 40) + '...';
        }
    }

    $('#' + e.currentTarget.id + '_filename')[0].innerHTML = value;
})

// dialog
$('.dialog__bg, .dialog__btn-close').click(() => {
    $('.dialog').map(x => {
        if ($('.dialog')[x].classList.contains('active')) {
            $('.dialog')[x].classList.remove('active')
        }
    })

    $('.dialog__bg').map(x => {
        if ($('.dialog__bg')[x].classList.contains('active')) {
            $('.dialog__bg')[x].classList.remove('active')
        }
    })
})

// close alert
$('.alert__close').click(e => {
    console.log(e);
    e.target.parentElement.style.visibility = 'hidden';
    e.target.parentElement.style.transform = 'translate(-50% - 1rem, -50%)';
    e.target.parentElement.style.opacity = 0;
})
