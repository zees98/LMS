$(document).ready(function () {
    $('.book-shelf').addClass('col-lg-4 col-md-4 col-sm-6');
    $('.book-shelf').click(function () {
        // alert("Hello");
        console.log($(this).find('h5').slideToggle());
    });
    $('.book-shelf img').on('mouseenter', function () {
        $(this).addClass('book-shelf-anim');
    });
});

