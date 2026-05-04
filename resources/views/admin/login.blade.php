@extends('layouts.app')

@section('title', 'Admin Login')

@push('styles')
<style>
.admin-login-wrap {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #020617;
    padding: 120px 20px 60px;
}
.admin-card {
    background: rgba(15,23,42,0.8);
    border: 1px solid #1e293b;
    border-radius: 24px;
    padding: 50px 40px;
    width: 100%;
    max-width: 420px;
    backdrop-filter: blur(20px);
    box-shadow: 0 25px 50px rgba(0,0,0,0.5);
}
.admin-card .logo-icon {
    width: 64px; height: 64px;
    background: linear-gradient(135deg, #06b6d4, #3b82f6);
    border-radius: 16px;
    display: inline-flex; align-items: center; justify-content: center;
    font-size: 28px; color: white; margin-bottom: 16px;
    box-shadow: 0 10px 25px rgba(6,182,212,0.3);
}
.admin-card h1 { font-size: 1.8rem; font-weight: 900; color: #ffffff; margin-bottom: 6px; }
.admin-card .subtitle { color: #64748b; font-size: 14px; margin-bottom: 35px; }
.admin-form label { display: block; font-size: 12px; font-weight: 700; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 8px; }
.admin-form .input-wrap { position: relative; margin-bottom: 20px; }
.admin-form .input-wrap i { position: absolute; left: 16px; top: 50%; transform: translateY(-50%); color: #475569; }
.admin-form input[type=password] {
    width: 100%; padding: 15px 16px 15px 46px;
    background: rgba(2,6,23,0.6); border: 1px solid #1e293b;
    border-radius: 12px; color: #ffffff; font-size: 16px; font-family: 'Inter', sans-serif;
    outline: none; transition: border-color 0.3s, box-shadow 0.3s;
}
.admin-form input[type=password]:focus { border-color: #06b6d4; box-shadow: 0 0 0 3px rgba(6,182,212,0.1); }
.admin-error { background: rgba(239,68,68,0.1); border: 1px solid rgba(239,68,68,0.3); color: #fca5a5; padding: 12px 16px; border-radius: 10px; font-size: 13px; margin-bottom: 20px; }
.admin-submit {
    width: 100%; padding: 16px;
    background: linear-gradient(135deg, #06b6d4, #3b82f6);
    border: none; border-radius: 12px; color: white; font-size: 16px;
    font-weight: 700; font-family: 'Inter', sans-serif;
    cursor: pointer; transition: all 0.3s; box-shadow: 0 8px 20px rgba(6,182,212,0.3);
}
.admin-submit:hover { transform: translateY(-2px); box-shadow: 0 12px 25px rgba(6,182,212,0.4); }
</style>
@endpush

@section('content')
<div class="admin-login-wrap">
    <div class="admin-card" style="text-align:center;">
        <div class="logo-icon"><i class="fa-solid fa-shield-halved"></i></div>
        <h1>Admin Panel</h1>
        <p class="subtitle">Alpha Soft · Computronix SARL</p>

        @if($errors->has('password'))
            <div class="admin-error"><i class="fa-solid fa-circle-exclamation"></i> {{ $errors->first('password') }}</div>
        @endif

        <form method="POST" action="{{ route('admin.login.post') }}" class="admin-form" style="text-align:left;">
            @csrf
            <label>Admin Password</label>
            <div class="input-wrap">
                <i class="fa-solid fa-lock"></i>
                <input type="password" name="password" placeholder="Enter password..." autofocus>
            </div>
            <button type="submit" class="admin-submit">
                <i class="fa-solid fa-right-to-bracket"></i> &nbsp; Sign In
            </button>
        </form>
    </div>
</div>
@endsection
