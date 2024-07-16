document.addEventListener('DOMContentLoaded', function() {
    var dropbtn = document.querySelector('.dropbtn');
    var dropdown = document.querySelector('.dropdown');

    dropbtn.addEventListener('click', function(event) {
        event.stopPropagation();
        dropdown.classList.toggle('show');
    });

    document.addEventListener('click', function(event) {
        if (!dropdown.contains(event.target)) {
            dropdown.classList.remove('show');
        }
    });
});
