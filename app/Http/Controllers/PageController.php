<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    /**
     * Home page — Hero + overview of Alpha Soft
     */
    public function home()
    {
        $stats = [
            ['value' => '30+', 'label' => 'Years of Experience'],
            ['value' => '500+', 'label' => 'Happy Clients'],
            ['value' => '1993', 'label' => 'Founded Since'],
            ['value' => '24/7', 'label' => 'Support Available'],
        ];

        $features = [
            ['icon' => 'fa-chart-line',    'title' => 'Sales & Invoicing',    'desc' => 'Complete POS solution with real-time invoicing, receipts and transaction history.'],
            ['icon' => 'fa-boxes-stacked', 'title' => 'Inventory Control',    'desc' => 'Track stock levels, alerts for low inventory, and full warehouse management.'],
            ['icon' => 'fa-users',          'title' => 'User Management',      'desc' => 'Role-based access control with multi-user support and activity logging.'],
            ['icon' => 'fa-book',           'title' => 'Accounting Module',    'desc' => 'Integrated accounts payable/receivable, journal entries, and balance sheets.'],
            ['icon' => 'fa-file-invoice',   'title' => 'Smart Reporting',      'desc' => 'Dynamic reports and dashboards with export to PDF and Excel.'],
            ['icon' => 'fa-gears',          'title' => 'Master Settings',      'desc' => 'Fully customizable system parameters to fit any business workflow.'],
        ];

        $services = [
            ['icon' => 'fa-desktop',         'title' => 'Alpha Soft POS Setup',     'desc' => 'Full installation and configuration of Alpha Soft on your hardware with staff training included.'],
            ['icon' => 'fa-laptop',          'title' => 'Laptop Sales',             'desc' => 'Latest laptops from top brands at competitive prices, with full warranty and after-sales support.'],
            ['icon' => 'fa-map-location-dot', 'title' => 'Branch Connectivity',    'desc' => 'Securely connect multiple business branches with VPN and real-time data synchronization for Alpha Soft.'],
            ['icon' => 'fa-screwdriver-wrench', 'title' => 'Technical Repair',      'desc' => 'Hardware diagnostics, motherboard repair, screen replacement, and OS reinstallation.'],
            ['icon' => 'fa-network-wired',   'title' => 'Network & Infrastructure', 'desc' => 'LAN/WAN setup, Wi-Fi installation, CCTV systems, and server configuration.'],
            ['icon' => 'fa-headset',         'title' => '24/7 Support',            'desc' => 'Remote and on-site technical support for all Computronix products and services.'],
        ];

        return view('pages.home', compact('stats', 'features', 'services'));
    }

    /**
     * About Computronix SARL
     */
    public function about()
    {
        $milestones = [
            ['year' => '1993', 'event' => 'Computronix SARL founded in Zahlé, Lebanon'],
            ['year' => '2000', 'event' => 'Launched first version of Alpha Soft POS system'],
            ['year' => '2008', 'event' => 'Expanded to serve 100+ businesses across Lebanon'],
            ['year' => '2015', 'event' => 'Released Alpha Soft v5 with full accounting module'],
            ['year' => '2020', 'event' => 'Cloud-ready architecture and remote support introduced'],
            ['year' => '2024', 'event' => 'Alpha Soft v7 — AI-powered analytics and mobile app'],
        ];

        return view('pages.about', compact('milestones'));
    }

    /**
     * Alpha Soft product page — detailed features
     */
    public function alphaSoft()
    {
        $modules = [
            [
                'icon'  => 'fa-cash-register',
                'title' => 'Point of Sale (POS)',
                'color' => 'blue',
                'items' => [
                    'Fast touch-screen interface',
                    'Barcode & QR code scanning',
                    'Multiple payment methods',
                    'Thermal printer support',
                    'Daily closing & cash drawer',
                ],
            ],
            [
                'icon'  => 'fa-layer-group',
                'title' => 'Inventory & Stock',
                'color' => 'purple',
                'items' => [
                    'Multi-warehouse support',
                    'Auto reorder alerts',
                    'Batch & serial tracking',
                    'Transfer between branches',
                    'Stock valuation reports',
                ],
            ],
            [
                'icon'  => 'fa-calculator',
                'title' => 'Accounting',
                'color' => 'teal',
                'items' => [
                    'Chart of accounts',
                    'Journal entries',
                    'Profit & loss statement',
                    'Balance sheet',
                    'Tax & VAT management',
                ],
            ],
            [
                'icon'  => 'fa-map-location-dot',
                'title' => 'Multi-Branch & GPS',
                'color' => 'blue',
                'items' => [
                    'Real-time branch syncing',
                    'GPS delivery tracking',
                    'Multi-location stock view',
                    'Centralized store locator',
                    'Inter-branch transactions',
                ],
            ],
            [
                'icon'  => 'fa-users-gear',
                'title' => 'HR & Users',
                'color' => 'orange',
                'items' => [
                    'Employee profiles',
                    'Role-based permissions',
                    'Attendance tracking',
                    'Payroll generation',
                    'Activity audit log',
                ],
            ],
            [
                'icon'  => 'fa-chart-bar',
                'title' => 'Reports & Analytics',
                'color' => 'green',
                'items' => [
                    'Sales by item / cashier',
                    'Revenue trends graph',
                    'Export to PDF & Excel',
                    'Custom date range filters',
                    'Dashboard KPI widgets',
                ],
            ],
            [
                'icon'  => 'fa-shield-halved',
                'title' => 'Security & Backup',
                'color' => 'red',
                'items' => [
                    'Encrypted data storage',
                    'Automatic daily backup',
                    'Cloud sync option',
                    'User session control',
                    'Two-factor authentication',
                ],
            ],
        ];

        return view('pages.alpha-soft', compact('modules'));
    }

    /**
     * Services offered by Computronix SARL
     */
    public function services()
    {
        $services = [
            ['icon' => 'fa-desktop',         'title' => 'Alpha Soft POS Setup',     'desc' => 'Full installation and configuration of Alpha Soft on your hardware with staff training included.'],
            ['icon' => 'fa-laptop',          'title' => 'Laptop Sales',             'desc' => 'Latest laptops from top brands at competitive prices, with full warranty and after-sales support.'],
            ['icon' => 'fa-map-location-dot', 'title' => 'Branch Connectivity',    'desc' => 'Securely connect multiple business branches with VPN and real-time data synchronization for Alpha Soft.'],
            ['icon' => 'fa-screwdriver-wrench', 'title' => 'Technical Repair',      'desc' => 'Hardware diagnostics, motherboard repair, screen replacement, and OS reinstallation.'],
            ['icon' => 'fa-network-wired',   'title' => 'Network & Infrastructure', 'desc' => 'LAN/WAN setup, Wi-Fi installation, CCTV systems, and server configuration.'],
            ['icon' => 'fa-headset',         'title' => '24/7 Support',            'desc' => 'Remote and on-site technical support for all Computronix products and services.'],
        ];

        return view('pages.services', compact('services'));
    }

    /**
     * Contact page
     */
    public function contact()
    {
        return view('pages.contact');
    }

    /**
     * Handle contact form submission
     */
    public function sendContact(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email',
            'phone'   => 'nullable|string|max:30',
            'subject' => 'required|string|max:150',
            'message' => 'required|string|max:2000',
        ]);

        // In production: Mail::to('ctx2002@hotmail.com')->send(new ContactMail($request->all()));

        return back()->with('success', 'Thank you! Your message has been sent. We will contact you shortly.');
    }

    /**
     * Repair tracking page — New Mechanism
     */
    public function repairs()
    {
        return view('pages.repairs');
    }

    /**
     * Laptops inventory page
     */
    public function laptops(\Illuminate\Http\Request $request)
    {
        $categories = \App\Models\Category::all();
        
        $query = \App\Models\Laptop::with('category');
        if ($request->has('category') && $request->category != '') {
            $query->whereHas('category', function($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('model', 'LIKE', "%{$search}%")
                  ->orWhere('brand', 'LIKE', "%{$search}%")
                  ->orWhere('details', 'LIKE', "%{$search}%");
            });
        }

        $laptops = $query->get();

        return view('pages.laptops', compact('laptops', 'categories'));
    }

    /**
     * Single laptop details page
     */
    public function laptopShow($id)
    {
        $laptop = \App\Models\Laptop::with('category')->findOrFail($id);
        
        // Fetch related laptops from the same category
        $relatedLaptops = \App\Models\Laptop::where('category_id', $laptop->category_id)
            ->where('id', '!=', $laptop->id)
            ->inRandomOrder()
            ->take(3)
            ->get();

        return view('pages.laptop_show', compact('laptop', 'relatedLaptops'));
    }
}
