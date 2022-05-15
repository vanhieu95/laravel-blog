@props(['trigger'])

<div x-data="{ open: false}" @click.away="open=false">
    {{-- Trigger--}}
    <div @click="open = !open">
        {{ $trigger }}
    </div>
    {{-- Links--}}
    <div x-show="open" class="absolute py-2 bg-gray-100 mt-2 rounded-xl w-full z-50 max-h-52 overflow-auto" style="display: none">
        {{ $slot }}
    </div>
</div>
