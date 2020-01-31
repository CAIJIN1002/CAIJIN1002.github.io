import React from 'react'
import projectList from './projectConfig'

import {
  StyledPageProject,
  StyledProjectList,
  StyledProject,
  StyledCardBody
} from './styled/projects'

export default function Projects() {
  return (
    <StyledPageProject>
      <StyledProjectList>
        {projectList.map((data, idx) => (
          <StyledProject key={`project-${idx}`}>
            <StyledCardBody href={data.link || null} target="_blank">
              <img src={data.image} alt={data.title} />
              <h2>{data.title}</h2>
              <p>{data.discription}</p>
            </StyledCardBody>
          </StyledProject>
        ))}
      </StyledProjectList>
    </StyledPageProject>
  )
}
