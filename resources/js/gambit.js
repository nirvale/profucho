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
    const hijo = document.getElementById('play-button');
    if (hijo) {
        hijo.parentElement.classList.add('flex', 'flex-col', 'items-center','gap-2', 'mb-2','lg:flex-row', 'gl:items-left');
    } else {
        console.error("No se encontró el elemento con id='play'");
    }
});
