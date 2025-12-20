const canvas = document.getElementById('stars');
const ctx = canvas.getContext('2d');

let stars = [];
let comets = [];

const STAR_COUNT = 120;
const COMET_COUNT = 15;

const SPEED = 0.15;
let cometMode = false;

/* Resize */
function resizeCanvas() {
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
}
window.addEventListener('resize', resizeCanvas);
resizeCanvas();

/* Crear estrellas */
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

/* Crear cometas */
function createComets() {
    comets = [];
    for (let i = 0; i < COMET_COUNT; i++) {
        comets.push({
            x: Math.random() * canvas.width,
            y: Math.random() * -canvas.height,
            length: Math.random() * 80 + 40,
            speed: Math.random() * 4 + 3,
            opacity: Math.random() * 0.5 + 0.5
        });
    }
}

/* Activar modo cometa */
function activateCometMode() {
    cometMode = true;
    createComets();

    setTimeout(() => {
        cometMode = false;
        createStars();
    }, 10000);
}

/* Loop de dibujo */
function drawStars() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    // ⭐ Estrellas
    ctx.fillStyle = 'rgba(255,255,255,0.6)';
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

    // ☄️ Cometas secretos
    if (cometMode) {
        comets.forEach(comet => {
            ctx.strokeStyle = `rgba(255,255,255,${comet.opacity})`;
            ctx.lineWidth = 2;

            ctx.beginPath();
            ctx.moveTo(comet.x, comet.y);
            ctx.lineTo(
                comet.x - comet.length,
                comet.y - comet.length
            );
            ctx.stroke();

            comet.x += comet.speed;
            comet.y += comet.speed;

            if (comet.y > canvas.height || comet.x > canvas.width) {
                comet.x = Math.random() * canvas.width;
                comet.y = Math.random() * -canvas.height;
            }
        });
    }

    requestAnimationFrame(drawStars);
}

/* Init */
createStars();
drawStars();