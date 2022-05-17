<x-dropdown>
    <x-slot:trigger>
        <button class="py-2 pl-3 pr-10 text-sm font-semibold w-full lg:w-32 text-left inline-flex">
            {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories' }}
            <svg class="transform -rotate-90 absolute pointer-events-none" style="right: 12px;" width="22"
                 height="22" viewBox="0 0 22 22">
                <g fill="none" fill-rule="evenodd">
                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                    </path>
                    <path fill="#222"
                          d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
                </g>
            </svg>
        </button>
    </x-slot>
    <x-dropdown-item href="{{ route('posts.index') }}"
                     :active="request()->routeIs('posts.index') && !isset($currentCategory)">
        All
    </x-dropdown-item>

    @foreach($categories as $category)
        <x-dropdown-item href="{{ route('posts.index', ['category' => $category->slug]) }}"
                         :active="isset($currentCategory) && $currentCategory->is($category)">
            {{ ucwords($category->name) }}
        </x-dropdown-item>
    @endforeach
</x-dropdown>
