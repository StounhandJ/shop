$(document).ready(function () {
    $(function cutProductOveflowParagraph() {
        var cut = document.getElementsByClassName("cut-title");
        for (var i = 0; i < cut.length; i++) {
            cut[i].innerText =
                cut[i].innerText.slice(0, 70) +
                (cut[i].innerText.length < 70 ? "" : "...");
        }
    });
});
