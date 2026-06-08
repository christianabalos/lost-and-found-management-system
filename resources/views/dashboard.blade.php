<x-app-layout>
    <x-slot name="header">
        <h2 style="
            font-size:32px;
            font-weight:800;
            color:#111827;
        ">
            Dashboard
        </h2>
    </x-slot>

    <div class="p-6">

        <div style="margin-bottom:30px;">

            <h1 style="
                font-size:52px;
                font-weight:800;
                color:#111827;
                margin-bottom:8px;
            ">
                Welcome, {{ Auth::user()->full_name ?? Auth::user()->name }} 👋
            </h1>

            <p style="
                color:#6b7280;
                font-size:20px;
                margin:0;
            ">
                Here's what's happening with your account today.
            </p>

        </div>

        @if(Auth::user()->role == 'admin')

        <!-- ADMIN STATISTICS -->
        <div style="
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
            gap:20px;
            margin-bottom:25px;
        ">

            <div style="
                background:white;
                padding:25px;
                border-radius:18px;
                box-shadow:0 2px 10px rgba(0,0,0,.06);
            ">
                <h3>Total Users</h3>
                <h1>{{ $totalUsers ?? 0 }}</h1>
            </div>

            <div style="
                background:white;
                padding:25px;
                border-radius:18px;
                box-shadow:0 2px 10px rgba(0,0,0,.06);
            ">
                <h3>Total Items</h3>
                <h1>{{ $totalItems ?? 0 }}</h1>
            </div>

            <div style="
                background:white;
                padding:25px;
                border-radius:18px;
                box-shadow:0 2px 10px rgba(0,0,0,.06);
            ">
                <h3>Total Claims</h3>
                <h1>{{ $totalClaims ?? 0 }}</h1>
            </div>

            <div style="
                background:white;
                padding:25px;
                border-radius:18px;
                box-shadow:0 2px 10px rgba(0,0,0,.06);
            ">
                <h3>Pending Claims</h3>
                <h1>{{ $pendingClaims ?? 0 }}</h1>
            </div>
                <div style="
                    
                ">
                    <h3></h3>
                    <h1></h1>
                </div>
        </div>

        <!-- ADMIN ACTIONS -->
        <div style="
            display:flex;
            flex-wrap:wrap;
            gap:15px;
            margin-bottom:30px;
        ">

            <a href="{{ route('users.index') }}"
               style="
                background:#4f46e5;
                color:white;
                text-decoration:none;
                padding:14px 22px;
                border-radius:12px;
                font-weight:bold;
               ">
                👥 Manage Users
            </a>

            <a href="{{ route('items.index') }}"
               style="
                background:#059669;
                color:white;
                text-decoration:none;
                padding:14px 22px;
                border-radius:12px;
                font-weight:bold;
               ">
                📦 Manage Items
            </a>

            <a href="{{ route('claims.index') }}"
               style="
                background:#dc2626;
                color:white;
                text-decoration:none;
                padding:14px 22px;
                border-radius:12px;
                font-weight:bold;
               ">
                📋 Manage Claims
                        </a>

                    </div>
                    <div style="
                background:white;
                padding:25px;
                border-radius:18px;
                margin-top:25px;
                box-shadow:0 2px 10px rgba(0,0,0,.06);
            ">
    <h2>📌 Latest Lost Reports</h2>

    @forelse($latestLostReports ?? [] as $report)
        <div style="
            padding:10px 0;
            border-bottom:1px solid #eee;
        ">
            <strong>{{ $report->item_name }}</strong><br>
            <small>{{ $report->location_lost }}</small>
        </div>
    @empty
        <p>No lost reports yet.</p>
    @endforelse
</div>

<div style="
    background:white;
    padding:25px;
    border-radius:18px;
    margin-top:25px;
    box-shadow:0 2px 10px rgba(0,0,0,.06);
">
    <h2>✅ Latest Found Reports</h2>

    @forelse($latestFoundReports ?? [] as $report)
        <div style="
            padding:10px 0;
            border-bottom:1px solid #eee;
        ">
            <strong>{{ $report->item_name }}</strong><br>
            <small>{{ $report->location_found }}</small>
        </div>
    @empty
        <p>No found reports yet.</p>
    @endforelse
</div>
        @else

        <!-- USER STATISTICS -->
        <div style="
            display:grid;
            grid-template-columns:repeat(3,1fr);
            gap:20px;
            margin-bottom:25px;
        ">

            <div style="
                background:white;
                padding:30px;
                border-radius:18px;
                box-shadow:0 2px 10px rgba(0,0,0,.06);
            ">
                <h3>Claims</h3>
                <h1>{{ $myClaims ?? 0 }}</h1>
            </div>

            <div style="
                background:white;
                padding:30px;
                border-radius:18px;
                box-shadow:0 2px 10px rgba(0,0,0,.06);
            ">
                <h3>Lost Reports</h3>
                <h1>{{ $myLostReports ?? 0 }}</h1>
            </div>

            <div style="
                background:white;
                padding:30px;
                border-radius:18px;
                box-shadow:0 2px 10px rgba(0,0,0,.06);
            ">
                <h3>Found Reports</h3>
                <h1>{{ $myFoundReports ?? 0 }}</h1>
            </div>
                
            
        </div>

        <!-- USER ACTIONS -->
        <div style="
            display:grid;
            grid-template-columns:repeat(3,1fr);
             gap:20px;
        ">

            <a href="{{ route('claims.index') }}"
               style="text-decoration:none;">
                <div style="
                
                    background:linear-gradient(135deg,#7c3aed,#8b5cf6);
                    color:white;
                    padding:25px;
                    border-radius:18px;
                ">
                    <h3>View My Claims</h3>
                    <p>Track your claim requests</p>
                </div>
            </a>

            <a href="{{ route('lost-reports.index') }}"
               style="text-decoration:none;">
                <div style="
                    background:linear-gradient(135deg,#2563eb,#3b82f6);
                    color:white;
                    padding:25px;
                    border-radius:18px;
                ">
                    <h3>Report Lost Item</h3>
                    <p>Report an item you lost</p>
                </div>
            </a>

            <a href="{{ route('found-reports.index') }}"
               style="text-decoration:none;">
                <div style="
                    background:linear-gradient(135deg,#059669,#10b981);
                    color:white;
                    padding:25px;
                    border-radius:18px;
                ">
                    <h3>Report Found Item</h3>
                    <p>Report an item you found</p>
                </div>
            </a>

        </div>

        @endif

    </div>
</x-app-layout>