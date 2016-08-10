var fileLocation = "a";
var i = 0;
var files = [];
rawElement = document.querySelector("#dZUpload");
var myDropzone = rawElement.dropzone;
$(document).ready(function () {
    Dropzone.autoDiscover = false;
    $("#dZUpload").dropzone({
        url: "php/upload.php",
        addRemoveLinks: true,
        maxFiles: 8,
        acceptedFiles: ".pdf,.jpg,.gif,.png",
        success: function (file, data) {
            file.previewElement.id = file.name;
            files[i] = data;
            i++;
            document.getElementById("submit").disabled = '';
        },
        error: function (file, response) {
            $(".dz-preview:last-child").remove();
            if (files.filter(Boolean)[0] == null) {
                jQuery('#dZUpload').removeClass('dz-started');
            }
            document.getElementById('secondary').innerHTML = 'Your file failed to upload or was not a correct format try again';
            document.getElementById('secondary').style.color = '#CB4335';
        },
        removedfile: function (file) {
            var name = file.name;
            files.splice(files.indexOf("uploads/" + name), 1);
            var prev = document.getElementById(name);
            prev.remove();
            if (files.filter(Boolean)[0] == null) {
                jQuery('#dZUpload').removeClass('dz-started');
            }

            $.ajax({
                type: 'POST',
                url: 'php/remove.php',
                data: "file=uploads/" + name,
                dataType: 'html'
            });

        }
    });
});



var convertedFile = [];
$(document).ajaxStart(function () {
    $("#load").fadeIn();
});
$(document).ajaxStop(function () {
    $("#load").fadeOut();
});
$("form#convert").submit(function () {
    var formData = {
        'fileLocation': JSON.stringify(files.filter(Boolean)),
        'type': $('#type').val()
    };
    $.ajax({
        url: "php/convert.php",
        type: 'POST',
        data: formData,
        async: true,
        dataType: 'json',
        success: function (data) {
            convertedFile = data;
            convertedFile = convertedFile.filter(Boolean);
            if (convertedFile[0] == 'Failed') {
                document.getElementById('secondary').innerHTML = 'Your file failed to convert re-upload and try again';
                document.getElementById('secondary').style.color = '#CB4335';
                var myDropzone = rawElement.dropzone;
                myDropzone.removeAllFiles();
                $('.dz-preview').remove();
                exit();
            }
            if (convertedFile[0] == 'Exists') {
                document.getElementById('secondary').innerHTML = 'Your file is already in this format try again';
                rawElement = document.querySelector("#dZUpload");
                var myDropzone = rawElement.dropzone;
                myDropzone.removeAllFiles();
                $('.dz-preview').remove();
                exit();
                document.getElementById('secondary').style.color = '#CB4335';
            } else {
                document.getElementById('secondary').style.display = 'none';
                document.getElementById('dwnld').style.display = '';
                document.getElementById('dwnldBtn').style.display = '';
                document.getElementById("submit").disabled = 'disabled';
                document.getElementById('secondary').style.color = '#252525';
                document.getElementById('test').innerHTML = 'Your file is ready for download: ';
                if (convertedFile.length == 1) {
                    document.getElementById('thumbnail').src = 'php/' + convertedFile[0];
                    document.getElementById('fileName').innerHTML = convertedFile[0].replace('uploads/', '');
                } else {
                    document.getElementById('thumbnail').src = 'php/' + convertedFile[0];
                    document.getElementById('fileName').innerHTML = ('convertedFiles.zip');
                }
                rawElement = document.querySelector("#dZUpload");
                var myDropzone = rawElement.dropzone;
                myDropzone.removeAllFiles();
                $('.dz-preview').remove();
            }
            document.getElementById("extension").value = convertedFile;
        }

    });
    return false;
});



function exit() {
    var formData = {
        'fileLocation': JSON.stringify(files.concat(convertedFile))
    };
    $.ajax({
        url: 'php/remove.php',
        type: 'POST',
        data: formData
    });
}
;


function resetPage() {
    document.getElementById('secondary').style.color = '#252525';
    document.getElementById('secondary').innerHTML = 'Select another file then hit convert';
    document.getElementById('secondary').style.display = '';
    document.getElementById('dwnld').style.display = 'none';
    document.getElementById('dwnldBtn').style.display = 'none';
    files = [];
    convertedFile = [];
    rawElement = document.querySelector("#dZUpload");
    var myDropzone = rawElement.dropzone;
    myDropzone.removeAllFiles();
    $('.dz-preview').remove();
}


$(window).unload(function () {
    exit();
});


var routes = Backbone.Router.extend({
    routes: {
        "terms": "terms",
        "privacy": "privacy",
        'about': 'about',
        '': 'home'
    },
    terms: function () {
        $('#home').hide();
        $('#about').hide();
        $('#privacy').hide();
        $('#terms').show();
    },
    privacy: function () {
        $('#home').hide();
        $('#about').hide();
        $('#terms').hide();
        $('#privacy').show();
    },
    home: function () {
        $('#about').hide();
        $('#home').show();
        $('#terms').hide();
        $('#privacy').hide();
    },
    about: function (data) {
        $('#home').hide();
        $('#terms').hide();
        $('#about').show();
        $('#privacy').hide();

    }
});
var appRoutes = new routes();
Backbone.history.start();
