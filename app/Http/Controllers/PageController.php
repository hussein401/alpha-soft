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
    public function laptops()
    {
        // Strictly matched, highly professional brand-specific Windows laptops (NO MACBOOKS)
        $imgLenovo = 'https://images.unsplash.com/photo-1628155930542-3c7a64e2c833?q=80&w=600&auto=format&fit=crop'; // ThinkPad with red dot
        $imgDell = 'https://images.unsplash.com/photo-1593642632823-8f785ba67e45?q=80&w=600&auto=format&fit=crop'; // Dell XPS clean
        $imgHP = 'https://images.unsplash.com/photo-1583339824000-50d0328b9487?q=80&w=600&auto=format&fit=crop'; // HP Elitebook
        $imgGaming = 'https://images.unsplash.com/photo-1600861194942-f884de80f6da?q=80&w=600&auto=format&fit=crop'; // RGB Gaming Laptop
        $imgSurface = 'https://images.unsplash.com/photo-1527443154391-507e9dc6c5cc?q=80&w=600&auto=format&fit=crop'; // Microsoft Surface
        $imgGenericWindows = 'https://images.unsplash.com/photo-1531297172866-d85cc59f1627?q=80&w=600&auto=format&fit=crop'; // Generic dark Windows laptop
        $imgToshiba = 'https://images.unsplash.com/photo-1588872657578-7efd1f1555ed?q=80&w=600&auto=format&fit=crop'; // Generic thick windows laptop (using dark dell proxy)

        $laptops = [
            ['brand' => 'Lenovo', 'model' => 'i5 13 Gen', 'ram' => '8GB', 'storage' => '512GB SSD', 'details' => '', 'image' => $imgLenovo],
            ['brand' => 'Lenovo', 'model' => 'i7 13 Gen', 'ram' => '16GB', 'storage' => '512GB SSD', 'details' => '', 'image' => $imgLenovo],
            ['brand' => 'Lenovo', 'model' => 'i7 8 Gen', 'ram' => '8GB', 'storage' => '512GB', 'details' => '', 'image' => $imgLenovo],
            ['brand' => 'HP Victus', 'model' => 'i5 13 Gen', 'ram' => '8GB', 'storage' => '512GB SSD', 'details' => 'RTX 3050 6GB VGA', 'image' => $imgGaming],
            ['brand' => 'Dell', 'model' => 'i5 7 Gen', 'ram' => '8GB', 'storage' => '256GB', 'details' => '', 'image' => $imgDell],
            ['brand' => 'Dell', 'model' => 'i5 8 Gen', 'ram' => '8GB', 'storage' => '256GB', 'details' => '', 'image' => $imgDell],
            ['brand' => 'Sony', 'model' => 'i5', 'ram' => '4GB', 'storage' => 'HDD', 'details' => '', 'image' => $imgGenericWindows],
            ['brand' => 'Sony', 'model' => 'i5', 'ram' => '6GB', 'storage' => '2TB HDD', 'details' => '', 'image' => $imgGenericWindows],
            ['brand' => 'Toshiba', 'model' => 'Pentium', 'ram' => '3GB', 'storage' => '512GB HDD', 'details' => '', 'image' => $imgToshiba],
            ['brand' => 'HP', 'model' => 'i5', 'ram' => '4GB', 'storage' => '512GB HDD', 'details' => '', 'image' => $imgHP],
            ['brand' => 'Toshiba', 'model' => 'Pentium', 'ram' => '4GB', 'storage' => '500GB HDD', 'details' => '', 'image' => $imgToshiba],
            ['brand' => 'ILife', 'model' => 'Intel Inside', 'ram' => '4GB', 'storage' => '128GB HDD', 'details' => '', 'image' => $imgGenericWindows],
            ['brand' => 'Lenovo', 'model' => 'i7', 'ram' => '8GB', 'storage' => '256GB SSD', 'details' => '', 'image' => $imgLenovo],
            ['brand' => 'Toshiba', 'model' => 'Celeron', 'ram' => '4GB', 'storage' => '256GB SSD', 'details' => '', 'image' => $imgToshiba],
            ['brand' => 'Dell', 'model' => 'Core 2 Duo', 'ram' => '4GB', 'storage' => '256GB', 'details' => '', 'image' => $imgDell],
            ['brand' => 'Lenovo', 'model' => 'Celeron', 'ram' => '8GB', 'storage' => '256GB', 'details' => '', 'image' => $imgLenovo],
            ['brand' => 'HP', 'model' => 'Mini Laptop i5 8 Gen', 'ram' => '8GB', 'storage' => '128GB', 'details' => '', 'image' => $imgHP],
            ['brand' => 'HP', 'model' => 'i5 8 Gen', 'ram' => '16GB', 'storage' => '512GB', 'details' => '', 'image' => $imgHP],
            ['brand' => 'Dell Latitude', 'model' => '3420 i5 11 Gen', 'ram' => '16GB', 'storage' => '512GB', 'details' => '', 'image' => $imgDell],
            ['brand' => 'Lenovo ThinkPad', 'model' => 'T490 i5 8 Gen', 'ram' => '8GB', 'storage' => '256GB', 'details' => '', 'image' => $imgLenovo],
            ['brand' => 'Dell Latitude', 'model' => '5480 i7 6 Gen', 'ram' => '8GB', 'storage' => '256GB', 'details' => '', 'image' => $imgDell],
            ['brand' => 'Dell Latitude', 'model' => '5540 i5 4 Gen', 'ram' => '4GB', 'storage' => '256GB', 'details' => '', 'image' => $imgDell],
            ['brand' => 'Toshiba', 'model' => 'i7 5 Gen', 'ram' => '8GB', 'storage' => '256GB', 'details' => '2GB VGA', 'image' => $imgToshiba],
            ['brand' => 'Lenovo ThinkPad', 'model' => 'T450s i5 6 Gen', 'ram' => '8GB', 'storage' => '256GB', 'details' => '', 'image' => $imgLenovo],
            ['brand' => 'Dell Precision', 'model' => '3510 i5 8 Gen', 'ram' => '8GB', 'storage' => '256GB', 'details' => '2GB VGA', 'image' => $imgDell],
            ['brand' => 'Dell Precision', 'model' => '3530 i7 8 Gen', 'ram' => '16GB', 'storage' => '256GB', 'details' => '4GB VGA', 'image' => $imgDell],
            ['brand' => 'Dell Latitude', 'model' => 'i5 6 Gen', 'ram' => '8GB', 'storage' => '256GB', 'details' => '', 'image' => $imgDell],
            ['brand' => 'Lenovo ThinkPad', 'model' => 'T490s i5 8 Gen', 'ram' => '8GB', 'storage' => '256GB', 'details' => '', 'image' => $imgLenovo],
            ['brand' => 'HP EliteBook', 'model' => 'i5 8 Gen', 'ram' => '8GB', 'storage' => '256GB', 'details' => '', 'image' => $imgHP],
            ['brand' => 'Dell Latitude', 'model' => '5410 i5 10 Gen', 'ram' => '16GB', 'storage' => '256GB', 'details' => '', 'image' => $imgDell],
            ['brand' => 'ASUS', 'model' => 'i7 7 Gen', 'ram' => '16GB', 'storage' => '128GB SSD + 1TB HDD', 'details' => 'GTX 1050 4GB VGA', 'image' => $imgGaming],
            ['brand' => 'Microsoft Surface', 'model' => 'i7 6 Gen', 'ram' => '8GB', 'storage' => '256GB', 'details' => '', 'image' => $imgSurface],
            ['brand' => 'Toshiba', 'model' => 'i5 8 Gen', 'ram' => '8GB', 'storage' => '256GB', 'details' => '', 'image' => $imgToshiba],
        ];

        return view('pages.laptops', compact('laptops'));
    }
}
