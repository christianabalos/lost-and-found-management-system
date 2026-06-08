<x-app-layout>
    <x-slot name="header">
        <h2>Add Claim</h2>
    </x-slot>

    <div style="padding:20px;max-width:800px;">

        @if ($errors->any())
            <div style="background:#f8d7da;color:#721c24;padding:10px;margin-bottom:15px;border-radius:5px;">
                <ul style="margin:0;padding-left:20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('claims.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <label>Select Item</label>

        <select name="lost_report_id" required>
            <option value="">-- Select Your Lost Item --</option>

            @foreach($lostReports as $report)
                <option value="{{ $report->id }}">
                    {{ $report->item_name }}
                </option>
            @endforeach
        </select>
        
            <br><br>

            <label>Reason why you lost the item</label>
            <textarea
                name="reason"
                rows="4"
                style="width:100%;padding:10px;">{{ old('reason') }}</textarea>

            <br><br>

            <label>Identify this item</label>
            <textarea
                name="unique_identifiers"
                rows="4"
                style="width:100%;padding:10px;"
                placeholder="Color, scratches, serial number, stickers, marks, contents, etc.">{{ old('unique_identifier') }}</textarea>

            <br><br>

            <label>Date Lost</label>
            <input
                type="date"
                name="date_lost"
                value="{{ old('date_lost') }}"
                style="width:100%;padding:10px;">

            <br><br>

            <label>Location Lost</label>
            <input
                type="text"
                name="location_lost"
                value="{{ old('location_lost') }}"
                placeholder="Where did you lose the item?"
                style="width:100%;padding:10px;">

            <br><br>

            <label>Proof of Ownership (Required)</label>
            <input
                type="file"
                name="proof_image"
                accept=".jpg,.jpeg,.png"
                required
                style="width:100%;padding:10px;">

            <small>
                Upload a receipt, old photo, screenshot, or any proof that supports your claim.
            </small>

            <br><br>

            <button
                type="submit"
                style="background:blue;color:white;padding:10px 20px;border:none;border-radius:5px;cursor:pointer;">
                Submit Claim
            </button>

        </form>

    </div>
</x-app-layout>