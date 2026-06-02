<x-app-layout>
    <x-slot name="header">
        <h2>Edit Item</h2>
    </x-slot>

    <div style="padding:20px;">
        <form action="{{ route('items.update', $item->id) }}" method="POST">
            @csrf
            @method('PUT')

            <p>Item Name</p>
            <input type="text"
                   name="item_name"
                   value="{{ $item->item_name }}"
                   style="width:100%;padding:10px;">

            <br><br>

            <p>Description</p>
            <textarea name="description"
                      style="width:100%;padding:10px;">{{ $item->description }}</textarea>

            <br><br>

            <p>Status</p>
            <select name="status" style="width:100%;padding:10px;">
                <option value="lost" {{ $item->status == 'lost' ? 'selected' : '' }}>
                    Lost
                </option>

                <option value="found" {{ $item->status == 'found' ? 'selected' : '' }}>
                    Found
                </option>
            </select>

            <br><br>

            <button type="submit" style="background:blue;color:white;padding:10px 20px;">
                Update Item
            </button>
        </form>
    </div>
</x-app-layout>