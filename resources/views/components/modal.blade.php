<input type="checkbox" id="{{ $id }}" class="modal-toggle" />
<div class="modal modal-bottom sm:modal-middle" id="{{ $id }}">
    <div class="modal-box">
        <h3 class="font-bold text-lg">{{ $title }}</h3>

        <p class="py-4">
            {{ $slot }}
        </p>

        <div class="modal-action">
            {{-- tanya deepseek ini bedanya apa --}}
            {{-- @if (isset($footer))
            {{ $footer }}
            @else --}}
            @if($footer)
                {!! $footer !!}
            @else
                <label for="{{ $id }}" class="btn">Batal</label>
            @endif
        </div>
    </div>
</div>