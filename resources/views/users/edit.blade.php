<x-app-layout>

```
<x-slot name="header">
    <h2 style="
        font-size:32px;
        font-weight:800;
        color:#111827;
        text-transform:uppercase;
    ">
        EDIT USER
    </h2>
</x-slot>

<div class="p-6">

    <div style="
        max-width:800px;
        background:white;
        padding:30px;
        border-radius:18px;
        box-shadow:0 4px 12px rgba(0,0,0,.08);
    ">

        <form method="POST"
              action="{{ route('users.update', $user) }}">

            @csrf
            @method('PUT')

            <div style="margin-bottom:20px;">
                <label style="font-weight:bold;">
                    FIRST NAME
                </label>

                <input type="text"
                       name="first_name"
                       value="{{ $user->first_name }}"
                       style="
                            width:100%;
                            padding:12px;
                            margin-top:6px;
                            border:1px solid #d1d5db;
                            border-radius:8px;
                       ">
            </div>

            <div style="margin-bottom:20px;">
                <label style="font-weight:bold;">
                    MIDDLE NAME
                </label>

                <input type="text"
                       name="middle_name"
                       value="{{ $user->middle_name }}"
                       style="
                            width:100%;
                            padding:12px;
                            margin-top:6px;
                            border:1px solid #d1d5db;
                            border-radius:8px;
                       ">
            </div>

            <div style="margin-bottom:20px;">
                <label style="font-weight:bold;">
                    LAST NAME
                </label>

                <input type="text"
                       name="last_name"
                       value="{{ $user->last_name }}"
                       style="
                            width:100%;
                            padding:12px;
                            margin-top:6px;
                            border:1px solid #d1d5db;
                            border-radius:8px;
                       ">
            </div>

            <div style="margin-bottom:20px;">
                <label style="font-weight:bold;">
                    EMAIL
                </label>

                <input type="email"
                       name="email"
                       value="{{ $user->email }}"
                       style="
                            width:100%;
                            padding:12px;
                            margin-top:6px;
                            border:1px solid #d1d5db;
                            border-radius:8px;
                       ">
            </div>

            <div style="margin-bottom:20px;">
                <label style="font-weight:bold;">
                    CONTACT NUMBER
                </label>

                <input type="text"
                       name="contact_number"
                       value="{{ $user->contact_number }}"
                       style="
                            width:100%;
                            padding:12px;
                            margin-top:6px;
                            border:1px solid #d1d5db;
                            border-radius:8px;
                       ">
            </div>

            <div style="margin-bottom:25px;">
                <label style="font-weight:bold;">
                    ADDRESS
                </label>

                <textarea name="address"
                          rows="4"
                          style="
                            width:100%;
                            padding:12px;
                            margin-top:6px;
                            border:1px solid #d1d5db;
                            border-radius:8px;
                          ">{{ $user->address }}</textarea>
            </div>

            <button type="submit"
                    style="
                        background:#16a34a;
                        color:white;
                        border:none;
                        padding:12px 20px;
                        border-radius:10px;
                        font-weight:bold;
                        cursor:pointer;
                    ">
                UPDATE USER
            </button>

            <a href="{{ route('users.index') }}"
               style="
                    background:#6b7280;
                    color:white;
                    text-decoration:none;
                    padding:12px 20px;
                    border-radius:10px;
                    margin-left:10px;
               ">
                BACK
            </a>

        </form>

    </div>

</div>
```

</x-app-layout>
