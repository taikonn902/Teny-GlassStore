document.addEventListener('DOMContentLoaded', function () {
    const popup = document.getElementById('popup');
    const overlay = document.getElementById('overlay');
    const closeButton = document.getElementById('closePopup');

    function openPopup() {
        popup.classList.add('show');
        overlay.style.display = 'block';
    }

    function closePopup() {
        popup.classList.remove('show'); 
        overlay.style.display = 'none';
        setTimeout(() => {
            popup.style.display = 'none';
            popup.classList.remove('show'); 
        }, 300); 
    }

    openPopup();

    closeButton.addEventListener('click', closePopup);
    overlay.addEventListener('click', closePopup);
});
