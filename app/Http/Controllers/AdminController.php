<?php

namespace App\Http\Controllers;

use App\Models\Laptop;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private const ADMIN_PASSWORD = '1';

    protected function isLoggedIn(): bool
    {
        return session('admin_logged_in') === true;
    }

    public function loginForm()
    {
        if ($this->isLoggedIn()) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate(['password' => 'required']);

        if ($request->password === self::ADMIN_PASSWORD) {
            session(['admin_logged_in' => true]);
            return redirect()->route('admin.dashboard')->with('success', 'Welcome back, Admin!');
        }

        return back()->withErrors(['password' => 'Incorrect password.']);
    }

    public function logout()
    {
        session()->forget('admin_logged_in');
        return redirect()->route('admin.login');
    }

    public function dashboard()
    {
        if (!$this->isLoggedIn()) {
            return redirect()->route('admin.login');
        }

        $categories = Category::with('laptops')->get();
        $laptops    = Laptop::with(['category', 'laptopModel'])->get()->sortBy(fn($l) => $l->category?->name ?? '');

        return view('admin.dashboard', compact('laptops', 'categories'));
    }

    public function updatePrice(Request $request, $id)
    {
        if (!$this->isLoggedIn()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $request->validate(['price' => 'required|numeric|min:0']);

        $laptop = Laptop::findOrFail($id);
        $laptop->price = (int) $request->price;
        $laptop->save();

        return response()->json([
            'success' => true,
            'price'   => number_format($laptop->price),
        ]);
    }
}
