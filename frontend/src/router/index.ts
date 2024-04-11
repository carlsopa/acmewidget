import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import CreateJHA from '@/views/CreateJHA.vue'
import ViewJHA from '../views/ViewJHA.vue'
import JHAForm from '@/views/JHAForm.vue'
import EditForm from '@/views/editForm.vue'

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
      path: '/edit',
      name: 'edit',
      component: EditForm
    }
  ]
})

export default router
