import { createRouter, createWebHistory } from 'vue-router'

const routes = [
  {
    path: '/books',
    name: 'books',
    component: () => import('@/views/booksPage')
  },
  {
    path: '/books/filtered/:author_id?',
    name: 'bookFiltered',
    props: (route) => {
      return {
        author_id: route.params.author_id,
      }
    },
    component: () => import('@/views/booksPage')
  },
  {
    path: '/authors',
    name: 'authors',
    component: () => import('@/views/authorsPage'),
  },
  {
    path: '/book-edit/:id?',
    name: 'bookEdit',
    props: (route) => {
      return {
        id: route.params.id,
      }
    },
    component: () => import('@/views/bookEdit'),
  },
  {
    path: '/author-edit/:id?',
    name: 'authorEdit',
    props: (route) => {
      return {
        id: route.params.id,
      }
    },
    component: () => import('@/views/authorEdit'),
  },
  {
    path: '/:catchAll(.*)',
    name: 'NotFound',
    component: () => import('@/views/booksPage'),
  },
]

const router = createRouter({
  history: createWebHistory(),
  routes,
})

export default router
