import React, { useState, Fragment } from 'react'
import styled from 'styled-components'
import theme from 'theme'
import { useLocation, useHistory } from 'react-router'

const StyledNavbar = styled.ul`
  width: 100%;
  padding: 16px;
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 auto;
  list-style: none;
  flex-wrap: wrap;
  @media (min-width: 576px) {
    max-width: 540px;
  }
  @media (min-width: 768px) {
    max-width: 720px;
  }
  @media (min-width: 992px) {
    max-width: 960px;
  }
`

const NavbarItem = styled.li`
  &,
  & > a {
    color: ${props => (props.active ? theme.white : theme.grey)};
    text-decoration: none;
    padding: 0.5rem 1rem;
  }
  text-align: center;
  margin: 0 1.5rem;
  cursor: pointer;
  user-select: none;
  font-size: 20px;
`

const config = [
  {
    title: 'Home',
    href: '/'
  },
  {
    title: 'Projects',
    href: '/projects'
  }
]

const StyledTransitionAnimation = styled.div`
  width: 200%;
  height: 100%;
  background-color: ${theme.yellow};
  position: fixed;
  top: 0;
  left: 100%;
  z-index: 999;
  animation: left 1s ease-in-out;
  @keyframes left {
    from {
      left: 200%;
    }
    to {
      left: -200%;
    }
  }
`

export default function Navbar() {
  const location = useLocation()
  const history = useHistory()
  const hangleRouter = ({ href }) => {
    setLoading(true)
    const routerTimmer = setTimeout(() => {
      history.push(href)
      clearTimeout(routerTimmer)
    }, 500)
  }

  const handleLocationChange = () => {
    unsubscribeFromHistory()

    const timmer = setTimeout(() => {
      clearTimeout(timmer)
      setLoading(false)
    }, 500)
  }
  const [loading, setLoading] = useState(false)
  const unsubscribeFromHistory = history.listen(handleLocationChange)
  return (
    <Fragment>
      <StyledNavbar>
        {config.map((nav, idx) => (
          <NavbarItem
            active={nav.href === location.pathname}
            key={`navItem-${idx}`}
            onClick={() => hangleRouter({ href: nav.href })}
          >
            {nav.title}
          </NavbarItem>
        ))}
      </StyledNavbar>
      {loading ? <StyledTransitionAnimation active={loading} /> : ''}
    </Fragment>
  )
}
