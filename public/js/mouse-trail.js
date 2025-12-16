document.addEventListener('mousemove', (e) => {
    const dot = document.createElement('span');
    dot.className = 'mouse-dot';

    dot.style.left = e.clientX + 'px';
    dot.style.top = e.clientY + 'px';

    document.body.appendChild(dot);

    setTimeout(() => {
        dot.remove();
    }, 500);
});