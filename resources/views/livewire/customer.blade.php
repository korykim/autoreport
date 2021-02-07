@extends('livewire.mainboard')
@section('customer')
    @parent
    @livewire('customercontent')

    <x-jet-dropdown>
        <x-slot name="trigger">
            <button>Show More...</button>
        </x-slot>

        <x-slot name="content">

            <ul>
                <li><button wire:click="archive">Archive</button></li>
                <li><button wire:click="delete">Delete</button></li>
            </ul>
        </x-slot>

    </x-jet-dropdown>

@endsection
