<template>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <router-link to="#" class="brand-link">
        <!-- Brand Logo -->
            <img :src="'/img/bghmc.png'" alt="BGHMC Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
          <span class="brand-text font-weight-light">PMIS</span>
        </router-link>

        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <!-- <img src="" class="img-circle elevation-2" alt="User Image"> -->
            </div>
            <div class="info text-center">
                <router-link to="#" class="d-block">{{ current_user.username }}</router-link>
            </div>
          </div>
          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
              <li class="nav-item">
                <router-link to='/dashboard' class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to='/purchase_requests' class="nav-link">
                    <i class="nav-icon fa fa-th"></i>
                    <p>Purchase Request</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to='/items' class="nav-link">
                    <i class="nav-icon fa fa-th"></i>
                    <p>Items</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to='/categories' class="nav-link">
                    <i class="nav-icon fa fa-th"></i>
                    <p>Categories</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to='/pap_codes' class="nav-link">
                    <i class="nav-icon fa fa-th"></i>
                    <p>Pap Codes</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to='/units' class="nav-link">
                    <i class="nav-icon fa fa-th"></i>
                    <p>Units</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to='/heads' class="nav-link">
                    <i class="nav-icon fas fa-user"></i>
                    <p>Heads</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to='/divisions' class="nav-link">
                    <i class="nav-icon fa fa-th"></i>
                    <p>Divisions</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to='/departments' class="nav-link">
                    <i class="nav-icon fa fa-th"></i>
                    <p>Departments</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to='/employees' class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>Employees</p>
                </router-link>
              </li>
              <li class="nav-item">
                  <a href="logout" @click.prevent="logout" class="nav-link">
                      <i class="nav-icon fas fa-power-off"></i>
                    <p>Logout</p>
                  </a>
              </li>
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
    <!-- /.sidebar -->
  </aside>
</template>
<script>
    export default {
        name: 'app-sidebar',
        methods: {
            logout() {
                this.$store.commit('logout');
                this.$router.push('/');
            }
        },
        computed: {
            current_user() {
                return this.$store.getters.current_user;
            }
        }
    }
</script>