const canvas = document.getElementById('stars');
const ctx = canvas.getContext('2d');

let stars = [];
const STAR_COUNT = 120;   // cantidad
const SPEED = 0.15;       // velocidad

function resizeCanvas() {
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
}
window.addEventListener('resize', resizeCanvas);
resizeCanvas();

function createStars() {
    stars = [];
    for (let i = 0; i < STAR_COUNT; i++) {
        stars.push({
            x: Math.random() * canvas.width,
            y: Math.random() * canvas.height,
            r: Math.random() * 1.2 + 0.2,
            s: Math.random() * SPEED + 0.05
        });
    }
}
createStars();

function drawStars() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    ctx.fillStyle = 'rgba(255, 255, 255, 0.6)';

    stars.forEach(star => {
        ctx.beginPath();
        ctx.arc(star.x, star.y, star.r, 0, Math.PI * 2);
        ctx.fill();

        star.y += star.s;

        if (star.y > canvas.height) {
            star.y = 0;
            star.x = Math.random() * canvas.width;
        }
    });

    requestAnimationFrame(drawStars);
}

drawStars();