<!DOCTYPE html>
<html>

<head>
    <title>Items CRUD</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4 text-center">Items List</h1>
        {{-- <a href="{{ route('items.createItems') }}" class="btn btn-primary mb-4">Add New Item</a> --}}
        <label for="add_modal" class="btn btn-primary mb-4">Add New Item</label>

        <table class="table-auto table-zebra w-full rounded-t-lg overflow-hidden">
            <thead class="bg-gray-100">
                <tr>
                    <th class="text-center border border-zinc-200 p-4">No</th>
                    <th class="text-center border border-zinc-200 p-4">Name</th>
                    <th class="text-center border border-zinc-200 p-4">Description</th>
                    <th class="text-center border border-zinc-200 p-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr>
                        <td class="text-center border border-zinc-200 p-4">{{ $loop->iteration }}</td>
                        <td class="border border-zinc-200 p-4">{{ $item['name'] }}</td>
                        <td class="border border-zinc-200 p-4">{{ $item['description'] }}</td>
                        <td class="border border-zinc-200 p-4">
                            <div class="flex justify-center items-center">
                                <label for="edit_modal_{{ $item['id'] }}" class="btn btn-warning mx-2">Edit</label>
                                <label for="delete_modal_{{ $item['id'] }}" class="btn btn-error mx-2">Delete</label>
                                @include('items.editModal')
                                @include('items.deleteModal')
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
@include('items.addModal')
</html>