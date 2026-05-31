<x-app-layout>
    <x-slot name="header">
        <h2>Create Lost Report</h2>
    </x-slot>

    <div style="padding:20px;">
        <form action="{{ route('lost-reports.store') }}" method="POST">
            @csrf

            <p>Item</p>
            <select name="item_id" style="width:100%;padding:10px;">
                @foreach($items as $item)
                    <option value="{{ $item->id }}">
                        {{ $item->item_name }}
                    </option>
                @endforeach
            </select>

            <br><br>

            <p>Date Lost</p>
            <input type="date"
                   name="date_lost"
                   style="width:100%;padding:10px;">

            <br><br>

            <p>Location Lost</p>
            <input type="text"
                   name="location_lost"
                   style="width:100%;padding:10px;">

            <br><br>

            <button type="submit">
                Save Lost Report
            </button>
        </form>
    </div>
</x-app-layout>