<x-filament-panels::page>
        <form wire:submit.prevent="submit">
            {{ $this->form }}
            <x-filament::button type="submit" class="mt-4">
                Submit
            </x-filament::button>
        </form>
</x-filament-panels::page>
