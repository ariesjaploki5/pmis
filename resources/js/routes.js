
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
import requests from './files/requests.vue';
import items from './files/items.vue';
import users from './files/users.vue';
import categories from './files/categories.vue';

    
export const routes = [

    {
        path: '/login',
        component: login
    },
    {
        path: '/register',
        component: register
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
        path: '/requests',
        component: requests,
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