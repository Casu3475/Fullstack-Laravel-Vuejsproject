import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import DetailView from '../views/DetailView.vue'
import AdminView from '../views/AdminView.vue'
import CommentView from '../views/CommentView.vue'
import CategoriesadminView from '../views/CategoriesadminView.vue'
import UsersadminView from '../views/UsersadminView.vue'
import CommentsadminView from '../views/CommentsadminView.vue'
import GlobalView from '../views/GlobalView.vue'
import LoginView from '../views/LoginView.vue'
import RegisterView from '../views/RegisterView.vue'
import UserSettingsView from '../views/UserSettingsView.vue'
import SearchView from '../views/SearchView.vue'


const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/detail/:id',
      name: 'detail',
      component: DetailView
    },
    {
      path: '/admin',
      name: 'admin',
      component: AdminView
    },
    {
      path: '/comment',
      name: 'comment',
      component: CommentView
    },
    {
      path: '/admin/categories',
      name: 'categoriesadmin',
      component: CategoriesadminView
    },
    {
      path: '/admin/users',
      name: 'usersadmin',
      component: UsersadminView
    },
    {
      path: '/admin/comments',
      name: 'commentsadmin',
      component: CommentsadminView
    },
    {
      path: '/global/:id',
      name: 'global',
      component: GlobalView
    },
    {
      path: '/login',
      name: 'login',
      component: LoginView
    },
    ,
    {
      path: '/register',
      name: 'register',
      component: RegisterView
    },
    {
      path: '/settings',
      name: 'settings',
      component: UserSettingsView
    },
    {
      path: '/search/:search',
      name: 'search',
      component: SearchView
    },

  ]

})

export default router
