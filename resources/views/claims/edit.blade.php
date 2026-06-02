<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">
            Edit Claim
        </h2>
    </x-slot>

    <div class="py-6 px-6">

        <form action="{{ route('claims.update', $claim->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label>Status</label>

            <select name="claim_status">
                <option value="pending">Pending</option>
                <option value="approved">Approved</option>
                <option value="rejected">Rejected</option>
            </select>

            <br><br>

            <button type="submit" style="background:blue;color:white;padding:10px 20px;">
                Update Claims
            </button>

        </form>

    </div>
</x-app-layout>