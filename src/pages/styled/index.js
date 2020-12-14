import styled from 'styled-components'
import theme from 'theme'
export const StyledHomePage = styled.div`
  color: ${theme.white};
  font-size: 2rem;
  padding: 0 15px;
  margin: 0 auto;
  display: flex;
  flex-direction: column;
  width: 100%;
  @media (min-width: 576px) {
    max-width: 540px;
  }
  @media (min-width: 768px) {
    max-width: 720px;
  }
  @media (min-width: 992px) {
    max-width: 960px;
  }
  @media (min-width: 1200px) {
    max-width: 1140px;
  }
`
export const StyledTitle = styled.h1`
  margin: 0;
  font-size: 4.5rem;
  margin-top: 1rem;
  & > span {
    color: ${theme.yellow};
  }
`
export const StyledSubTitle = styled.h2`
  margin: 0;
  margin-top: 1.5rem;
  font-size: 2.5rem;
  font-weight: 500;
  & > h3 {
    margin: 1.5rem 3rem;
    color: ${theme.grey};
    font-size: 1.75rem;
    text-align: justify;
    width: 85%;
  }
`
export const StyledFooter = styled.div`
  width: 100%;
  margin-top: 3rem;
  margin-bottom: 0.5rem;
`
export const StyledIcons = styled.ul`
  list-style: none;
  display: flex;
  width: 100%;
  margin: 0;
  padding: 0;
`
export const StyledIcon = styled.li`
  display: flex;
  width: 40px;
  height: 40px;
  margin-right: 3rem;
  color: ${theme.white};
  & > a {
    width: 100%;
    height: 100%;
  }
  & > a > img {
    display: flex;
    width: 100%;
    height: 100%;
  }
`
