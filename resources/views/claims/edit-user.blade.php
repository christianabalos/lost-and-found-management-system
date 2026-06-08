<x-app-layout>
    <x-slot name="header">
        <h2>Edit Claim</h2>
    </x-slot>

    <div class="py-6 px-6">

        @if ($errors->any())
            <div style="background:#f8d7da;color:#721c24;padding:10px;margin-bottom:15px;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('claims.update', $claim->id) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <label>Item</label>

            <select name="item_id"
                    style="width:100%;padding:10px;">

                @foreach($items as $item)

                    <option value="{{ $item->id }}"
                        {{ $claim->item_id == $item->id ? 'selected' : '' }}>

                        {{ $item->item_name }}

                    </option>

                @endforeach

            </select>

            <br><br>

            <label>Reason</label>
            <textarea name="reason"
                      rows="4"
                      style="width:100%;padding:10px;">{{ old('reason', $claim->reason) }}</textarea>

            <br><br>

            <label>Unique_Identifier</label>
            <textarea name="unique_identifiers"
                      rows="4"
                      style="width:100%;padding:10px;">{{ old('unique_identifiers', $claim->unique_identifiers) }}</textarea>

            <br><br>

            <label>Date Lost</label>
            <input type="date"
                   name="date_lost"
                   value="{{ old('date_lost', $claim->date_lost) }}"
                   style="width:100%;padding:10px;">

            <br><br>

            <label>Location Lost</label>
            <input type="text"
                   name="location_lost"
                   value="{{ old('location_lost', $claim->location_lost) }}"
                   style="width:100%;padding:10px;">

            <br><br>

            <label>Proof of Ownership Image (Optional)</label>

            <input type="file"
                   name="proof_image"
                   accept=".jpg,.jpeg,.png,image/*"
                   style="width:100%;padding:10px;">

            @if($claim->proof_image)
                <br><br>

                <p><strong>Current Image:</strong></p>

                <img src="{{ asset($claim->proof_image) }}"
                    alt="Proof Image"
                    style="max-width:300px;border:1px solid #ccc;padding:5px;">
            @endif

            <br><br>

            <button type="submit"
                    style="background:blue;color:white;padding:10px 20px;border:none;border-radius:5px;">
                Update Claim
            </button>

        </form>

    </div>
</x-app-layout>