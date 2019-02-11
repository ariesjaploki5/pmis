<template>
    <aside class="main-sidebar sidebar-light-primary elevation-4">
        <router-link to="#" class="brand-link">
        <!-- Brand Logo -->
            <img :src="'/img/bghmc.png'" alt="BGHMC Logo" class="brand-image img-circle elevation-5"
                 style="opacity: 1">
          <span class="brand-text font-weight-light">HOMIS</span>
        </router-link>

        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-1 d-flex">
            <div class="image">
              <!-- <img src="" class="img-circle elevation-2" alt="User Image"> -->
            </div>
            <div class="dark">
                {{ current_user.username }}
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
                <router-link to='/purchase_orders' class="nav-link">
                    <i class="nav-icon fab fa-first-order"></i>
                    <p>Purchase Orders</p>
                </router-link>
              </li>
              <li class="nav-item has-treeview">
                <a href='/#' class="nav-link">
                    <i class="nav-icon fas fa-calendar"></i>
                    <p>Purchase Request</p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <router-link to='/ppmp_ict_supplies' class="nav-link">
                            <i class="nav-icon fas fa-balance-scale ml-3"></i>
                            <p>PPMP</p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to='#' class="nav-link">
                            <i class="nav-icon fas fa-wallet ml-3"></i>
                            <p>APP</p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to='/purchase_requests' class="nav-link">
                            <i class="nav-icon fas fa-shopping-cart ml-3"></i>
                            <p>Requests</p>
                        </router-link>
                    </li>
                </ul>
              </li>
              <li class="nav-item has-treeview">
                <a href='/#' class="nav-link">
                    <i class="nav-icon fas fa-folder-open"></i>
                    <p>Files</p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <router-link to='/categories' class="nav-link">
                            <i class="nav-icon fas fa-copyright ml-3"></i>
                            <p>Categories</p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to='/pap_codes' class="nav-link">
                            <i class="nav-icon fas fa-info-circle ml-3"></i>
                            <p>Pap Codes</p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to='/mode_of_procurements' class="nav-link">
                            <i class="nav-icon fas fa-suitcase ml-3"></i>
                            <p>Mode of Procurements</p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to='/pmos' class="nav-link">
                            <i class="nav-icon fas fa-address-card ml-3"></i>
                            <p>PMO/End-User</p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to='/source_of_funds' class="nav-link">
                            <i class="nav-icon fas fa-money-bill-alt ml-3"></i>
                            <p>Source of Funds</p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to='/units' class="nav-link">
                            <i class="nav-icon fas fa-info ml-3"></i>
                            <p>Units</p>
                        </router-link>
                    </li>
                </ul>
              </li>
               <li class="nav-item has-treeview">
                    <a href='#' class="nav-link">
                        <i class="nav-icon fas fa-boxes"></i>
                        <p>Inventory</p>
                    </a>
                    <ul class="nav nav-treeview">
                        <!-- <li class="nav-item">
                            <router-link to="/accountable_forms" class="nav-link">
                            <i class="fa fa-circle-o nav-icon ml-3"></i>
                            <p>Accountable Forms</p>
                            </router-link>
                        </li> -->
                        <li class="nav-item">
                            <router-link to="/drugs_and_medicines" class="nav-link">
                            <i class="nav-icon fas fa-prescription ml-3"></i>
                            <p>Drugs and Medicines</p>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/ict_supplies" class="nav-link">
                            <i class="nav-icon fas fa-tools ml-3"></i>
                            <p>ICT Supplies</p>
                            </router-link>
                        </li>
                        <!-- <li class="nav-item">
                            <router-link to="/medical_dental_and_laboratory_supplies" class="nav-link">
                            <i class="fa fa-circle-o nav-icon ml-3"></i>
                            <p>Medical, Dental and Laboratory Supplies</p>
                            </router-link>
                        </li> -->
                    </ul>
                </li>
              <li class="nav-item has-treeview">
                <a href='/#' class="nav-link">
                    <i class="nav-icon fas fa-user-cog fa fa-th"></i>
                    <p>Users</p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <router-link to='/access_levels' class="nav-link">
                            <i class="nav-icon fas fa-user-shield ml-3"></i>
                            <p>Access Level</p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to='/heads' class="nav-link">
                            <i class="nav-icon fas fa-user ml-3"></i>
                            <p>Heads</p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to='/divisions' class="nav-link">
                            <i class="nav-icon fas fa-hospital-alt ml-3"></i>
                            <p>Divisions</p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to='/departments' class="nav-link">
                            <i class="nav-icon fas fa-building ml-3"></i>
                            <p>Departments</p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to='/employees' class="nav-link">
                            <i class="nav-icon fas fa-users ml-3"></i>
                            <p>Employees</p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to='/users' class="nav-link">
                            <i class="nav-icon fas fa-users ml-3"></i>
                            <p>Users</p>
                        </router-link>
                    </li>
                </ul>
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