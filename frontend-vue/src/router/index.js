import { createRouter, createWebHistory } from 'vue-router'



const routes = [
    {
        path: '/',
        component: () => import('../views/Login.vue'), 
        name: 'Login'
    },
    {
        path: '/register',
        component: () => import('../views/Register.vue'), 
        name: 'Register'
    }
      
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router
