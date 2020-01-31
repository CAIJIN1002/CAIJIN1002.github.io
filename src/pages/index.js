import React from 'react'
import GithubIcon from 'assets/icons/github.svg'
import MaillIcon from 'assets/icons/mail.svg'
import {
  StyledHomePage,
  StyledTitle,
  StyledSubTitle,
  StyledFooter,
  StyledIcons,
  StyledIcon
} from './styled'

export default function HomePage() {
  return (
    <StyledHomePage>
      <StyledTitle>
        Hello, I'm
        <br />
        <span>John Weng</span>
      </StyledTitle>
      <StyledSubTitle>
        async
        {` {`}
        <h3>
          A Passionate Front-end Developer, UI/UX Enthusiast, Android Geek and Web Developer. Lorem
          ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
          labore et.
        </h3>
        {`}`}
      </StyledSubTitle>
      <StyledFooter>
        <StyledIcons>
          <StyledIcon>
            <img src={GithubIcon} alt="" />
          </StyledIcon>
          <StyledIcon>
            <img src={MaillIcon} alt="" />
          </StyledIcon>
        </StyledIcons>
      </StyledFooter>
    </StyledHomePage>
  )
}
