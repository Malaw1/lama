// Theme color settings
var url =  $(location).attr("protocol")+"//"+$(location).attr("hostname");

$(document).ready(function() {
    function store(name, val) {
        if (typeof (Storage) !== "undefined") {
            localStorage.setItem(name, val);
        } else {
            window.alert('Please use a modern browser to properly view this template!');
        }
    }


        $('body').addClass($('ul.layouts li.active a').data('layout'));

        $("*[data-theme]").click(function (e) {
            e.preventDefault();
            var currentStyle = $(this).attr('data-theme');
            store('theme', currentStyle);
            $('#theme').attr("href", url + "/css/colors/" + currentStyle + ".css");
        });


        $('#themecolors').on('click', 'a', function () {
            $('#themecolors li a').removeClass('working');
            $(this).addClass('working');
        });

});

