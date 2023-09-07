<div class="col-md-3">
    <div class="list-group" id="list-tab" role="tablist">
        <a class="list-group-item list-group-item-action {{ request()->is('account*') ? 'active' : '' }}" id="list-home-list" data-toggle="list" href="{{ route('user.account') }}">Profile</a>
        <a class="list-group-item list-group-item-action {{ request()->is('change/password') ? 'active' : '' }}" id="list-profile-list" data-toggle="list" href="{{ route('change.password') }}">Change Password</a>
        <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages">Wishlist</a>
        <a class="list-group-item list-group-item-action {{ request()->is('order*') ? 'active' : '' }}" id="list-settings-list" data-toggle="list" href="{{ route('order') }}">Orders</a>
    </div>
</div>
