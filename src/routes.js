import { lazy } from 'react'
import Layout from './layouts'
export default [
  {
    route: '*',
    component: Layout,
    routes: [
      {
        path: '/',
        exact: true,
        component: lazy(() => import('pages'))
      },
      {
        path: '/projects',
        exact: true,
        component: lazy(() => import('pages/projects'))
      }
    ]
  }
]
