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
                    path: 'drugs_and_medicines',
 
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