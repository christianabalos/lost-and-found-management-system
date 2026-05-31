<x-app-layout>
    <x-slot name="header">
        <h2>Edit Found Report</h2>
    </x-slot>

    <div style="padding:20px;">

        <form action="{{ route('found-reports.update', $foundReport->id) }}" method="POST">
            @csrf
            @method('PUT')

            <p>Item</p>

            <select name="item_id" style="width:100%;padding:10px;">
                @foreach($items as $item)
                    <option value="{{ $item->id }}"
                        {{ $foundReport->item_id == $item->id ? 'selected' : '' }}>
                        {{ $item->item_name }}
                    </option>
                @endforeach
            </select>

            <br><br>

            <p>Date Found</p>

            <input type="date"
                   name="date_found"
                   value="{{ $foundReport->date_found }}"
                   style="width:100%;padding:10px;">

            <br><br>

            <p>Location Found</p>

            <input type="text"
                   name="location_found"
                   value="{{ $foundReport->location_found }}"
                   style="width:100%;padding:10px;">

            <br><br>

            <button type="submit"
                style="background:blue;color:white;padding:10px 20px;">
                Update Report
            </button>

        </form>

    </div>
</x-app-layout>