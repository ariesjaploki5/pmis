
//Authentication
import register from './auth/register.vue';
import login from './auth/login.vue';

//requires auth
//Landing Pages for each user

import home from './pages/home.vue';
import dashboard from './pages/dashboard.vue';

//File Management

import departments from './files/departments.vue';
import divisions from './files/divisions.vue';
import employees from './files/employees.vue';
import heads from './files/heads.vue';
import pap_codes from './files/pap_codes.vue';
import items from './files/items.vue';
import users from './files/users.vue';
import categories from './files/categories.vue';
import units from './files/units.vue';
import purchase_requests from './files/purchase_requests.vue';
import purchase_orders from './files/purchase_orders.vue';
import mode_of_procurements from './files/mode_of_procurements.vue';
import pmos from './files/pmos.vue';
import source_of_funds from './files/source_of_funds.vue';

import ppmp from './files/ppmp.vue';
import access_levels from './files/access_levels.vue';


import inventory from './files/inventory.vue';
import accountable_forms from './files/inventory/accountable_forms.vue';
import drugs_and_medicines from './files/inventory/drugs_and_medicines.vue';
import ict_supplies from './files/inventory/ict_supplies.vue';
import medical_dental_and_laboratory_supplies from './files/inventory/medical_dental_and_laboratory_supplies.vue';
import other_maintenance_operating_expenses from './files/inventory/other_maintenance_operating_expenses.vue';
import other_supplies_and_materials from './files/inventory/other_supplies_and_materials.vue';
import other_supplies from './files/inventory/other_supplies.vue';
import training_workshops from './files/inventory/training_workshops.vue';



export const routes = [

    {
        path: '/',
        component: login
    },
    {
        path: '/register',
        component: register
    },
    {
        path: '/access_levels',
        component: access_levels,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/ppmp',
        component: ppmp,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/home',
        component: home,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/dashboard',
        component: dashboard,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/units',
        component: units,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/purchase_requests',
        component: purchase_requests,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/purchase_orders',
        component: purchase_orders,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/items',
        component: items,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/departments',
        component: departments,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/divisions',
        component: divisions,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/employees',
        component: employees,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/heads',
        component: heads,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/inventory',
        component: inventory,
            children:[
                {
                    path: '/accountable_forms',
                    component: accountable_forms,
                },
                {
                    path: '/drugs_and_medicines',
                    component: drugs_and_medicines,
                },
                {
                    path: '/ict_supplies',
                    component: ict_supplies,
                },
                {
                    path: '/medical_dental_and_laboratory_supplies',
                    component: medical_dental_and_laboratory_supplies,
                },
                {
                    path: '/other_maintenance_operating_expenses',
                    component: other_maintenance_operating_expenses,
                },
                {
                    path: '/other_supplies_and_materials',
                    component: other_supplies_and_materials,
                },
                {
                    path: '/other_supplies',
                    component: other_supplies,
                },
                {
                    path: '/training_workshops',
                    component: training_workshops,
                },
            ],
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/pap_codes',
        component: pap_codes,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/categories',
        component: categories,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/source_of_funds',
        component: source_of_funds,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/mode_of_procurements',
        component: mode_of_procurements,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/pmos',
        component: pmos,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/users',
        component: users,
        meta: {
            requiresAuth: true
        }
    },
];