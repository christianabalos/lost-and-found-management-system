<x-app-layout>
    <x-slot name="header">
        <h2 style="font-size:32px;font-weight:bold;">
            Claims
        </h2>
    </x-slot>

    <div class="p-6">

        @if(Auth::user()->role !== 'admin')
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
        @endif

        @if(session('success'))
            <div style="
                background:#d1fae5;
                color:#065f46;
                padding:12px;
                border-radius:10px;
                margin-bottom:15px;">
                {{ session('success') }}
            </div>
        @endif

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

                    @if(Auth::user()->role === 'admin')
                        <th style="text-align:left;">Claimant</th>
                    @endif

                    <th style="text-align:left;">Item</th>
                    <th style="text-align:center;">Status</th>

                   <th style="text-align:center;">Actions</th>
                </tr>

            </thead>

            <tbody>

                @forelse($claims as $claim)

                <tr style="border-bottom:1px solid #e5e7eb;">

                    <td style="text-align:center;">
                        {{ $claim->id }}
                    </td>

                    @if(Auth::user()->role === 'admin')
                        <td>
                            {{ $claim->user->name ?? 'Unknown User' }}
                        </td>
                    @endif

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

                        @elseif($claim->claim_status == 'claimed')
                            <span style="
                                background:#dbeafe;
                                color:#1e40af;
                                padding:8px 18px;
                                border-radius:999px;
                                font-weight:bold;">
                                Claimed
                            </span>

                        @elseif($claim->claim_status == 'under_review')
                            <span style="
                                background:#ede9fe;
                                color:#6d28d9;
                                padding:8px 18px;
                                border-radius:999px;
                                font-weight:bold;">
                                Under Review
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

                    @if(Auth::user()->role === 'admin')

                        <a href="{{ route('claims.edit', $claim->id) }}"
                        style="color:#2563eb;text-decoration:none;font-weight:bold;">
                            Review
                        </a>

                        &nbsp;|&nbsp;

                        <form action="{{ route('claims.destroy', $claim->id) }}"
                            method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    onclick="return confirm('Delete this claim?')"
                                    style="background:none;border:none;color:#dc2626;cursor:pointer;font-weight:bold;">
                                Delete
                            </button>
                        </form>

                    @else

                        <a href="{{ route('claims.edit', $claim->id) }}"
                        style="color:#2563eb;text-decoration:none;font-weight:bold;">
                            Edit
                        </a>

                        &nbsp;|&nbsp;

                        <form action="{{ route('claims.destroy', $claim->id) }}"
                            method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    onclick="return confirm('Delete this claim?')"
                                    style="background:none;border:none;color:#dc2626;cursor:pointer;font-weight:bold;">
                                Delete
                            </button>
                        </form>

                    @endif

                </td>

                </tr>

                @empty

                <tr>
                    <td colspan="5"
                        style="text-align:center;padding:30px;">
                        No claims found.
                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

    </div>
</x-app-layout>