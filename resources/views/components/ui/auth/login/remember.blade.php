<!-- Recordarme y Olvidé contraseña -->
<div class="flex items-center justify-between mb-3 mt-3">
    <label class="label cursor-pointer gap-2">
        <input
            id="checkbox"
            type="checkbox"
            wire:model="remember"
            class="checkbox checkbox-primary checkbox-sm"
        />
        <span class="label-text">Recordarme</span>
    </label>
    <a href="{{ route('welcome') }}" class="link link-primary text-sm" wire:navigate>
        ¿Olvidaste tu contraseña?
    </a>
</div>
