{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item">
    <a class="nav-link" href="{{ backpack_url('dashboard') }}">
        <i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}
    </a>
</li>

<x-backpack::menu-item title="Users" icon="la la-users" :link="backpack_url('user')" />
<x-backpack::menu-item title="Transactions" icon="la la-exchange" :link="backpack_url('transaction')" />
<x-backpack::menu-item title="Abonnements" icon="la la-bell" :link="backpack_url('abonnement')" />
<x-backpack::menu-item title="Settings" icon="la la-cog" :link="backpack_url('settings')" />
<x-backpack::menu-item title="Roles" icon="la la-user" :link="backpack_url('role')" />