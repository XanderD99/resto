"use strict";

let NP = new NetParticle(document.getElementById('board'))
let repeat = true

$(function() {
    if (getCookie('anim') == 0) {
        repeat = !repeat
        $('#play_button').addClass('play')
    }

    $("#nav-btn").on("click", () => {
        $('nav').toggleClass('open')
    });

    /* click event on all nav items + arrow*/
    $('nav a').on('click', (e) => {
        e.preventDefault()
        $('nav').toggleClass('open')

        setTimeout(scrollTo, 1500, e.target.getAttribute('data-target'))
    });

    $("#open-menu").on("click", (e) => {
        e.preventDefault()
        $('#menu').removeClass('closed')
        $('#menu').addClass('open')
        $(this).addClass('hidden')
    });

    $('#play_button').on('click', (e) => {
        e.preventDefault()
        $('#play_button').toggleClass('play')

        repeat = !repeat
        NP.play(repeat)

        /* update cookie */
        repeat ? document.cookie = `anim=1` : document.cookie = `anim=0`
    });

    $('#contact-form').submit(function(e) {
        e.preventDefault();
        const url = this.getAttribute('action')

        handleForm(url, this, messages => {
            $('#contact .messages p').remove()
            messages.length == 0 ? contactSucces() : fail(messages, 'contact')
        })
    });

    $('#review-form').submit(function(e) {
        e.preventDefault();
        const url = this.getAttribute('action')

        handleForm(url, this, messages => {
            $('#review .messages p').remove()
            messages.length == 0 ? reviewSucces() : fail(messages, 'review')
        })
    });

    $('#write_review').on('click', e => {
        e.preventDefault()

        $('body').toggleClass('modal-open')
        $('.modal_container').fadeIn(1000)
    })

    $('.modal .close').on('click', e => {
        e.preventDefault()

        $('body').toggleClass('modal-open')
        $('.modal_container').fadeOut(1000)
    })

    $(window).on('load', async () => {
        /* as last start animation */
        await NP.init()
        await NP.play(repeat)

        await window.app.update(setReviewHeight)
    })
});

function getCookie(name) {
    var value = "; " + document.cookie;
    var parts = value.split("; " + name + "=");
    if (parts.length == 2) return parts.pop().split(";").shift();
}

/* scroll to function */
function scrollTo(id) {
    $('html, body').animate({
        scrollTop: ($('#' + id).offset().top - 70)
    }, 1000)
}