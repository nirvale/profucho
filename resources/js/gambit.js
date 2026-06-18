window.subTrackerAlive = function subTracker() {
    return {
        showNewButton: true,

        init() {
            // Leer valor inicial
            this.updateFromLivewire();

            // Escuchar cambios en la variable de Livewire
            this.$watch('$wire.suscribed', (value) => {
                // console.log('suscribed cambió a:', value);
                this.showNewButton = !value;  // Si suscribed=true, botón deshabilitado
            });

            // Escuchar evento manual
            Livewire.on('reinit-button-play', () => {
                this.updateFromLivewire();
            });
        },

        updateFromLivewire() {
            // Actualizar desde Livewire
            this.showNewButton = !this.$wire.suscribed;
            // console.log('showNewButton actualizado:', this.showNewButton);
        },

        switchShowNewButton() {
            this.showNewButton = !this.showNewButton;
        },

        get badgeText() {
            return this.showNewButton ? 'Suscríbete ahora' : 'Usted ya está participando';
        },

        get newBoxOpenedBadgeClasses() {
            return this.showNewButton ? 'badge badge-error animate-pulse' : 'badge badge-warning animate-pulse';
        }
    };
}

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

document.addEventListener('DOMContentLoaded', () => {
    const hijo = document.getElementById('play-button1');
    if (hijo) {
        hijo.parentElement.classList.add('flex', 'flex-col', 'items-center','gap-2', 'mb-2','mt-2','lg:flex-row', 'gl:items-left');
    } else {
        // console.error("No se encontró el elemento con id='play-button1'");
    }
});
document.addEventListener('DOMContentLoaded', () => {
    const hijo = document.getElementById('play-button2');
    if (hijo) {
        hijo.parentElement.classList.add('flex', 'flex-col', 'items-center','gap-2', 'mb-2','mt-2','lg:flex-row', 'gl:items-left');
    } else {
        // console.error("No se encontró el elemento con id='play-button2'");
    }
});

document.addEventListener('DOMContentLoaded', () => {
    const hijo = document.getElementById('play-button3');
    if (hijo) {
        hijo.parentElement.classList.add('flex', 'flex-col', 'items-center','gap-2', 'mb-2','mt-2','lg:flex-row', 'gl:items-left');
    } else {
        // console.error("No se encontró el elemento con id='play-button3'");
    }
});

//my_tabs_2
const tab1 = document.getElementById('tabFaseUno');
const tab2 = document.getElementById('tabFaseDos');
const tab3 = document.getElementById('tabFaseTres');

function actualizarAriaLabel() {
  // Si el ancho es menor que 'sm' (640px por defecto en Tailwind)
  if (window.innerWidth < 640) {
    tab1.setAttribute('aria-label', '1 Ronda');
    tab2.setAttribute('aria-label', '2 Ronda');
    tab3.setAttribute('aria-label', '3 Ronda');
  } else {
    // tab1.setAttribute('aria-label', {{__('First Round')}});
  }
}

// Ejecutar al cargar y al redimensionar
window.addEventListener('load', actualizarAriaLabel);
window.addEventListener('resize', actualizarAriaLabel)
//fin tabs
