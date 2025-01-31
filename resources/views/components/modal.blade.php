<input type="checkbox" id="{{ $id }}" class="modal-toggle" />
<div class="modal modal-bottom sm:modal-middle" id="{{ $id }}">
    <div class="modal-box">
        <h3 class="font-bold text-lg">{{ $title }}</h3>

        <div class="py-4">
            {{ $slot }}
        </div>

        <div class="modal-action">
            @if($footer)
                {!! $footer !!}
            @else
                <label for="{{ $id }}" class="btn">Batal</label>
            @endif
        </div>
    </div>
</div>