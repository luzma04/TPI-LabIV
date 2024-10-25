<div class="bg-white shadow-sm text-black rounded-lg overflow-hidden">
    @if(isset($header))
        <div class="px-6 py-4 bg-gray-100 border-b border-gray-200">
            {{ $header }}
        </div>
    @endif

    <div class="px-6 py-4">
        {{ $slot }}
    </div>

    @if(isset($footer))
        <div class="px-6 py-4 bg-gray-100 border-t border-gray-200">
            {{ $footer }}
        </div>
    @endif
</div>
