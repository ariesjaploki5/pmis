
//Authentication
import Register from './auth/Register.vue';
import Login from './auth/Login.vue';

//requires auth
//Landing Pages for each user
import Welcome from './pages/Welcome.vue';
import Home from './pages/Home.vue';
import Dashboard from './pages/Dashboard.vue';

//File Management
import Account_codes from './files/Account_codes.vue';
import Departments from './files/Departments.vue';
import Divisions from './files/Divisions.vue';
import Employees from './files/Employees.vue';
import Heads from './files/Heads.vue';
import Pap_codes from './files/Pap_codes.vue';
import Requests from './files/Requests.vue';
import Supplies from './files/Supplies.vue';
import Users from './files/Users.vue';


export const routes = [
    {
        path: '/login',
        component: Login
    },
    {
        path: '/register',
        component: Register
    },

    {
        path: '/',
        component: Welcome,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/home',
        component: Home,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/dashboard',
        component: Dashboard,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/account_codes',
        component: Account_codes,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/departments',
        component: Departments,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/divisions',
        component: Divisions,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/employees',
        component: Employees,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/heads',
        component: Heads,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/pap_codes',
        component: Pap_codes,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/requests',
        component: Requests,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/supplies',
        component: Supplies,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/users',
        component: Users,
        meta: {
            requiresAuth: true
        }
    },
];