{{--<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">--}}
{{--    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">--}}

{{--        <div class="fixed inset-0 transition-opacity">--}}
{{--            <div class="absolute inset-0 bg-gray-500 opacity-10"></div>--}}
{{--        </div>--}}

{{--        <!-- This element is to trick the browser into centering the modal contents. -->--}}
{{--        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​--}}

{{--        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">--}}
{{--            <form>--}}
{{--                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">--}}
{{--                    <div class="">--}}
{{--                        <div class="mb-4">--}}
{{--                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>--}}
{{--                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" placeholder="Enter Title" wire:model="title">--}}
{{--                            @error('title') <span class="text-red-500">{{ $message }}</span>@enderror--}}
{{--                        </div>--}}
{{--                        <div class="mb-4">--}}
{{--                            <label for="exampleFormControlInput2" class="block text-gray-700 text-sm font-bold mb-2">Body:</label>--}}
{{--                            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput2" wire:model="body" placeholder="Enter Body"></textarea>--}}
{{--                            @error('body') <span class="text-red-500">{{ $message }}</span>@enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">--}}
{{--        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">--}}
{{--          <button wire:click.prevent="store()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">--}}
{{--            Save--}}
{{--          </button>--}}
{{--        </span>--}}
{{--                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">--}}

{{--          <button wire:click="closeModal()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">--}}
{{--            Cancel--}}
{{--          </button>--}}
{{--        </span>--}}
{{--            </form>--}}
{{--        </div>--}}

{{--    </div>--}}
{{--</div>--}}
{{--</div>--}}

<x-jet-dialog-modal id="1" maxWidth="2xl" wire:model="isOpen">
    <x-slot name="title">
        Dialog modal title
    </x-slot>
    <x-slot name="content">
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

    </x-slot>

    {{--在这里还可以使用@livewire再进行套组件 livewire最终结论: 无限俄罗斯套娃 @livewire('equipment-lw', ['usage' => 'chooser'])--}}

    <x-slot name="footer">
        <x-jet-secondary-button data-dismiss="modal" wire:click="closeModal()">
            Nevermind
        </x-jet-secondary-button>

        <x-jet-button class="ml-2" wire:click="updateApiToken"
                      {{--                      wire:click="$emit('updateApiToken', {{ $token->id }})"--}}
                      wire:click="closeModal()"
                      data-dismiss="modal">
            Save
        </x-jet-button>
    </x-slot>

</x-jet-dialog-modal>



