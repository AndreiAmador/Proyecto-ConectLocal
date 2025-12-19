let backToTopClicks = 0;
const backToTopBtn = document.getElementById('backToTop');

backToTopBtn.addEventListener('click', () => {
    backToTopClicks++;

    if (backToTopClicks === 10) {
        activateCometMode();
    }
});