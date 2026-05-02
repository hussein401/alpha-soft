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
        // 33 completely distinct, unique professional laptop image URLs
        $images = [
            '1593642632823-8f785ba67e45', '1611186871348-b1ce696e52c9', '1588872657578-7efd1f1555ed',
            '1593642702821-c823b13eb295', '1496181133206-80ce9b88a853', '1541807084-5c52b6b3adef',
            '1525547719571-a2d4ac8945e2', '1531297172866-d85cc59f1627', '1504707748692-419802cf939d',
            '1588702545922-e424bb9b3074', '1628155930542-3c7a64e2c833', '1587614382346-4ec70e388b28',
            '1600861194942-f884de80f6da', '1527443154391-507e9dc6c5cc', '1484788984921-03950022c9ef',
            '1544099858-75feeb57f00b', '1504280387531-15591c2fa627', '1515343276709-32cb5e933d6b',
            '1618424181497-157f25b6ce5e', '1593640495253-23196b27a87f', '1542393545-10f5cde2c810',
            '1519389950473-47ba0277781c', '1516387938699-a93567ec168e', '1554415707-6e8cfc93fe23',
            '1530893609608-31a92096398b', '1499951360447-b19be8fe80f5', '1507721999472-8ed4421c4af2',
            '1511376868136-742c0de8c9a8', '1522204523234-8729aa6e3d5f', '1457305237443-44c3d5a30b89',
            '1551288049-bebda4e38f71', '1498050108023-c5249f4df085', '1517336714731-489689fd1ca8'
        ];

        $laptops = [
            ['brand' => 'Lenovo', 'model' => 'i5 13 Gen', 'ram' => '8GB', 'storage' => '512GB SSD', 'details' => '', 'image' => 'https://images.unsplash.com/photo-' . $images[0] . '?q=80&w=600&auto=format&fit=crop'],
            ['brand' => 'Lenovo', 'model' => 'i7 13 Gen', 'ram' => '16GB', 'storage' => '512GB SSD', 'details' => '', 'image' => 'https://images.unsplash.com/photo-' . $images[1] . '?q=80&w=600&auto=format&fit=crop'],
            ['brand' => 'Lenovo', 'model' => 'i7 8 Gen', 'ram' => '8GB', 'storage' => '512GB', 'details' => '', 'image' => 'https://images.unsplash.com/photo-' . $images[2] . '?q=80&w=600&auto=format&fit=crop'],
            ['brand' => 'HP Victus', 'model' => 'i5 13 Gen', 'ram' => '8GB', 'storage' => '512GB SSD', 'details' => 'RTX 3050 6GB VGA', 'image' => 'https://images.unsplash.com/photo-' . $images[3] . '?q=80&w=600&auto=format&fit=crop'],
            ['brand' => 'Dell', 'model' => 'i5 7 Gen', 'ram' => '8GB', 'storage' => '256GB', 'details' => '', 'image' => 'https://images.unsplash.com/photo-' . $images[4] . '?q=80&w=600&auto=format&fit=crop'],
            ['brand' => 'Dell', 'model' => 'i5 8 Gen', 'ram' => '8GB', 'storage' => '256GB', 'details' => '', 'image' => 'https://images.unsplash.com/photo-' . $images[5] . '?q=80&w=600&auto=format&fit=crop'],
            ['brand' => 'Sony', 'model' => 'i5', 'ram' => '4GB', 'storage' => 'HDD', 'details' => '', 'image' => 'https://images.unsplash.com/photo-' . $images[6] . '?q=80&w=600&auto=format&fit=crop'],
            ['brand' => 'Sony', 'model' => 'i5', 'ram' => '6GB', 'storage' => '2TB HDD', 'details' => '', 'image' => 'https://images.unsplash.com/photo-' . $images[7] . '?q=80&w=600&auto=format&fit=crop'],
            ['brand' => 'Toshiba', 'model' => 'Pentium', 'ram' => '3GB', 'storage' => '512GB HDD', 'details' => '', 'image' => 'https://images.unsplash.com/photo-' . $images[8] . '?q=80&w=600&auto=format&fit=crop'],
            ['brand' => 'HP', 'model' => 'i5', 'ram' => '4GB', 'storage' => '512GB HDD', 'details' => '', 'image' => 'https://images.unsplash.com/photo-' . $images[9] . '?q=80&w=600&auto=format&fit=crop'],
            ['brand' => 'Toshiba', 'model' => 'Pentium', 'ram' => '4GB', 'storage' => '500GB HDD', 'details' => '', 'image' => 'https://images.unsplash.com/photo-' . $images[10] . '?q=80&w=600&auto=format&fit=crop'],
            ['brand' => 'ILife', 'model' => 'Intel Inside', 'ram' => '4GB', 'storage' => '128GB HDD', 'details' => '', 'image' => 'https://images.unsplash.com/photo-' . $images[11] . '?q=80&w=600&auto=format&fit=crop'],
            ['brand' => 'Lenovo', 'model' => 'i7', 'ram' => '8GB', 'storage' => '256GB SSD', 'details' => '', 'image' => 'https://images.unsplash.com/photo-' . $images[12] . '?q=80&w=600&auto=format&fit=crop'],
            ['brand' => 'Toshiba', 'model' => 'Celeron', 'ram' => '4GB', 'storage' => '256GB SSD', 'details' => '', 'image' => 'https://images.unsplash.com/photo-' . $images[13] . '?q=80&w=600&auto=format&fit=crop'],
            ['brand' => 'Dell', 'model' => 'Core 2 Duo', 'ram' => '4GB', 'storage' => '256GB', 'details' => '', 'image' => 'https://images.unsplash.com/photo-' . $images[14] . '?q=80&w=600&auto=format&fit=crop'],
            ['brand' => 'Lenovo', 'model' => 'Celeron', 'ram' => '8GB', 'storage' => '256GB', 'details' => '', 'image' => 'https://images.unsplash.com/photo-' . $images[15] . '?q=80&w=600&auto=format&fit=crop'],
            ['brand' => 'HP', 'model' => 'Mini Laptop i5 8 Gen', 'ram' => '8GB', 'storage' => '128GB', 'details' => '', 'image' => 'https://images.unsplash.com/photo-' . $images[16] . '?q=80&w=600&auto=format&fit=crop'],
            ['brand' => 'HP', 'model' => 'i5 8 Gen', 'ram' => '16GB', 'storage' => '512GB', 'details' => '', 'image' => 'https://images.unsplash.com/photo-' . $images[17] . '?q=80&w=600&auto=format&fit=crop'],
            ['brand' => 'Dell Latitude', 'model' => '3420 i5 11 Gen', 'ram' => '16GB', 'storage' => '512GB', 'details' => '', 'image' => 'https://images.unsplash.com/photo-' . $images[18] . '?q=80&w=600&auto=format&fit=crop'],
            ['brand' => 'Lenovo ThinkPad', 'model' => 'T490 i5 8 Gen', 'ram' => '8GB', 'storage' => '256GB', 'details' => '', 'image' => 'https://images.unsplash.com/photo-' . $images[19] . '?q=80&w=600&auto=format&fit=crop'],
            ['brand' => 'Dell Latitude', 'model' => '5480 i7 6 Gen', 'ram' => '8GB', 'storage' => '256GB', 'details' => '', 'image' => 'https://images.unsplash.com/photo-' . $images[20] . '?q=80&w=600&auto=format&fit=crop'],
            ['brand' => 'Dell Latitude', 'model' => '5540 i5 4 Gen', 'ram' => '4GB', 'storage' => '256GB', 'details' => '', 'image' => 'https://images.unsplash.com/photo-' . $images[21] . '?q=80&w=600&auto=format&fit=crop'],
            ['brand' => 'Toshiba', 'model' => 'i7 5 Gen', 'ram' => '8GB', 'storage' => '256GB', 'details' => '2GB VGA', 'image' => 'https://images.unsplash.com/photo-' . $images[22] . '?q=80&w=600&auto=format&fit=crop'],
            ['brand' => 'Lenovo ThinkPad', 'model' => 'T450s i5 6 Gen', 'ram' => '8GB', 'storage' => '256GB', 'details' => '', 'image' => 'https://images.unsplash.com/photo-' . $images[23] . '?q=80&w=600&auto=format&fit=crop'],
            ['brand' => 'Dell Precision', 'model' => '3510 i5 8 Gen', 'ram' => '8GB', 'storage' => '256GB', 'details' => '2GB VGA', 'image' => 'https://images.unsplash.com/photo-' . $images[24] . '?q=80&w=600&auto=format&fit=crop'],
            ['brand' => 'Dell Precision', 'model' => '3530 i7 8 Gen', 'ram' => '16GB', 'storage' => '256GB', 'details' => '4GB VGA', 'image' => 'https://images.unsplash.com/photo-' . $images[25] . '?q=80&w=600&auto=format&fit=crop'],
            ['brand' => 'Dell Latitude', 'model' => 'i5 6 Gen', 'ram' => '8GB', 'storage' => '256GB', 'details' => '', 'image' => 'https://images.unsplash.com/photo-' . $images[26] . '?q=80&w=600&auto=format&fit=crop'],
            ['brand' => 'Lenovo ThinkPad', 'model' => 'T490s i5 8 Gen', 'ram' => '8GB', 'storage' => '256GB', 'details' => '', 'image' => 'https://images.unsplash.com/photo-' . $images[27] . '?q=80&w=600&auto=format&fit=crop'],
            ['brand' => 'HP EliteBook', 'model' => 'i5 8 Gen', 'ram' => '8GB', 'storage' => '256GB', 'details' => '', 'image' => 'https://images.unsplash.com/photo-' . $images[28] . '?q=80&w=600&auto=format&fit=crop'],
            ['brand' => 'Dell Latitude', 'model' => '5410 i5 10 Gen', 'ram' => '16GB', 'storage' => '256GB', 'details' => '', 'image' => 'https://images.unsplash.com/photo-' . $images[29] . '?q=80&w=600&auto=format&fit=crop'],
            ['brand' => 'ASUS', 'model' => 'i7 7 Gen', 'ram' => '16GB', 'storage' => '128GB SSD + 1TB HDD', 'details' => 'GTX 1050 4GB VGA', 'image' => 'https://images.unsplash.com/photo-' . $images[30] . '?q=80&w=600&auto=format&fit=crop'],
            ['brand' => 'Microsoft Surface', 'model' => 'i7 6 Gen', 'ram' => '8GB', 'storage' => '256GB', 'details' => '', 'image' => 'https://images.unsplash.com/photo-' . $images[31] . '?q=80&w=600&auto=format&fit=crop'],
            ['brand' => 'Toshiba', 'model' => 'i5 8 Gen', 'ram' => '8GB', 'storage' => '256GB', 'details' => '', 'image' => 'https://images.unsplash.com/photo-' . $images[32] . '?q=80&w=600&auto=format&fit=crop'],
        ];

        return view('pages.laptops', compact('laptops'));
    }
}
