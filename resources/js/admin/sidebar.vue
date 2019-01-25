<template>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <router-link to="#" class="brand-link text-center">
          <span class="brand-text font-weight-light">PMIS</span>
        </router-link>

        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <!-- <img src="" class="img-circle elevation-2" alt="User Image"> -->
            </div>
            <div class="info text-center">
              <router-link to="#" class="d-block">{{ currentUser.username }}</router-link>
            </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
              <li class="nav-item">
                <router-link to='/dashboard' class="nav-link">
                    <i class="nav-icon fa fa-th"></i>
                    <p>Dashboard</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to='/requests' class="nav-link">
                    <i class="nav-icon fa fa-th"></i>
                    <p>Item Requests</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to='/account_codes' class="nav-link">
                    <i class="nav-icon fa fa-th"></i>
                    <p>Account Codes</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to='/pap_codes' class="nav-link">
                    <i class="nav-icon fa fa-th"></i>
                    <p>Pap Codes</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to='/supplies' class="nav-link">
                    <i class="nav-icon fa fa-th"></i>
                    <p>Supplies</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to='/heads' class="nav-link">
                    <i class="nav-icon fa fa-th"></i>
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
                    <i class="nav-icon fa fa-th"></i>
                    <p>Employees</p>
                </router-link>
              </li>
              <li class="nav-item">
                  <a href="#!" @click.prevent="logout" class="dropdown-item">Logout</a>
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
                this.$router.push('/login');
            }
        },
        computed: {
            currentUser() {
                return this.$store.getters.currentUser
            }
        }
    }
</script>