<x-app-layout>
    <x-slot name="header">
        <h2 style="font-size:32px;font-weight:bold;">
            Edit Lost Report
        </h2>
    </x-slot>

    <div style="padding:20px;">

        <form action="{{ route('lost-reports.update', $lost_report->id) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <p><strong>Item Name</strong></p>

            <input type="text"
                   name="item_name"
                   value="{{ $lost_report->item_name }}"
                   required
                   style="width:100%;padding:10px;">

            <br><br>

            <p><strong>Category</strong></p>

            <select name="category"
                    required
                    style="width:100%;padding:10px;">

                <option value="Electronics"
                    {{ $lost_report->category == 'Electronics' ? 'selected' : '' }}>
                    Electronics
                </option>

                <option value="Documents"
                    {{ $lost_report->category == 'Documents' ? 'selected' : '' }}>
                    Documents
                </option>

                <option value="Personal Belongings"
                    {{ $lost_report->category == 'Personal Belongings' ? 'selected' : '' }}>
                    Personal Belongings
                </option>

                <option value="School Supplies"
                    {{ $lost_report->category == 'School Supplies' ? 'selected' : '' }}>
                    School Supplies
                </option>

                <option value="Others"
                    {{ $lost_report->category == 'Others' ? 'selected' : '' }}>
                    Others
                </option>

            </select>

            <br><br>

            <p><strong>Description</strong></p>

            <textarea name="description"
                      rows="4"
                      required
                      style="width:100%;padding:10px;">{{ $lost_report->description }}</textarea>

            <br><br>

            <p><strong>Date Lost</strong></p>

            <input type="date"
                   name="date_lost"
                   value="{{ $lost_report->date_lost }}"
                   required
                   style="width:100%;padding:10px;">

            <br><br>

            <p><strong>Location Lost</strong></p>

            <input type="text"
                   name="location_lost"
                   value="{{ $lost_report->location_lost }}"
                   required
                   style="width:100%;padding:10px;">

            <br><br>

            <p><strong>Upload New Photo</strong></p>

            <input type="file"
                   name="item_image"
                   accept="image/*">

            <br><br>

            @if($lost_report->item_image)
                <img src="{{ asset($lost_report->item_image) }}"
                     width="120"
                     height="120"
                     style="border-radius:10px;object-fit:cover;">
                <br><br>
            @endif

            <button type="submit"
                    style="
                        background:#2563eb;
                        color:white;
                        padding:12px 25px;
                        border:none;
                        border-radius:10px;
                        cursor:pointer;
                    ">
                Update Lost Report
            </button>

        </form>

    </div>

</x-app-layout>