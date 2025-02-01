@php
    $footer = '<label for="add_modal" class="btn btn-secondary mb-8">Batal</label> <button type="submit" form="formAddModal" class="btn btn-primary">Tambah Item</button>'
@endphp

<x-modal id="add_modal" title="Add Item" :footer="$footer">
    <form id="formAddModal" action="{{ route('items.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" name="name" id="name"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        </div>
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" id="description"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
        </div>
    </form>
</x-modal>