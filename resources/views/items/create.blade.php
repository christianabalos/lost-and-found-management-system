<x-app-layout>
    <x-slot name="header">
        <h2>Add Item</h2>
    </x-slot>

    <div style="padding:20px;">
        <form action="{{ route('items.store') }}" method="POST">
            @csrf

            <p>Item Name</p>
            <input type="text" name="item_name" style="width:100%;padding:10px;">

            <br><br>

            <p>Description</p>
            <textarea name="description" style="width:100%;padding:10px;"></textarea>

            <br><br>

            <p>Status</p>
            <select name="status" style="width:100%;padding:10px;">
                <option value="lost">Lost</option>
                <option value="found">Found</option>
            </select>

            <br><br>

            <button type="submit" style="background:blue;color:white;padding:10px 20px;">
                Save Item
            </button>
        </form>
    </div>
</x-app-layout>