import KUTE from "kute.js";

var tween = KUTE.fromTo(
    "#Blob",
    {
        path: "#Blob",
    },
    {
        path: "#Blob_2",
    },
    {
        repeat: true,
        yoyo: true,
        duration: 7000,
    }
).start();
