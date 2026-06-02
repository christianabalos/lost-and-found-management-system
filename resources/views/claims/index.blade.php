<x-app-layout>
    <x-slot name="header">
        <h2 style="font-size:32px;font-weight:bold;">
            Claims
        </h2>
    </x-slot>

    <div class="p-6">

        <a href="{{ route('claims.create') }}"
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
            + Add Claim
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
                    <th style="text-align:left;">User</th>
                    <th style="text-align:left;">Item</th>
                    <th style="text-align:center;">Status</th>
                    <th style="text-align:center;">Actions</th>
                </tr>

            </thead>

            <tbody>

                @foreach($claims as $claim)

                <tr style="border-bottom:1px solid #e5e7eb;">

                    <td style="text-align:center;">
                        {{ $claim->id }}
                    </td>

                    <td>
                        <strong>{{ $claim->user->name ?? 'No User' }}</strong>
                    </td>

                    <td>
                        {{ $claim->item->item_name ?? 'No Item' }}
                    </td>

                    <td style="text-align:center;">

                        @if($claim->claim_status == 'approved')
                            <span style="
                                background:#d7f3df;
                                color:#166534;
                                padding:8px 18px;
                                border-radius:999px;
                                font-weight:bold;">
                                Approved
                            </span>

                        @elseif($claim->claim_status == 'rejected')
                            <span style="
                                background:#f8d7da;
                                color:#991b1b;
                                padding:8px 18px;
                                border-radius:999px;
                                font-weight:bold;">
                                Rejected
                            </span>

                        @else
                            <span style="
                                background:#fef3c7;
                                color:#92400e;
                                padding:8px 18px;
                                border-radius:999px;
                                font-weight:bold;">
                                Pending
                            </span>
                        @endif

                    </td>

                    <td style="text-align:center;">

                        <a href="{{ route('claims.edit', $claim->id) }}"
                           style="
                                color:#2563eb;
                                text-decoration:none;
                                font-weight:bold;">
                            ✏️ Edit
                        </a>

                        &nbsp;|&nbsp;

                        <form action="{{ route('claims.destroy', $claim->id) }}"
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