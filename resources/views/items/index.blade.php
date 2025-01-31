<!DOCTYPE html>
<html>

<head>
    <title>Items CRUD</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4 text-center">Items List</h1>
        <a href="{{ route('items.createItems') }}" class="btn btn-primary mb-4">Add New Item</a>

        <table class="table-auto table-zebra w-full rounded-t-lg overflow-hidden">
            <thead class="bg-gray-100">
                <tr>
                    <th class="text-center border border-zinc-200 p-4">No</th>
                    <th class="text-center border border-zinc-200 p-4">Title</th>
                    <th class="text-center border border-zinc-200 p-4">Description</th>
                    <th class="text-center border border-zinc-200 p-4">Deadline</th>
                    <th class="text-center border border-zinc-200 p-4">Priority</th>
                    <th class="text-center border border-zinc-200 p-4">Status</th>
                    <th class="text-center border border-zinc-200 p-4">Tags</th>
                    <th class="text-center border border-zinc-200 p-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr>
                        <td class="text-center border border-zinc-200 p-4">{{ $loop->iteration }}</td>
                        <td class="border border-zinc-200 p-4">{{ $item['title'] }}</td>
                        <td class="border border-zinc-200 p-4">{{ $item['description'] }}</td>
                        <td class="border border-zinc-200 p-4">{{ \Carbon\Carbon::parse($item['dueDate'])->toDateString() }}
                        </td>
                        <td class="border border-zinc-200 p-4">{{ $item['priority'] }}</td>
                        <td class="border border-zinc-200 p-4">{{ $item['status'] }}</td>
                        <td class="border border-zinc-200 p-4">
                            @foreach($item['tags'] as $tag)
                                <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded-full text-sm">{{ $tag }}</span>
                            @endforeach
                        </td>
                        <td>
                            <div class="flex justify-center items-center">
                                <a class="btn btn-warning mx-2"
                                    href="{{ route('items.editItems', ['item' => base64_encode(json_encode($item))]) }}">Edit</a>

                                <button class="btn btn-error mx-2"
                                    onclick="document.getElementById('delete_modal_{{ $item['_id'] }}').showModal();">
                                    Delete
                                </button>

                                <dialog id="delete_modal_{{ $item['_id'] }}" class="modal">
                                    <div class="modal-box">
                                        <h3 class="text-lg font-bold">{{ $item['title'] }}</h3>
                                        <p class="py-4">Are you sure you want to delete this item?</p>
                                        <div class="modal-action">
                                            <form action="{{ route('items.destroy', $item['_id']) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-primary mx-2"
                                                    onclick="document.getElementById('delete_modal_{{ $item['_id'] }}').close()">
                                                    Cancel
                                                </button>
                                                <button class="btn btn-error mx-2 text-white" type="submit">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </dialog>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>