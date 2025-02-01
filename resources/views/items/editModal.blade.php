@php
    $footer = '<label for="edit_modal' . $item["id"] . '" class="btn btn-secondary mb-8">Batal</label> <button type="submit" form="formEditModal' . $item["id"] . '" class="btn btn-primary">Edit Item</button>'
@endphp

<x-modal id="edit_modal_{{ $item['id'] }}" title="Edit Item" :footer="$footer">
    <form id="formEditModal{{ $item['id'] }}" action="{{ route('items.update', $item['id']) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" name="name" id="name"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                value="{{ $item['name'] }}">
        </div>
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" id="description"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ $item['description'] }}</textarea>
        </div>
    </form>
</x-modal>