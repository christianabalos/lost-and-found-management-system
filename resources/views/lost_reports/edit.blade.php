<x-app-layout>
    <x-slot name="header">
        <h2>Edit Lost Report</h2>
    </x-slot>

    <div style="padding:20px;">

        <form action="{{ route('lost-reports.update', $lost_report->id) }}" method="POST">
            @csrf
            @method('PUT')

            <p>Item</p>

            <select name="item_id">
                @foreach($items as $item)
                    <option value="{{ $item->id }}"
                        {{ $lost_report->item_id == $item->id ? 'selected' : '' }}>
                        {{ $item->id }}
                    </option>
                @endforeach
            </select>

            <br><br>

            <p>Date Lost</p>

            <input type="date"
                   name="date_lost"
                   value="{{ $lost_report->date_lost }}">

            <br><br>

            <p>Location Lost</p>

            <input type="text"
                   name="location_lost"
                   value="{{ $lost_report->location_lost }}">

            <br><br>

            <button type="submit" style="background:blue;color:white;padding:10px 20px;">
                Update lost Report
            </button>

        </form>

    </div>
</x-app-layout>