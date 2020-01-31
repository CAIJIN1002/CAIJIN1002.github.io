import Navbar from 'components/navbar'
import React, { Fragment, Suspense } from 'react'

import { Globalstyle } from './styled'
import { renderRoutes } from 'react-router-config'

export default function Layout(props) {
  const { route } = props
  return (
    <Fragment>
      <Globalstyle />
      <Navbar />
      <Suspense fallback="">{renderRoutes(route.routes)}</Suspense>
    </Fragment>
  )
}
