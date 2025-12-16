window.addEventListener('load', () => {
    const loader = document.getElementById('page-loader');
    if (!loader) return;

    loader.style.opacity = '0';
    loader.style.pointerEvents = 'none';

    setTimeout(() => {
        loader.remove();
    }, 300);
});

document.querySelectorAll('a').forEach(link => {
    link.addEventListener('click', () => {
        const loader = document.getElementById('page-loader');
        if (loader) {
            loader.style.opacity = '1';
            loader.style.pointerEvents = 'auto';
        }
    });
});