<x-app-layout>

    <x-slot name="header">
        <h2 style="font-size:32px;font-weight:bold;">
            User Management
        </h2>
    </x-slot>

    <div class="p-6">

        @if(session('success'))
            <div style="
                background:#dcfce7;
                color:#166534;
                padding:12px;
                border-radius:10px;
                margin-bottom:20px;
            ">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div style="
                background:#fee2e2;
                color:#991b1b;
                padding:12px;
                border-radius:10px;
                margin-bottom:20px;
            ">
                {{ session('error') }}
            </div>
        @endif

        <table width="100%"
               cellpadding="15"
               style="
                    border-collapse:collapse;
                    background:white;
                    border-radius:18px;
                    overflow:hidden;
                    box-shadow:0 4px 12px rgba(0,0,0,.08);
               ">

            <thead style="background:#2948b8;color:white;">

                <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th width="280">Actions</th>
                </tr>

            </thead>

            <tbody>

                @foreach($users as $user)

                <tr style="border-bottom:1px solid #e5e7eb;">

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $user->id }}</td>

                    <td>
                        {{ $user->full_name ?? $user->name }}
                    </td>

                    <td>{{ $user->email }}</td>

                    <td>{{ ucfirst($user->role) }}</td>

                    <td>
                        @if($user->is_active)
                            <span style="color:green;font-weight:bold;">
                                Active
                            </span>
                        @else
                            <span style="color:red;font-weight:bold;">
                                Inactive
                            </span>
                        @endif
                    </td>

                    <td>

                        <a href="{{ route('users.edit', $user) }}"
                           style="
                                background:#2563eb;
                                color:white;
                                padding:8px 12px;
                                border-radius:8px;
                                text-decoration:none;
                                margin-right:5px;
                           ">
                            Edit
                        </a>

                        <form action="{{ route('users.toggle-status', $user) }}"
                              method="POST"
                              style="display:inline;">
                            @csrf
                            @method('PATCH')

                            <button type="submit"
                                    style="
                                        background:#f59e0b;
                                        color:white;
                                        border:none;
                                        padding:8px 12px;
                                        border-radius:8px;
                                        cursor:pointer;
                                    ">
                                {{ $user->is_active ? 'Deactivate' : 'Activate' }}
                            </button>
                        </form>

                        @if(Auth::id() != $user->id)

                        <form action="{{ route('users.destroy', $user) }}"
                              method="POST"
                              style="display:inline;">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    onclick="return confirm('Delete this user?')"
                                    style="
                                        background:#dc2626;
                                        color:white;
                                        border:none;
                                        padding:8px 12px;
                                        border-radius:8px;
                                        cursor:pointer;
                                    ">
                                Delete
                            </button>
                        </form>

                        @endif

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</x-app-layout>