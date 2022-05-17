import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import AboutView from '../views/AboutView.vue'
import BookingsListVue from '../views/bookings/BookingsList.vue'
import ViewBooking from '../views/bookings/ViewBooking.vue'


const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/about',
      name: 'about',
      component: AboutView
    },
    {
      path: '/bookings',
      name:'all-bookings',
      component: BookingsListVue,
     
    },
    {
      path: '/bookings/:id',
      name:'view-booking',
      component: ViewBooking,
      props:true
    }
  ]
})

export default router
