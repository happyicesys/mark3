<div>
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="flex flex-col flex-grow border-r border-gray-200 pt-5 pb-4 bg-white overflow-y-auto">
        <div class="flex items-center flex-shrink-0 px-4">
        <x-application-logo></x-application-logo>
        </div>
        <div class="mt-5 flex-grow flex flex-col">
        <nav class="flex-1 px-2 space-y-1 bg-white" aria-label="Sidebar">
            @foreach($sideNavs as $sideNavIndex => $sideNav)
            <div class="space-y-1" wire:key="sidenav-{{$sideNavIndex}}">
                <a href="{{$sideNav['href']}}" wire:click="navClicked({{$sideNavIndex}})" type="button" class="{{ request()->path() == $sideNav['slug'] ? 'bg-gray-200 text-gray-900' : 'bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-900'}} group w-full flex items-center pl-2 pr-1 py-2 text-left text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" aria-controls="sub-menu-1" aria-expanded="false">
                    <span>
                        {!! $sideNav['svg'] !!}
                    </span>
                    <span class="ml-3 flex-1"> {{ $sideNav['name'] }} </span>
                    <div>
                        @if(isset($sideNav['children']))
                            <svg class="{{$sideNav['isExpanded'] ? 'text-gray-400 rotate-90' : 'text-gray-300'}} ml-3 flex-shrink-0 h-5 w-5 transform group-hover:text-gray-400 transition-colors ease-in-out duration-150" viewBox="0 0 20 20" aria-hidden="true">
                            <path d="M6 6L14 10L6 14V6Z" fill="currentColor" />
                            </svg>
                        @endif
                    </div>
                </a>
                <div>
                    @if(isset($sideNav['children']) and $sideNav['isExpanded'])
                        <!-- Expandable link section, show/hide based on state. -->
                        <div class="space-y-1" id="sub-menu-1">
                            @foreach($sideNav['children'] as $childIndex => $child)
                                <a href="#" wire:key="sidenav-child-{{$childIndex}}" class="group w-full flex items-center pl-11 pr-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                                    {{ $child['name'] }}
                                </a>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
            @endforeach
        </nav>
        </div>
    </div>

</div>
