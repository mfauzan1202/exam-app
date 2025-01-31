@php
    $footer = '<label for="deleteModal' . $item["_id"] . '" class="btn btn-secondary mb-8">Batal</label> <button type="submit" form="formDeleteData' . $item["_id"] . '" class="btn btn-primary">Hapus</button>';
@endphp

<x-modal id="deleteModal{{ $item['_id'] }}" title="Hapus Item" :footer="$footer">
    <form id="formDeleteData{{ $item['_id'] }}" method="POST" action="{{ route('items.destroy', $item['_id']) }}">
        @method('DELETE')
        @csrf
        <p>Apakah Anda yakin ingin menghapus item ini?</p>
    </form>
</x-modal>