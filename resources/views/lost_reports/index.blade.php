<x-app-layout>
    <x-slot name="header">
        <h2>Lost Reports</h2>
    </x-slot>

    <div style="padding:20px;">

        <a href="{{ route('lost-reports.create') }}"
           style="background:blue;color:white;padding:10px 20px;display:inline-block;">
            Add Lost Report
        </a>

        <br><br>

        <table border="1" cellpadding="10" width="100%">
            <tr>
                <th>ID</th>
                <th>Item ID</th>
                <th>Date Lost</th>
                <th>Location Lost</th>
            </tr>

            @foreach($reports as $report)
            <tr>
                <td>{{ $report->id }}</td>
                <td>{{ $report->item_id }}</td>
                <td>{{ $report->date_lost }}</td>
                <td>{{ $report->location_lost }}</td>
            </tr>
            @endforeach
        </table>

    </div>
</x-app-layout>