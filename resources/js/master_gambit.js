

document.addEventListener('focus', function(e) {
    const target = e.target;
    // Verificar que sea un div editable de PowerGrid
    if (target.hasAttribute('contenteditable') && target.classList.contains('pg-single-line')) {
        // Limpiar solo si es el valor por defecto "—"
        if (target.textContent === 'Sin marcador') {
            target.textContent = '';
        }
    }
}, true);

// document.addEventListener('DOMContentLoaded', () => {
//     const hijo = document.getElementById('play-button');
//     if (hijo) {
//         hijo.parentElement.classList.add('flex', 'flex-col', 'items-center','gap-2', 'mb-2','lg:flex-row', 'gl:items-left');
//     } else {
//         console.error("No se encontró el elemento con id='play'");
//     }
// });
