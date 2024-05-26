import IMask from 'imask'
$(document).ready(function () {
    $(".nav-treeview .nav-link, .nav-link").each(function () {
        var location2 = window.location.protocol + '//' + window.location.host + window.location.pathname;
        var link = this.href;
        if(link == location2){
            $(this).addClass('active');
            $(this).parent().parent().parent().addClass('menu-is-opening menu-open');
        }
    });



    $('.delete-btn').on('click', function () {
        var res = confirm('Вы уверены что хотите удалить запись?');
        if(!res){
            return false;
        }
    });
})

let duration = document.getElementById('duration');
let duration_maskOptions = {
    mask: '00:00'
};
let element = document.getElementById('phone');
let maskOptions = {
    mask: '+{375} (00) 000-00-00'
};

IMask(element, maskOptions);
IMask(duration, duration_maskOptions);
