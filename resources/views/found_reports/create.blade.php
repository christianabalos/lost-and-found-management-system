<x-app-layout>
    <x-slot name="header">
        <h2>Add Found Report</h2>
    </x-slot>

    <div style="padding:20px;">

        <form action="{{ route('found-reports.store') }}" method="POST">
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

            <p>Date Found</p>

            <input type="date"
                   name="date_found"
                   style="width:100%;padding:10px;">

            <br><br>

            <p>Location Found</p>

            <input type="text"
                   name="location_found"
                   style="width:100%;padding:10px;">

            <br><br>

            <button type="submit"
                    style="background:blue;color:white;padding:10px 20px;">
                Save Found Report
            </button>

        </form>

    </div>
</x-app-layout>