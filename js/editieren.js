
$(document).ready(function () {
    const input = document.querySelector('#imageLink');
    const preview = document.querySelector('.preview');

    input.addEventListener('change', updateImageDisplay);

});


function updateImageDisplay() {
    const input = document.querySelector('#imageLink');

    const curFiles = input.files;
    if (curFiles.length === 0) {

    } else {



        var image = document.querySelector(".cardimage");
        image.src = URL.createObjectURL(curFiles[0]);

        $(".image").hide();
        $(".cardimage").show();


    }
}


// https://developer.mozilla.org/en-US/docs/Web/Media/Formats/Image_types
const fileTypes = [
    "image/apng",
    "image/bmp",
    "image/gif",
    "image/jpeg",
    "image/pjpeg",
    "image/png",
    "image/svg+xml",
    "image/tiff",
    "image/webp",
    "image/x-icon"
];

function validFileType(file) {
    return fileTypes.includes(file.type);
}

function returnFileSize(number) {
    if (number < 1024) {
        return number + 'bytes';
    } else if (number >= 1024 && number < 1048576) {
        return (number / 1024).toFixed(1) + 'KB';
    } else if (number >= 1048576) {
        return (number / 1048576).toFixed(1) + 'MB';
    }
}


