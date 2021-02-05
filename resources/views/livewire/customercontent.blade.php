
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div style="text-align: center">
                <x-jet-button wire:click="increment">+</x-jet-button>
                <h1>{{ $count }}</h1>
                <x-jet-button wire:click="mines">-</x-jet-button>
            </div>
        </div>
    </div>
</div>
