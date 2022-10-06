<div class="px-6 py-8">
    <div class="flex">
        <x-jet-input wire:model='texto' type="text" class="w-full mr-3" placeholder="Texto a convertir"></x-jet-input>
        <button wire:click='convertir' class="font-bold py-2 px-3 bg-indigo-600 text-white rounded-md ">Convertir</button>
    </div>

    <div>
        @if ($filename)
            <audio src="{{ $filename }}" controls class="w-auto" type="audio/mp3" autoplay preload="auto"></audio>
        @else
        @endif
    </div>

</div>
@push('scripts')
    <script>
        Livewire.on('reproducir', (text) => {

            responsiveVoice.speak(text, 'Spanish Latin American Male', {
                // rate: 0.7
            });
            console.log(text)
        })
    </script>
@endpush
