<x-app-layout>
    <x-slot name="header">
        <h2 style="font-size:32px;font-weight:bold;">
            Lost Reports
        </h2>
    </x-slot>


<div class="p-6">

    <a href="{{ route('lost-reports.create') }}"
       style="
            background:#2563eb;
            color:white;
            padding:12px 25px;
            border-radius:12px;
            text-decoration:none;
            font-size:18px;
            font-weight:bold;
            display:inline-block;
       ">
        + Add Lost Report
    </a>

    <br><br>

    <table width="100%"
           cellpadding="18"
           style="
                border-collapse:collapse;
                background:white;
                border-radius:18px;
                overflow:hidden;
                box-shadow:0 4px 12px rgba(0,0,0,.08);
           ">

        <thead style="background:#2948b8;color:white;">
            <tr>
                <th>ID</th>
                <th>Item Details</th>
                <th>Date Lost</th>
                <th>Location</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>

        @foreach($reports as $report)

            <tr style="border-bottom:1px solid #e5e7eb;">

                <td>{{ $report->id }}</td>

                <td>

                @if($report->item_image)
                    <img
                        src="{{ asset($report->item_image) }}"
                        width="120"
                        height="120"
                        style="border-radius:10px;object-fit:cover;"
                    >
                @endif

                    <strong>{{ $report->item_name }}</strong>

                    <br>

                    <small style="color:#2563eb;">
                        {{ $report->category }}
                    </small>

                    <br>

                    <small>
                        {{ $report->description }}
                    </small>

                </td>

                <td>{{ $report->date_lost }}</td>

                <td>{{ $report->location_lost }}</td>

                <td>

                    <a href="{{ route('lost-reports.edit', $report->id) }}">
                        ✏️ Edit
                    </a>

                    <br><br>

                    <form action="{{ route('lost-reports.destroy', $report->id) }}"
                          method="POST">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                style="
                                    background:none;
                                    border:none;
                                    color:red;
                                    cursor:pointer;
                                ">
                            🗑️ Delete
                        </button>

                    </form>

                </td>

            </tr>

        @endforeach

        </tbody>

    </table>

</div>

</x-app-layout>
