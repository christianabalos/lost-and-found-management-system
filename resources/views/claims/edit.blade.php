<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">
            Review Claim
        </h2>
    </x-slot>

    <div class="py-6 px-6">

        @if ($errors->any())
            <div style="background:#f8d7da;color:#721c24;padding:10px;margin-bottom:15px;border-radius:5px;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div style="background:#f8f9fa;padding:20px;border-radius:8px;margin-bottom:20px;">

            <h3>Claim Information</h3>

            <p>
                <strong>Claimant:</strong>
                {{ $claim->user->name }}
            </p>

            <p>
                <strong>Item:</strong>
                {{ $claim->item->item_name }}
            </p>

            <p>
                <strong>Reason:</strong><br>
                {{ $claim->reason }}
            </p>

            <p>
                <strong>Unique_identifier:</strong><br>
                {{ $claim->unique_identifier }}
            </p>

            <p>
                <strong>Date Lost:</strong>
                {{ $claim->date_lost }}
            </p>

            <p>
                <strong>Location Lost:</strong>
                {{ $claim->location_lost }}
            </p>

            @if($claim->proof_image)
                <p>
                    <strong>Proof of Ownership:</strong>
                </p>

                <img
                    src="{{ asset($claim->proof_image) }}"
                    alt="Proof Image"
                    style="max-width:300px;border:1px solid #ccc;padding:5px;">
            @else
                <p>
                    <strong>Proof of Ownership:</strong>
                    No proof uploaded.
                </p>
            @endif

        </div>

        <form action="{{ route('claims.update', $claim->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label><strong>Claim Status</strong></label>

            <select
                name="claim_status"
                style="width:100%;padding:10px;margin-top:5px;">

                <option value="pending"
                    {{ $claim->claim_status == 'pending' ? 'selected' : '' }}>
                    Pending
                </option>

                <option value="under_review"
                    {{ $claim->claim_status == 'under_review' ? 'selected' : '' }}>
                    Under Review
                </option>

                <option value="approved"
                    {{ $claim->claim_status == 'approved' ? 'selected' : '' }}>
                    Approved
                </option>

                <option value="rejected"
                    {{ $claim->claim_status == 'rejected' ? 'selected' : '' }}>
                    Rejected
                </option>

                <option value="claimed"
                    {{ $claim->claim_status == 'claimed' ? 'selected' : '' }}>
                    Claimed
                </option>

            </select>

            <br><br>

            <label><strong>Admin Notes</strong></label>

            <textarea
                name="admin_notes"
                rows="4"
                style="width:100%;padding:10px;">{{ old('admin_notes', $claim->admin_notes) }}</textarea>

            <br><br>

            <button
                type="submit"
                style="background:green;color:white;padding:10px 20px;border:none;border-radius:5px;">
                Update Claim
            </button>

        </form>

    </div>
</x-app-layout>