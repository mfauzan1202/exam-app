@php
    $footer = '<label for="editModal' . $item["_id"] . '" class="btn btn-secondary mb-8">Batal</label> <button type="submit" form="formEditItem' . $item["_id"] . '" class="btn btn-primary">Simpan</button>
';@endphp

<x-modal id="editModal{{ $item['_id'] }}" title="Edit Item" :footer="$footer">
    <form id="formEditItem{{ $item['_id'] }}" method="POST" action="{{ route('items.update', $item['_id']) }}">
        @method('PUT')
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="input input-bordered w-full"
                value="{{ $item['title'] }}" />
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description"
                class="input input-bordered w-full">{{ $item['description'] }}</textarea>
        </div>
        <div>
            <label for="dueDate" class="block text-sm font-medium text-gray-700 mb-1">Due Date</label>
            <input type="date" name="dueDate" id="dueDate" class="input input-bordered w-full"
                value="{{ \Carbon\Carbon::parse($item['dueDate'])->format('Y-m-d') }}" onclick="this.showPicker()" />
        </div>
        <div>
            <label for="priority">Priority</label>
            <select name="priority" id="priority" class="input input-bordered w-full">
                <option value="Low" {{ $item['priority'] == 'Low' ? 'selected' : '' }}>Low</option>
                <option value="Medium" {{ $item['priority'] == 'Medium' ? 'selected' : '' }}>Medium</option>
                <option value="High" {{ $item['priority'] == 'High' ? 'selected' : '' }}>High</option>
                <option value="Critical" {{ $item['priority'] == 'Critical' ? 'selected' : '' }}>Critical</option>
            </select>
        </div>
        <div>
            <label for="status">Status</label>
            <select name="status" id="status" class="input input-bordered w-full">
                <option value="Not Started" {{ $item['status'] == 'Not Started' ? 'selected' : '' }}>Not Started</option>
                <option value="In Progress" {{ $item['status'] == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                <option value="Completed" {{ $item['status'] == 'Completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </div>
        <div>
            <label for="tags">Tags</label>
            <input type="text" name="tags" id="tags" class="input input-bordered w-full"
                value="{{ implode(',', $item['tags']) }}" placeholder="Enter tags separated by commas" />
        </div>
    </form>
</x-modal>