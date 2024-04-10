import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import CreateJHA from '@/views/CreateJHA.vue'
import ViewJHA from '../views/ViewJHA.vue'
import JHAForm from '@/views/JHAForm.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/create',
      name: 'create',
      component: CreateJHA
    },
    {
      path: '/view',
      name: 'view',
      component: ViewJHA
    },
    {
      path: '/form',
      name: 'form',
      component: JHAForm
    },
    {
      path: '/about',
      name: 'about',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/AboutView.vue')
    }
  ]
})

export default router
