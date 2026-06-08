<x-app-layout>
    <x-slot name="header">
        <h2 style="font-size:32px;font-weight:bold;">
            Add Found Report
        </h2>
    </x-slot>

<div style="padding:20px;">

    <form action="{{ route('found-reports.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <p><strong>Item Name</strong></p>

        <input type="text"
               name="item_name"
               required
               placeholder="Enter found item"
               style="width:100%;padding:10px;">

        <br><br>

        <p><strong>Category</strong></p>

        <select name="category"
                required
                style="width:100%;padding:10px;">

            <option value="">Select Category</option>
            <option value="Electronics">Electronics</option>
            <option value="Documents">Documents</option>
            <option value="Personal Belongings">Personal Belongings</option>
            <option value="School Supplies">School Supplies</option>
            <option value="Others">Others</option>

        </select>

        <br><br>

        <p><strong>Description</strong></p>

        <textarea name="description"
                  rows="4"
                  required
                  placeholder="Describe the found item"
                  style="width:100%;padding:10px;"></textarea>

        <br><br>

        <p><strong>Date Found</strong></p>

        <input type="date"
               name="date_found"
               required
               style="width:100%;padding:10px;">

        <br><br>

        <p><strong>Location Found</strong></p>

        <input type="text"
               name="location_found"
               required
               placeholder="Enter location"
               style="width:100%;padding:10px;">

        <br><br>

        <p><strong>Upload Item Photo</strong></p>

        <input type="file"
               name="item_image"
               accept="image/*"
               required
               style="width:100%;padding:10px;">

        <br><br>

        <button type="submit"
                style="
                    background:#2563eb;
                    color:white;
                    padding:12px 25px;
                    border:none;
                    border-radius:10px;
                    cursor:pointer;
                ">
            Save Found Report
        </button>

    </form>

</div>

</x-app-layout>
