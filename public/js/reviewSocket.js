'use strict';
const ws = new WebSocket("ws://resto.local:1234")

$(function () {
    ws.addEventListener("message", e => {
        console.log(`message received ${e.data}`)
    })
});

const newReview = () => {
    window.app.update(setReviewHeight)
    ws.send('lit as fuck broer')
}