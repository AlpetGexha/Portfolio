<x-filament::page>
    {{-- get session --}}
    @if (session('status'))
        <div class="relative px-3 py-3 mb-4 border rounded bg-green-200 border-green-300 text-green-800">
            {!! session('status') !!}
        </div>
    @endif
    @if ($errors->any())
        <div class="relative px-3 py-3 mb-4 border rounded bg-red-200 border-red-300 text-red-800">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="continer">
        <form wire:submit.prevent='store()'
            class="relative flex flex-col min-w-0 rounded break-words border bg-white border-1 border-gray-300 shadow mt-1 mb-4 py-2"
            method="POST">
            {{-- @csrf --}}

            <div class="py-3 px-6 mb-0 bg-gray-200 border-b-1 border-gray-300 text-gray-900">
                Shorting Url
            </div>

            <div class="flex-auto p-6">
                <div class="relative flex items-stretch w-full mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Url</span>
                    </div>
                    <input type="text" autofocus wire:model="url" value="{{ old('url') }}"
                        class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                        placeholder="Shkruaj Urln">
                    <button
                        class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline text-gray-600 border-gray-600 hover:bg-gray-600 hover:text-white bg-white hover:bg-gray-700 ms-2"
                        type="submit" id="button-addon2">Shorting</button>
                </div>
                <div class="flex justify-end">
                    <div class="md:w-1/4 pr-4 pl-4" style="margin-right: 6rem;">
                        <input
                            class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                            type="text" wire:model="code" value="{{ old('code') }}" placeholder="costum code">
                    </div>
                </div>
            </div>

        </form>
    </div>
</x-filament::page>
