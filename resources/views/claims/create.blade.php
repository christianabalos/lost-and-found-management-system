<x-app-layout>
    <x-slot name="header">
        <h2>Add Claim</h2>
    </x-slot>

    <div style="padding:20px;">

        <form action="{{ route('claims.store') }}" method="POST">
            @csrf

            <p>Select Item</p>

            <select name="item_id" style="width:100%;padding:10px;">
                @foreach($items as $item)
                    <option value="{{ $item->id }}">
                        {{ $item->item_name }}
                    </option>
                @endforeach
            </select>

            <br><br>

            <button type="submit"
                style="background:blue;color:white;padding:10px 20px;">
                Submit Claim
            </button>

        </form>

    </div>
</x-app-layout>