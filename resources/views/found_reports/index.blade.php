<x-app-layout>
    <x-slot name="header">
        <h2>Found Reports</h2>
    </x-slot>

    <div class="p-6">

        <a href="{{ route('found-reports.create') }}"
           style="background:blue;color:white;padding:10px 20px;display:inline-block;">
            Add Found Report
        </a>

        <table style="width:100%;margin-top:20px;">
            <tr>
                <th>ID</th>
                <th>Item ID</th>
                <th>Date Found</th>
                <th>Location Found</th>
            </tr>

            @foreach($reports as $report)
            <tr>
                <td>{{ $report->id }}</td>
                <td>{{ $report->item_id }}</td>
                <td>{{ $report->date_found }}</td>
                <td>{{ $report->location_found }}</td>
            </tr>
            @endforeach

        </table>

    </div>
</x-app-layout>