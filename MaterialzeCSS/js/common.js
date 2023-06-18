$(document).ready(function(){
    $('.slider').slider(
        {
            interval: 3000,
            fullwidth: true,
            indicator: false

        }
    );

    $('.modal').modal();

    $('.tabs').tabs();

    $('.carousel').carousel();

    $('.dropdown-trigger').dropdown();

    $('select').formSelect();

    const mb = document.querySelectorAll('.materialboxed');
    M.Materialbox.init(mb, {});


});


