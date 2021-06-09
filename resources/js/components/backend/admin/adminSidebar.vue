<template>
<div >
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <router-link to="/home" class="brand-link"></router-link>
      <!-- <img src="img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
      <span class="brand-text font-weight-light">ecommerce</span>


    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <!-- <img src="{{asset('img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image"> -->
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

    

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item active">
            <router-link to="/home" class="nav-link" active-class="active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
                Dashboard
              </router-link>
          </li>

          <li class="nav-item active">
            <router-link to="/category" class="nav-link" active-class="active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
                Category
            </router-link>
          </li>
          <li class="nav-item active">
            <router-link to="/brands" class="nav-link" active-class="active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
                Brands
            </router-link>
          </li>
          <li class="nav-item active">
            <router-link to="/products" class="nav-link" active-class="active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
                Products
            </router-link>
          </li>
          <li class="nav-item active">
            <router-link to="/colors" class="nav-link" active-class="active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
                Colors
            </router-link>
          </li>
          <li class="nav-item active">
            <router-link to="/sizes" class="nav-link" active-class="active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
                Sizes
            </router-link>
          </li>
          <li class="nav-item active">
            <router-link to="/slider" class="nav-link" active-class="active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
                Slider
            </router-link>
          </li>
<li class="nav-item active">
            <router-link to="/orders" class="nav-link" active-class="active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
                Orders
            </router-link>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
</div>
</template>

<script>
export default {
  name:"AdminSidebar"
}
</script>

<style>

</style>