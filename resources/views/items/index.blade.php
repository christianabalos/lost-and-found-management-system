<x-app-layout>
    <x-slot name="header">
        <h2>Lost and Found Items</h2>
    </x-slot>

    <div class="p-6">

        <a href="{{ route('items.create') }}"
           style="background: blue; color: white; padding: 10px 20px; display:inline-block;">
            Add Item
        </a>

        <br><br>

        <table border="1" cellpadding="10" width="100%">
            <tr>
                <th>ID</th>
                <th>Item</th>
                <th>Description</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>

            @foreach($items as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->item_name }}</td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->status }}</td>

                <td>
                    <a href="{{ route('items.edit', $item->id) }}">
                        Edit
                    </a>

                    <br><br>

                    <form action="{{ route('items.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach

        </table>

    </div>
</x-app-layout>