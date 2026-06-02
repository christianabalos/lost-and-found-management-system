<x-app-layout>
    <x-slot name="header">
        <h2 style="font-size:32px;font-weight:bold;">
            Lost and Found Items
        </h2>
    </x-slot>

    <div class="p-6">

       <div style="margin-bottom:20px;">

    <a href="{{ route('items.create') }}"
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
        + Add Item
    </a>

    <a href="{{ route('items.export.csv') }}"
       style="
            background:#16a34a;
            color:white;
            padding:12px 25px;
            border-radius:12px;
            text-decoration:none;
            font-size:18px;
            font-weight:bold;
            display:inline-block;
            margin-left:10px;
            box-shadow:0 2px 8px rgba(0,0,0,.15);
       ">
        📄 Export CSV
    </a>

    <a href="{{ route('items.export.xlsx') }}"
       style="
            background:#f59e0b;
            color:white;
            padding:12px 25px;
            border-radius:12px;
            text-decoration:none;
            font-size:18px;
            font-weight:bold;
            display:inline-block;
            margin-left:10px;
            box-shadow:0 2px 8px rgba(0,0,0,.15);
       ">
        📊 Export XLSX
    </a>

    <a href="{{ route('items.export.pdf') }}"
       style="
            background:#dc2626;
            color:white;
            padding:12px 25px;
            border-radius:12px;
            text-decoration:none;
            font-size:18px;
            font-weight:bold;
            display:inline-block;
            margin-left:10px;
            box-shadow:0 2px 8px rgba(0,0,0,.15);
       ">
        📕 Export PDF
    </a>

                </div>

                        <form action="{{ route('items.import') }}"
                    method="POST"
                    enctype="multipart/form-data"
                    style="margin-top:15px;">

                    @csrf

                    <input type="file" name="file" required>

                    <button type="submit"
                            style="
                                background:#7c3aed;
                                color:white;
                                padding:10px 20px;
                                border:none;
                                border-radius:10px;
                                cursor:pointer;
                                margin-left:10px;">
                        📥 Import CSV/XLSX
                    </button>

                </form>

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
                    <th style="text-align:left;">Description</th>
                    <th style="text-align:center;">Status</th>
                    <th style="text-align:center;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($items as $item)

                <tr style="border-bottom:1px solid #e5e7eb;">

                    <td style="text-align:center;">
                        {{ $item->id }}
                    </td>

                    <td>
                        <strong>{{ $item->item_name }}</strong>
                    </td>

                    <td>
                        {{ $item->description }}
                    </td>

                    <td style="text-align:center;">

                        @if($item->status == 'found')
                            <span style="
                                background:#d7f3df;
                                color:#166534;
                                padding:8px 18px;
                                border-radius:999px;
                                font-weight:bold;">
                                Found
                            </span>
                        @else
                            <span style="
                                background:#f8d7da;
                                color:#991b1b;
                                padding:8px 18px;
                                border-radius:999px;
                                font-weight:bold;">
                                Lost
                            </span>
                        @endif

                    </td>

                    <td style="text-align:center;">

                        <a href="{{ route('items.edit', $item->id) }}"
                           style="
                                color:#2563eb;
                                text-decoration:none;
                                font-weight:bold;">
                            ✏️ Edit
                        </a>

                        &nbsp;|&nbsp;

                        <form action="{{ route('items.destroy', $item->id) }}"
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