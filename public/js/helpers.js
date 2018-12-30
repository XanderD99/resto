"use strict";

const sendJson = (json, url, callback) => {
    $.ajax({
        url: url,
        type: 'post',
        headers: {
            'X-CSRF-TOKEN': json._token
        },
        data: {
            "json": JSON.stringify(json)
        },
        success: function (data, textStatus, jQxhr) {
            callback(data)
        },
        error: function (jqXhr, textStatus, errorThrown) {
            console.log(jqXhr.responseText)
            console.log(textStatus)
            console.log(errorThrown)
        }
    })
}

const handleForm = (url, form, callback) => {
    sendJson(
        $(form).serializeArray().reduce(function (obj = {}, item) {
            obj[item.name] = item.value
            return obj
        }, {}),
        url, callback
    )
}

const contactSucces = () => {
    const HTML = `<p class='succes'>Reservation has been sent succesfully! We will contact you as soon as possible to confirm your reservation!</p>`

    $('#contact form').fadeOut(750, e => {
        $('#contact form').remove()
        $('#contact .messages').append(HTML)

        setTimeout(() => {
            $('#form_messages p').fadeOut(500, e => {
                $('#form_messages p').remove()
            })
        }, 5000)
    });
}

const reviewSucces = async () => {
    const HTML = `<p class='succes'>Review has been succesfully placed!</p>`

    await newReview()
    $('#write_review').remove()

    $('.modal_container').fadeOut(750, e => {
        $('.modal_container').remove()
        $('#review .messages').append(HTML)
        $('body').toggleClass('modal-open')

        setTimeout(() => {
            $('#review .messages p').fadeOut(500, e => {
                $('#review .messages p').remove()
            })
        }, 5000)
    })
}

const fail = (errors, id) => {
    errors.forEach(error => {
        const errorHtml = `<p class='error'>${error}</p>`
        id === 'contact' ? $(`#${id} .messages`).append(errorHtml) : $(`#${id} .modal .messages`).append(errorHtml)
    })
}

const setReviewHeight = () => {
    while (isOverflowing($('.reviews')[0])) {
        const height = $('.reviews').height()
        $('.reviews').height(height + 10)
    }
}

const isOverflowing =element => {
    return (element.scrollWidth > element.offsetWidth)
}