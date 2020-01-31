import React from 'react'
import { Router } from 'react-router-dom'
import { renderRoutes } from 'react-router-config'
import { createBrowserHistory } from 'history'
import routes from './routes'
const history = createBrowserHistory()
function App() {
  return <Router history={history}>{renderRoutes(routes)}</Router>
}

export default App
