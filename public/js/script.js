// Initialisation Bootstrap Carousel
document.addEventListener('DOMContentLoaded', function () {
    var carousels = document.querySelectorAll('.carousel');
    carousels.forEach(function (carousel) {
        new bootstrap.Carousel(carousel);
    });
});
