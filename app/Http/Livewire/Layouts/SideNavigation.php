<?php

namespace App\Http\Livewire\Layouts;

use Livewire\Component;

class SideNavigation extends Component
{
    public $sideNavs;

    public function mount()
    {
        $this->sideNavs = collect([
            [
                'name' => 'Dashboard',
                'isCurrent' => true,
                'isExpanded' => false,
                'href' => '/dashboard',
                'slug' => 'dashboard',
                'svg' =>
                            '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
                            </svg>'
            ],
            [
                'name' => 'Vending Machines',
                'isCurrent' => false,
                'isExpanded' => false,
                'href' => '/vend',
                'slug' => 'vend',
                'svg' =>
                        '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>'
            ],
            [
                'name' => 'Customers',
                'isCurrent' => false,
                'isExpanded' => false,
                'href' => '/customer',
                'slug' => 'customer',
                'svg' =>
                        '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>'
            ],
            [
                'name' => 'Profiles',
                'isCurrent' => false,
                'isExpanded' => false,
                'href' => '/profile',
                'slug' => 'profile',
                'svg' =>
                        '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z" />
                        </svg>'
            ],
            [
                'name' => 'Settings',
                'isCurrent' => false,
                'isExpanded' => false,
                'href' => 'javascript:void(0)',
                'slug' => 'settings',
                'svg' =>
                        '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>',
                'children' => [
                    [
                        'name' => 'Pay Method',
                        'isCurrent' => false,
                        'href' => 'pay-method'
                    ],
                ]
            ],
        ])->all();
    }

    public function render()
    {
        return view('livewire.layouts.side-navigation');
    }

    public function navClicked($sideNavIndex)
    {
        $this->sideNavs[$sideNavIndex]['isCurrent'] = true;
        $this->sideNavs[$sideNavIndex]['isExpanded'] = !$this->sideNavs[$sideNavIndex]['isExpanded'];
    }
}
