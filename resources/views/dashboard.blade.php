<x-app-layout>
    <x-slot name="header">
        <h2 style="font-size:32px;font-weight:bold;">
            Dashboard
        </h2>
    </x-slot>

    <div class="p-6">

        @if(Auth::user()->role == 'admin')

            <h3 style="
                font-size:28px;
                font-weight:bold;
                margin-bottom:20px;">
                Admin Dashboard
            </h3>

            <div style="
                display:grid;
                grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
                gap:20px;
            ">

                <div style="
                    background:#2948b8;
                    color:white;
                    padding:25px;
                    border-radius:18px;
                    box-shadow:0 4px 12px rgba(0,0,0,.08);
                ">
                    <h4>Total Users</h4>
                    <h1>{{ $totalUsers }}</h1>
                </div>

                <div style="
                    background:#2563eb;
                    color:white;
                    padding:25px;
                    border-radius:18px;
                    box-shadow:0 4px 12px rgba(0,0,0,.08);
                ">
                    <h4>Total Items</h4>
                    <h1>{{ $totalItems }}</h1>
                </div>

                <div style="
                    background:#16a34a;
                    color:white;
                    padding:25px;
                    border-radius:18px;
                    box-shadow:0 4px 12px rgba(0,0,0,.08);
                ">
                    <h4>Total Claims</h4>
                    <h1>{{ $totalClaims }}</h1>
                </div>

                <div style="
                    background:#dc2626;
                    color:white;
                    padding:25px;
                    border-radius:18px;
                    box-shadow:0 4px 12px rgba(0,0,0,.08);
                ">
                    <h4>Lost Reports</h4>
                    <h1>{{ $totalLostReports }}</h1>
                </div>

                <div style="
                    background:#059669;
                    color:white;
                    padding:25px;
                    border-radius:18px;
                    box-shadow:0 4px 12px rgba(0,0,0,.08);
                ">
                    <h4>Found Reports</h4>
                    <h1>{{ $totalFoundReports }}</h1>
                </div>

            </div>

        @else

            <h3 style="
                font-size:28px;
                font-weight:bold;
                margin-bottom:20px;">
                User Dashboard
            </h3>

            <div style="
                background:white;
                padding:25px;
                border-radius:18px;
                box-shadow:0 4px 12px rgba(0,0,0,.08);
                margin-bottom:20px;
            ">
                <h4>
                    Welcome,
                    <strong>{{ Auth::user()->name }}</strong>!
                </h4>

                <p>
                    Logged in as:
                    <strong>{{ Auth::user()->name }}</strong>
                </p>
            </div>

            <div style="
                display:grid;
                grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
                gap:20px;
            ">

                <div style="
                    background:#2563eb;
                    color:white;
                    padding:25px;
                    border-radius:18px;
                    box-shadow:0 4px 12px rgba(0,0,0,.08);
                ">
                    <h4>My Claims</h4>
                    <h1>{{ $myClaims }}</h1>
                </div>

                <div style="
                    background:#dc2626;
                    color:white;
                    padding:25px;
                    border-radius:18px;
                    box-shadow:0 4px 12px rgba(0,0,0,.08);
                ">
                    <h4>My Lost Reports</h4>
                    <h1>{{ $myLostReports }}</h1>
                </div>

                <div style="
                    background:#059669;
                    color:white;
                    padding:25px;
                    border-radius:18px;
                    box-shadow:0 4px 12px rgba(0,0,0,.08);
                ">
                    <h4>My Found Reports</h4>
                    <h1>{{ $myFoundReports }}</h1>
                </div>

            </div>

        @endif

    </div>
</x-app-layout>