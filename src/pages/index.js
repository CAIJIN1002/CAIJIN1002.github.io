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
          我有 2 年以上的網頁前端開發經驗，參與過 6 個 以上的專案開發，熟悉R
          eact、Vue，熱愛學習新技術與分享，享受在技術變化萬千的世界當中，對不同領域帶有學習熱枕，樂於學習接收新鮮事物。
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
