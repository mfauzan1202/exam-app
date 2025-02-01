@php
    $footer = '<label for="delete_modal' . $item["id"] . '" class="btn btn-secondary mb-8">Batal</label> <button type="submit" form="formDeleteModal' . $item["id"] . '" class="btn btn-primary">Hapus Item</button>'
@endphp

<x-modal id="delete_modal_{{ $item['id'] }}" title="Hapus Item" :footer="$footer">
    <form id="formDeleteModal{{ $item['id'] }}" action="{{ route('items.destroy', $item['id']) }}" method="POST">
        @csrf
        @method('DELETE')
        <p>Are you sure you want to delete this item?</p>
    </form>
</x-modal>