import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import ClockView from '../views/ClockView.vue'
import DateCalcView from '../views/DateCalcView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView,
    },
    {
      path: '/clock',
      name: 'clock',
      component: ClockView,
    },
    {
      path: '/dateCalc',
      name: 'dateCalc',
      component: DateCalcView,
    },
  ],
})

export default router
