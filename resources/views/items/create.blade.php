<x-app-layout>
    <x-slot name="header">
        <h2 style="font-size:32px;font-weight:bold;">
            Add Item
        </h2>
    </x-slot>

<div style="padding:20px;">

    <form action="{{ route('items.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <p><strong>Item Name</strong></p>

        <input type="text"
               name="item_name"
               required
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
                  required
                  style="width:100%;padding:10px;"></textarea>

        <br><br>

        <p><strong>Item Image</strong></p>

        <input type="file"
               name="image"
               accept="image/*"
               style="width:100%;padding:10px;">

        <br><br>

        <p><strong>Status</strong></p>

        <select name="status"
                required
                style="width:100%;padding:10px;">

            <option value="lost">Lost</option>
            <option value="found">Found</option>
            <option value="claimed">Claimed</option>

        </select>

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
            Save Item
        </button>

    </form>

</div>
</x-app-layout>
