document.addEventListener('DOMContentLoaded', () => {

    const overlay = document.getElementById('card-overlay');
    const modal = document.getElementById('card-modal');

    if (!overlay || !modal) return;

    // Abrir modal solo en cards con clase card-modal-trigger
    document.addEventListener('click', (e) => {
        const card = e.target.closest('.card-modal-trigger');
        if (!card) return;

        // Evitar que botones o links dentro de la card abran el modal
        if (e.target.closest('a, button')) return;

        // Generar contenido del modal con botón de cerrar
        modal.innerHTML = `<button class="modal-close" aria-label="Cerrar">✕</button>${card.innerHTML}`;
        overlay.classList.add('show');
        document.body.style.overflow = 'hidden';
    });

    // Cerrar modal al hacer clic fuera del modal
    overlay.addEventListener('click', (e) => {
        if (e.target === overlay) closeModal();
    });

    // Cerrar modal al presionar Escape
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') closeModal();
    });

    // Cerrar modal al hacer clic en el botón
    modal.addEventListener('click', (e) => {
        if (e.target.classList.contains('modal-close')) {
            closeModal();
        }
    });

    function closeModal() {
        overlay.classList.remove('show');
        modal.innerHTML = '';
        document.body.style.overflow = '';
    }

});
