function showAlert(type) {
    const container = document.getElementById('alert-container');
    if (!container) return;

    const messages = {
        success: 'La operación se realizó correctamente.',
        error: 'Ocurrió un problema al procesar la solicitud.',
        warning: 'Verifica los datos ingresados.',
        info: 'Este módulo está en desarrollo.'
    };

    const alert = document.createElement('div');
    alert.className = `alert alert-${type}`;
    alert.innerHTML = `<strong>${capitalize(type)}:</strong> ${messages[type]}`;

    container.appendChild(alert);

    // Fade out automático
    setTimeout(() => {
        alert.style.opacity = '0';
        alert.style.transform = 'translateY(-10px)';
    }, 3000);

    setTimeout(() => {
        alert.remove();
    }, 3500);
}

function capitalize(text) {
    return text.charAt(0).toUpperCase() + text.slice(1);
}