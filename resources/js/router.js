import Vue from 'vue'
import Router from 'vue-router'
import Home from './views/Home'
import Login from './views/Login'
import Register from './views/Register'
import Welcome from './views/Welcome'
import Profile from './views/Profile'
import Assigned from './views/mentor/AssignedMentees'

Vue.use(Router)

let routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/login',
    name: 'Login',
    component: Login
  },
  {
    path: '/register',
    name: 'Register',
    component: Register
  },
  {
    path: '/welcome',
    name: 'Welcome',
    component: Welcome
  },
  {
    path: '/profile',
    name: 'Profile',
    component: Profile
  },
  {
    path: '/assigned_mentee',
    name: 'Assigned',
    component: Assigned
  },
]

const router =  new Router({
  mode: 'history',
  base: process.env.BASE_URL,
  linkActiveClass: 'open active',
  routes
})

export default router