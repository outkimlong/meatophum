<section class="sidebar">
  <ul class="sidebar-menu" data-widget="tree">
    <li class="header">{{ __('admin.navigation') }}</li>
    <li class="{{ set_active('home.index') }}">
      <a href="{{ route('home.index') }}">
        <i class="fa fa-dashboard"></i> <span>{{ __('admin.dashboard') }}</span>
      </a>
    </li>
    <li class="{{ set_active('users.index') }}">
      <a href="{{ route('users.index') }}">
        <i class="fa fa-users"></i> <span>{{ __('admin.account') }}</span>
      </a>
    </li>
    <li class="{{ set_active('shops.index') }}">
      <a href="{{ route('shops.index') }}">
        <i class="fa fa-shopping-cart"></i> <span>{{ __('admin.shop') }}</span>
      </a>
    </li>
    <li class="{{ set_active('categories.index') }}">
      <a href="{{ route('categories.index') }}">
        <i class="fa fa-cubes"></i> <span>{{ __('admin.category') }}</span>
      </a>
    </li>
    <li class="{{ set_active('products.index') }}">
      <a href="{{ route('products.index') }}">
        <i class="fa fa-star-o"></i> <span>{{ __('admin.product') }}</span>
      </a>
    </li>
  </ul>
</section>