import { createGlobalStyle } from 'styled-components'
import theme from 'theme'

export const Globalstyle = createGlobalStyle`
  * {
    /* border: 1px solid; */
    box-sizing: border-box;
    position: relative;
  }
  body {
    width: 100%;
    height: 100%;
    margin: 0;
    padding: 0;
    font-family: Poppins, sans-serif;
    background-color: ${theme.darkBlue};
  }
`
