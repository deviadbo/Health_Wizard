// while hovering over the 'zoom in' icon, the image will enlarge
function zoomInImg(id) {
    document.getElementById(id).style.transform = "scale(2)";
    document.getElementById(id).style.transition = "ease 300ms"
}

// while moving the mouse from the 'zoom in' icon, the image will then return to its regular size
function regularZoomImg(id) {
    document.getElementById(id).style.transform = "scale(1)";
}