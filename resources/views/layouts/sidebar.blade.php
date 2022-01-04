<aside class="navbar navbar-vertical navbar-expand-lg bg-white border-end">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- logo -->
        <h1 class="navbar-brand navbar-brand-autodark">
            <a href="{{ route('dashboard.index') }}">
                <x-application-logo class="navbar-brand-image" />
            </a>
        </h1>

        <!-- sidebar -->
        <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="nav nav-pills nav-vertical pt-lg-3">
                @foreach (dashboard_nav() as $item)
                    @if (isset($item['items']) && count($item['items']))
                        <x-nav.dropdown :text="$item['text']" :id="$item['id']" :icon="$item['icon']"
                            :active="is_active_nav($item)">
                            @foreach ($item['items'] as $subItem)
                                <x-nav.item :href="$subItem['link']" :active="is_active_nav($subItem)">
                                    {{ $subItem['text'] }}
                                </x-nav.item>
                            @endforeach
                        </x-nav.dropdown>
                    @else
                        <x-nav.item :href="route($item['route'])" :icon="$item['icon']" :active="is_active_nav($item)">
                            {{ $item['text'] }}
                        </x-nav.item>
                    @endif
                @endforeach

                <li class="dropdown-divider"></li>
                <x-nav.item :href="route('account.edit')" icon="user">
                    {{ __('Account Settings') }}
                </x-nav.item>

                <x-nav.item :href="route('logout')" icon="logout"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </x-nav.item>
            </ul>
        </div>
    </div>
</aside>
<form action="{{ route('logout') }}" method="post" id="logout-form" hidden class="d-none">@csrf</form>
