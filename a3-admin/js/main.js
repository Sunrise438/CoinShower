function copy(input, tooltip) {
    var copyText = document.getElementById(input, tooltip);
    copyText.select();
    copyText.setSelectionRange(0, 99999);
    navigator.clipboard.writeText(copyText.value);

    var tooltip = document.getElementById(tooltip);
    tooltip.innerHTML = "copied";
    }

    function outCopy() {
    var tooltip = document.getElementById(tooltip);
    tooltip.innerHTML = "copy";
}
