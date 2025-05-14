// Todo: Zaman aşımı (10dk)
setTimeout(function () {
    window.location.href = "cikis.php";
}, 10 * 60 * 1000);

// Todo: Hamburger Menu
document.addEventListener("DOMContentLoaded", function () {
    const hamburger = document.getElementById('hamburger');
    const navMenu = document.getElementById('nav-menu');

    hamburger.addEventListener('click', function () {
        hamburger.classList.toggle('open');
        navMenu.classList.toggle('open');
    });

    window.addEventListener('scroll', function () {
        if (navMenu.classList.contains('open')) {
            hamburger.classList.remove('open');
            navMenu.classList.remove('open');
        }
    });
});