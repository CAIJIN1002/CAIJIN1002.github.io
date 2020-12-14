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
          我有豐富的開發網站經驗，能夠獨立作業確認需求流程，溝通協調與不同部門溝通。
          參與多個大型系統開發，串接過不同金、物流及第三方API，熟悉 React、Redux、Jest、Graphql
          等技術。
        </h3>
        {`}`}
      </StyledSubTitle>
      <StyledFooter>
        <StyledIcons>
          <StyledIcon>
            <a href="https://github.com/CAIJIN1002" rel="noopener noreferrer" target="_blank">
              <img src={GithubIcon} alt="github" />
            </a>
          </StyledIcon>
          <StyledIcon>
            <a href="mailto:caijin.weng1002@gmail.com" rel="noopener noreferrer" target="_blank">
              <img src={MaillIcon} alt="mail" />
            </a>
          </StyledIcon>
        </StyledIcons>
      </StyledFooter>
    </StyledHomePage>
  )
}
