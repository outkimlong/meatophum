<section class="sidebar">
  <ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <li class="{{ set_active('home.index') }}">
      <a href="{{ route('home.index') }}">
        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
      </a>
    </li>
    <li class="{{ set_active('users.index') }}">
      <a href="{{ route('users.index') }}">
        <i class="fa fa-users"></i> <span>Account</span>
      </a>
    </li>
    <li class="{{ set_active('shops.index') }}">
      <a href="{{ route('shops.index') }}">
        <i class="fa fa-shopping-cart"></i> <span>Shop</span>
      </a>
    </li>
    <li class="{{ set_active('categories.index') }}">
      <a href="{{ route('categories.index') }}">
        <i class="fa fa-cubes"></i> <span>Category</span>
      </a>
    </li>
    <li class="{{ set_active('products.index') }}">
      <a href="{{ route('products.index') }}">
        <i class="fa fa-star-o"></i> <span>Product</span>
      </a>
    </li>
  </ul>
</section>