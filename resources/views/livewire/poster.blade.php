<x-jet-form-section submit="storePostInformation">
    <x-slot name="title">
        发布新文章
    </x-slot>
    <x-slot name="description">
        这里是发布新文章页面
    </x-slot>


    <x-slot name="form">
        <div class="col-span-6 sm:col-span-6">
            <x-jet-label for="title" value="标题" />
            <x-jet-input name="title" type="text" wire:model="title" class="mt-1 block w-full"/>
            <x-jet-input-error for="title" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-6">
            <x-jet-label for="author" value="作者" />
            <x-jet-input name="author[name]" type="text" wire:model="author.name" class="mt-1 block w-full"/>
            <x-jet-input-error for="author.name" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-6">
            <x-jet-label for="body" value="内容" />
            <textarea rows="5" name="body" class="form-input rounded-md shadow-sm mt-1 block w-full">{{ $body }}</textarea>
            <x-jet-input-error for="body" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-button>
            立即发布
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
