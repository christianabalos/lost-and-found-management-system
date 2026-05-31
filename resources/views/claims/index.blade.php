<x-app-layout>
    <x-slot name="header">
        <h2>Claims</h2>
    </x-slot>

    <div class="p-6">

        <a href="{{ route('claims.create') }}"
           style="background:blue;color:white;padding:10px 20px;display:inline-block;">
            Add Claim
        </a>

        <br><br>

        <table border="1" cellpadding="10" width="100%">
            <tr>
                <th>ID</th>
                <th>User ID</th>
                <th>Item ID</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>

            @foreach($claims as $claim)
            <tr>
                <td>{{ $claim->id }}</td>
                <td>{{ $claim->user_id }}</td>
                <td>{{ $claim->item_id }}</td>
                <td>{{ $claim->claim_status }}</td>

                <td>
                    <a href="{{ route('claims.edit', $claim->id) }}">
                        Edit
                    </a>

                    <form action="{{ route('claims.destroy', $claim->id) }}"
                          method="POST"
                          style="display:inline;">
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