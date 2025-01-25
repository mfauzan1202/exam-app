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
                    <th class="text-center border border-zinc-200 p-4">Price</th>
                    <th class="text-center border border-zinc-200 p-4">Description</th>
                    <th class="text-center border border-zinc-200 p-4">Category</th>
                    <th class="text-center border border-zinc-200 p-4">Image</th>
                    <th class="text-center border border-zinc-200 p-4">Rating</th>
                    <th class="text-center border border-zinc-200 p-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr>
                        <td class="text-center border border-zinc-200 p-4">{{ $loop->iteration }}</td>
                        <td class="border border-zinc-200 p-4">{{ $item['title'] }}</td>
                        <td class="border border-zinc-200 p-4">{{ $item['price'] }}</td>
                        <td class="border border-zinc-200 p-4">{{ $item['description'] }}</td>
                        <td class="border border-zinc-200 p-4">{{ $item['category'] }}</td>
                        <td class="border border-zinc-200 p-4"><img class="w-20" src="{{ $item['image'] }}"
                                alt="{{ $item['title'] }}">
                        </td>
                        <td class="border border-zinc-200 p-4">{{ $item['rating']['rate'] }}</td>
                        <td>
                            <div class="flex justify-center items-center">
                                <a class="btn btn-warning mx-2" href="{{ route('items.editItems', $item['id']) }}">Edit</a>
                                <form action="{{ route('items.destroy', $item['id']) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-error mx-2"
                                        onclick="event.preventDefault(); document.getElementById('delete_modal_{{ $item['id'] }}').showModal();">Delete</button>

                                    <dialog id="delete_modal_{{ $item['id'] }}" class="modal">
                                        <div class="modal-box">
                                            <h3 class="text-lg font-bold">{{ $item['title'] }}</h3>
                                            <p class="py-4">Are you sure you want to delete this item?</p>
                                            <div class="modal-action">
                                                <form method="dialog">
                                                    <button class="btn btn-primary mx-2">Cancel</button>
                                                    <button class="btn btn-error mx-2 text-white"
                                                        type="submit">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </dialog>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>