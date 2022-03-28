window.addEventListener('DOMContentLoaded', (event) => {
    var currentLocation = window.location.hash;
    console.log(currentLocation);
    var tab_item = $('.tab-item');
    var tab_content = $('.tab-content');
    if (currentLocation == "#sukien") {
        $('.tab-item')[1].classList.add('active')
        $('.tab-content')[1].classList.add('active');
    } else if (currentLocation == "#cauhoithuonggap") {
        $('.tab-item')[2].classList.add('active')
        $('.tab-content')[2].classList.add('active');
    } else if (currentLocation == "#thacmac") {
        $('.tab-item')[3].classList.add('active')
        $('.tab-content')[3].classList.add('active');
    } else if (currentLocation == "") {
        $('.tab-item')[0].classList.add('active')
        $('.tab-content')[0].classList.add('active');
    } else if (currentLocation == "#thongbao") {
        $('.tab-item')[0].classList.add('active')
        $('.tab-content')[0].classList.add('active');
    }
});
