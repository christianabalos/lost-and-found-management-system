<x-app-layout>
    <x-slot name="header">
        <h2 style="font-size:32px;font-weight:bold;">
            Found Reports
        </h2>
    </x-slot>

    <div class="p-6">

        <a href="{{ route('found-reports.create') }}"
           style="
                background:#2563eb;
                color:white;
                padding:12px 25px;
                border-radius:12px;
                text-decoration:none;
                font-size:18px;
                font-weight:bold;
                display:inline-block;
                box-shadow:0 2px 8px rgba(0,0,0,.15);
           ">
            + Add Found Report
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
                    <th style="text-align:center;">ID</th>
                    <th style="text-align:left;">Item</th>
                    <th style="text-align:center;">Date Found</th>
                    <th style="text-align:left;">Location Found</th>
                    <th style="text-align:center;">Actions</th>
                </tr>

            </thead>

            <tbody>

                @foreach($reports as $report)

                <tr style="border-bottom:1px solid #e5e7eb;">

                    <td style="text-align:center;">
                        {{ $report->id }}
                    </td>

                    <td>
                        <strong>{{ $report->item->item_name }}</strong>
                    </td>

                    <td style="text-align:center;">
                        {{ $report->date_found }}
                    </td>

                    <td>
                        {{ $report->location_found }}
                    </td>

                    <td style="text-align:center;">

                        <a href="{{ route('found-reports.edit', $report->id) }}"
                           style="
                                color:#2563eb;
                                text-decoration:none;
                                font-weight:bold;">
                            ✏️ Edit
                        </a>

                        &nbsp;|&nbsp;

                        <form action="{{ route('found-reports.destroy', $report->id) }}"
                              method="POST"
                              style="display:inline;">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    style="
                                        background:none;
                                        border:none;
                                        color:#dc2626;
                                        cursor:pointer;
                                        font-weight:bold;">
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