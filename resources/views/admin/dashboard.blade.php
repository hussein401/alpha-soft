@extends('layouts.app')

@section('title', 'Admin Dashboard')

@push('styles')
<style>
.admin-wrap {
    background: #020617;
    min-height: 100vh;
    padding: 100px 0 60px;
}

/* TOP BAR */
.admin-topbar {
    display: flex; align-items: center; justify-content: space-between;
    margin-bottom: 35px; flex-wrap: wrap; gap: 15px;
}
.admin-topbar h1 { font-size: 2rem; font-weight: 900; color: #ffffff; }
.admin-topbar h1 span { color: #06b6d4; }
.admin-topbar-right { display: flex; gap: 12px; align-items: center; }
.badge-count {
    background: rgba(6,182,212,0.1); border: 1px solid rgba(6,182,212,0.3);
    color: #06b6d4; padding: 7px 18px; border-radius: 20px; font-size: 13px; font-weight: 700;
}
.admin-logout {
    padding: 8px 18px; border-radius: 20px;
    background: rgba(239,68,68,0.1); border: 1px solid rgba(239,68,68,0.2);
    color: #fca5a5; font-size: 13px; font-weight: 700; text-decoration: none;
    transition: all 0.3s;
}
.admin-logout:hover { background: rgba(239,68,68,0.2); color: #f87171; }

/* STATS */
.stats-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(160px, 1fr)); gap: 16px; margin-bottom: 30px; }
.stat-card {
    background: rgba(15,23,42,0.6); border: 1px solid #1e293b;
    border-radius: 16px; padding: 22px;
}
.stat-label { font-size: 11px; font-weight: 700; color: #475569; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 8px; }
.stat-value { font-size: 2rem; font-weight: 900; color: #ffffff; }
.stat-value.cyan { color: #06b6d4; }
.stat-value.green { color: #22c55e; }
.stat-value.amber { color: #f59e0b; }

/* FILTER BAR */
.filter-bar { display: flex; gap: 10px; margin-bottom: 20px; flex-wrap: wrap; align-items: center; }
.filter-btn {
    padding: 7px 18px; border-radius: 20px; border: 1px solid #1e293b;
    background: transparent; color: #64748b; font-size: 12px; font-weight: 700;
    cursor: pointer; transition: all 0.2s; font-family: 'Inter', sans-serif;
}
.filter-btn.active, .filter-btn:hover {
    background: rgba(6,182,212,0.1); border-color: #06b6d4; color: #06b6d4;
}
.search-admin {
    margin-left: auto; display: flex; align-items: center;
    background: rgba(15,23,42,0.6); border: 1px solid #1e293b;
    border-radius: 20px; padding: 8px 16px; gap: 8px;
}
.search-admin i { color: #475569; font-size: 13px; }
.search-admin input {
    background: transparent; border: none; outline: none;
    color: #e2e8f0; font-size: 13px; font-family: 'Inter', sans-serif; width: 160px;
}
.search-admin input::placeholder { color: #475569; }

/* TABLE CARD */
.table-card {
    background: rgba(15,23,42,0.5); border: 1px solid #1e293b;
    border-radius: 20px; overflow: hidden;
}
table { width: 100%; border-collapse: collapse; }
thead { background: rgba(2,6,23,0.7); }
th {
    padding: 14px 20px; text-align: left; font-size: 10px;
    font-weight: 800; color: #475569; text-transform: uppercase; letter-spacing: 0.08em;
    border-bottom: 1px solid #1e293b;
}
tbody tr { border-bottom: 1px solid #1e293b; transition: background 0.2s; }
tbody tr:last-child { border-bottom: none; }
tbody tr:hover { background: rgba(6,182,212,0.03); }
tbody tr.hidden-row { display: none; }
td { padding: 12px 20px; vertical-align: middle; }
.laptop-img {
    width: 48px; height: 48px; object-fit: contain;
    background: #fff; border-radius: 10px; padding: 5px; display: block;
}
.laptop-name { font-weight: 700; color: #ffffff; font-size: 14px; }
.laptop-specs { font-size: 11px; color: #64748b; margin-top: 3px; }
.brand-badge {
    padding: 4px 12px; border-radius: 20px; font-size: 10px; font-weight: 800;
    background: rgba(6,182,212,0.1); color: #06b6d4;
    border: 1px solid rgba(6,182,212,0.2); text-transform: uppercase; white-space: nowrap;
}

/* PRICE INPUT */
.price-group { display: flex; align-items: center; gap: 8px; }
.price-symbol { color: #06b6d4; font-weight: 900; font-size: 16px; }
.price-input {
    width: 100px; padding: 8px 12px;
    background: rgba(2,6,23,0.6); border: 1px solid #1e293b;
    border-radius: 10px; color: #ffffff; font-size: 15px;
    font-weight: 700; font-family: 'Inter', sans-serif;
    outline: none; transition: border-color 0.3s;
}
.price-input:focus { border-color: #06b6d4; }
.price-input.no-price { border-color: rgba(245,158,11,0.4); color: #fbbf24; }
.save-btn {
    padding: 8px 14px; border-radius: 10px;
    background: linear-gradient(135deg, #06b6d4, #3b82f6);
    border: none; color: white; font-size: 12px; font-weight: 700;
    cursor: pointer; transition: all 0.3s; font-family: 'Inter', sans-serif;
    white-space: nowrap;
}
.save-btn:hover { transform: scale(1.05); }
.save-btn.saved { background: linear-gradient(135deg, #22c55e, #16a34a); }
.save-btn.saving { opacity: 0.6; pointer-events: none; }

@media(max-width: 768px) {
    th:nth-child(4) { display: none; }
    td:nth-child(4) { display: none; }
    .search-admin { margin-left: 0; width: 100%; }
    .search-admin input { width: 100%; }
}
</style>
@endpush

@section('content')
<div class="admin-wrap">
    <div class="container">

        {{-- TOP BAR --}}
        <div class="admin-topbar">
            <div>
                <h1>Laptop <span>Price Manager</span></h1>
                <p style="color:#64748b; font-size:14px; margin-top:4px;">Edit any price and click Save — changes go live instantly.</p>
            </div>
            <div class="admin-topbar-right">
                <span class="badge-count"><i class="fa-solid fa-laptop" style="margin-right:6px;"></i>{{ $laptops->count() }} laptops</span>
                <a href="{{ route('admin.logout') }}" class="admin-logout"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
            </div>
        </div>

        {{-- STATS --}}
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-label">Total Laptops</div>
                <div class="stat-value cyan">{{ $laptops->count() }}</div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Prices Set</div>
                <div class="stat-value green">{{ $laptops->whereNotNull('price')->count() }}</div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Missing Price</div>
                <div class="stat-value amber">{{ $laptops->whereNull('price')->count() }}</div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Brands</div>
                <div class="stat-value">{{ $categories->count() }}</div>
            </div>
        </div>

        {{-- FILTER + SEARCH --}}
        <div class="filter-bar">
            <button class="filter-btn active" onclick="filterBrand('all', this)">
                <i class="fa-solid fa-border-all" style="margin-right:4px;"></i> All
            </button>
            @foreach($categories as $cat)
                <button class="filter-btn" onclick="filterBrand('{{ strtolower($cat->name) }}', this)">{{ $cat->name }}</button>
            @endforeach
            <div class="search-admin">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" id="admin-search" placeholder="Search model..." oninput="searchLaptops(this.value)">
            </div>
        </div>

        {{-- TABLE --}}
        <div class="table-card">
            <table id="laptop-table">
                <thead>
                    <tr>
                        <th style="width:60px;">Photo</th>
                        <th>Laptop Model</th>
                        <th>Brand</th>
                        <th>Specs</th>
                        <th>Price (USD)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($laptops as $laptop)
                    <tr data-brand="{{ strtolower($laptop->category?->name ?? '') }}" data-model="{{ strtolower($laptop->laptopModel?->name . ' ' . $laptop->model) }}">
                        <td><img src="{{ asset($laptop->image) }}" class="laptop-img" alt="{{ $laptop->model }}"></td>
                        <td>
                            <div class="laptop-name">{{ $laptop->laptopModel?->name }} {{ $laptop->model }}</div>
                        </td>
                        <td><span class="brand-badge">{{ $laptop->category?->name }}</span></td>
                        <td><div class="laptop-specs">{{ $laptop->ram }} &nbsp;·&nbsp; {{ $laptop->storage }}</div></td>
                        <td>
                            <div class="price-group">
                                <span class="price-symbol">$</span>
                                <input type="number"
                                       class="price-input {{ is_null($laptop->price) ? 'no-price' : '' }}"
                                       id="price-{{ $laptop->id }}"
                                       value="{{ $laptop->price ?? '' }}"
                                       placeholder="—"
                                       min="0" step="1"
                                       onkeydown="if(event.key==='Enter') saveLaptopPrice({{ $laptop->id }})">
                                <button class="save-btn" id="btn-{{ $laptop->id }}" onclick="saveLaptopPrice({{ $laptop->id }})">
                                    <i class="fa-solid fa-floppy-disk"></i> Save
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection

@push('scripts')
<script>
const CSRF = document.querySelector('meta[name="csrf-token"]').content;

function saveLaptopPrice(id) {
    const input = document.getElementById('price-' + id);
    const btn   = document.getElementById('btn-' + id);
    const price = input.value.trim();

    if (price === '' || isNaN(price) || Number(price) < 0) {
        input.style.borderColor = '#ef4444';
        setTimeout(() => input.style.borderColor = '', 1500);
        return;
    }

    btn.classList.add('saving');
    btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i>';

    fetch(`{{ route('admin.laptop.price', ['id' => ':id']) }}`.replace(':id', id), {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': CSRF },
        body: JSON.stringify({ price: price }),
    })
    .then(r => {
        if (!r.ok) throw new Error('Network response was not ok');
        return r.json();
    })
    .then(data => {
        btn.classList.remove('saving');
        if (data.success) {
            btn.classList.add('saved');
            btn.innerHTML = '<i class="fa-solid fa-check"></i> Saved!';
            input.classList.remove('no-price');
            setTimeout(() => {
                btn.classList.remove('saved');
                btn.innerHTML = '<i class="fa-solid fa-floppy-disk"></i> Save';
            }, 2500);
        } else {
            btn.innerHTML = '<i class="fa-solid fa-xmark"></i> Error';
            setTimeout(() => { btn.innerHTML = '<i class="fa-solid fa-floppy-disk"></i> Save'; }, 2000);
        }
    })
    .catch(err => {
        console.error(err);
        btn.classList.remove('saving');
        btn.innerHTML = '<i class="fa-solid fa-xmark"></i> Error';
        setTimeout(() => { btn.innerHTML = '<i class="fa-solid fa-floppy-disk"></i> Save'; }, 2000);
    });
}

function filterBrand(brand, el) {
    document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
    el.classList.add('active');
    document.querySelectorAll('#laptop-table tbody tr').forEach(row => {
        row.classList.toggle('hidden-row', brand !== 'all' && row.dataset.brand !== brand);
    });
}

function searchLaptops(query) {
    const q = query.toLowerCase();
    document.querySelectorAll('#laptop-table tbody tr').forEach(row => {
        row.classList.toggle('hidden-row', q !== '' && !(row.dataset.model || '').includes(q));
    });
}
</script>
@endpush
