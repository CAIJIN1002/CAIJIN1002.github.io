import styled from 'styled-components'
import theme from 'theme'

export const StyledPageProject = styled.div`
  width: 100%;
  height: 100%;
  display: flex;
`
export const StyledProjectList = styled.ul`
  margin: 0;
  padding: 0;
  width: 100%;
  font-size: 0;
  list-style: none;
  vertical-align: top;
  display: flex;
  flex-wrap: wrap;
  justify-content: flex-start;
  align-items: flex-start;
`

export const StyledProject = styled.li`
  padding: 0 15px;
  display: flex;
  flex: 0 0 calc(100% / 3);
  max-width: calc(100% / 3);

  transition: 0.1s ease-in;
  &:hover {
    transform: scale(1.09);
  }
  @media (max-width: 992px) {
    flex: 1;
    width: 100%;
    min-width: 100%;
  }
`

export const StyledCardBody = styled.a`
  display: flex;
  flex-direction: column;
  margin: 3rem 1rem;
  width: 100%;
  padding: 1.25rem;
  flex: 1 1 auto;
  background-color: #324359;
  box-shadow: 0 4px 4px rgba(0, 0, 0, 0.25);
  border-radius: 0.25rem;
  overflow: hidden;
  color: ${theme.white};
  cursor: pointer;
  text-decoration: none;
  @media (max-width: 992px) {
    margin: 1rem;
  }
  & > img {
    margin-bottom: 0.75rem;
    min-height: 250px;
    max-height: 250px;
    object-fit: contain;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #324359;
  }
  & > h2 {
    font-size: 2rem;
    margin-top: 0;
    margin-bottom: 0.75rem;
  }
  & > p {
    font-size: 0.7rem;
    color: #ccc;
    margin-bottom: 1rem;
  }
`
