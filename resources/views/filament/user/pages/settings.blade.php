<x-filament-panels::page>
    <div class="text-center">
        <img src="http://127.0.0.1:8000/storage/logos/nice and attractive.jpg" alt="Logo" class="mb-4" style="max-width: 200px;">
    </div>
    <form wire:submit.prevent="submit">
        {{ $this->form }}
        <x-filament::button type="submit" class="mt-4">
            Submit
        </x-filament::button>
    </form>
</x-filament-panels::page>
