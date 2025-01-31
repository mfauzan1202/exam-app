<!DOCTYPE html>
<html>

<head>
    <title>Items CRUD</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4 text-center">Items List</h1>
        <div>
            <label for="addModal" class="btn btn-primary mb-4">Add New Item</label>
        </div>


        {{-- "title": "string",
        "description": "string",
        "dueDate": "date",
        "priority": "Low | Medium | High | Critical",
        "status": "Not Started | In Progress | Completed",
        "tags": ["string"] --}}

        <table class="table-auto table-zebra w-full rounded-t-lg overflow-hidden">
            <thead class="bg-gray-100">
                <tr>
                    <th class="text-center border border-zinc-200 p-4">No</th>
                    <th class="text-center border border-zinc-200 p-4">Title</th>
                    <th class="text-center border border-zinc-200 p-4">Description</th>
                    <th class="text-center border border-zinc-200 p-4">Due Date</th>
                    <th class="text-center border border-zinc-200 p-4">Priority</th>
                    <th class="text-center border border-zinc-200 p-4">Status</th>
                    <th class="text-center border border-zinc-200 p-4">Tags</th>
                    <th class="text-center border border-zinc-200 p-4">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr>
                        <td class="text-center border border-zinc-200 p-4">{{ $loop->iteration }}</td>
                        <td class="border border-zinc-200 p-4">{{ $item['title'] }}</td>
                        <td class="border border-zinc-200 p-4">{{ $item['description'] }}</td>
                        <td class="border border-zinc-200 p-4">{{ $item['dueDate'] }}</td>
                        <td class="border border-zinc-200 p-4">{{ $item['priority'] }}</td>
                        <td class="border border-zinc-200 p-4">{{ $item['status'] }}</td>
                        <td class="border border-zinc-200 p-4">
                            @foreach ($item['tags'] as $tag)
                                <span class="badge badge-primary mx-1">{{ $tag }}</span>
                            @endforeach
                        </td>
                        <td>
                            <div class="flex justify-center items-center">
                                {{-- <a class="btn btn-warning mx-2"
                                    href="{{ route('items.editItems', $item['id']) }}">Edit</a> --}}
                                <label for="editModal{{ $item['_id'] }}" class="btn btn-warning mx-2">Edit</label>
                                <label for="deleteModal{{ $item['_id'] }}" class="btn btn-error mx-2">Delete</label>
                            </div>
                        </td>
                        @include('items.editModal')
                        @include('items.deleteModal')
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @include('items.addModal')
</body>

</html>