@php
    $footer = '<label for=\'addModal\' class=\'btn btn-secondary mb-8\'>Batal</label> <button type=\'submit\' form=\'formAddItem\' class=\'btn btn-primary\'>Simpan</button>';
@endphp

<x-modal id="addModal" title="Tambah Item baru" :footer="$footer">
    <form id="formAddItem" method="POST" action="{{ route('items.store') }}">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="input input-bordered w-full" />
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" class="input input-bordered w-full"></textarea>
        </div>
        <div>
            <label for="dueDate">Due Date</label>
            <input type="date" name="dueDate" id="dueDate" class="input input-bordered w-full" />
        </div>
        <div>
            <label for="priority">Priority</label>
            <select name="priority" id="priority" class="input input-bordered w-full">
                <option value="Low">Low</option>
                <option value="Medium">Medium</option>
                <option value="High">High</option>
                <option value="Critical">Critical</option>
            </select>
        </div>
        <div>
            <label for="status">Status</label>
            <select name="status" id="status" class="input input-bordered w-full">
                <option value="Not Started">Not Started</option>
                <option value="In Progress">In Progress</option>
                <option value="Completed">Completed</option>
            </select>
        </div>
        <div>
            <label for="tags">Tags</label>
            <input type="text" name="tags" id="tags" class="input input-bordered w-full"
                placeholder="Enter tags separated by commas" />
        </div>
    </form>
</x-modal>