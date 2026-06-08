<!-- Botón de Inicio de Sesión con loading states -->
<button
    type="button"
    wire:click="loginUser"
    class="btn btn-primary w-full mt-4"
    wire:loading.attr="disabled"
    wire:target="loginUser"
>
    <span wire:loading.remove wire:target="loginUser">Iniciar Sesión</span>
    <span wire:loading wire:target="loginUser">
        <span class="loading loading-spinner loading-sm"></span>
        Iniciando...
    </span>
</button>
