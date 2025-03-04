// APP GLOBAL CUSTOM FUNCTIONS

function link(url) {
    location.href = url;
}

function back() {
    history.back();
}

function btnLoading(element, text = "") {
    var btnText = $(element).text();
    $(element).prop("disabled", true);
    $(element).html(`
        <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
        ${text != "" ? text : btnText}  
    `);
}

function btnLoadingReset(element, text = "") {
    var btnText = $(element).text();
    $(element).prop("disabled", false);
    setTimeout(function () {
        $(element).html(btnText);
    }, 1000);
}
