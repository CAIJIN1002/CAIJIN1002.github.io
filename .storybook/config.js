import { configure } from '@storybook/react'

// function loadStories() {
//   const req = require.context('../elements/stories', true, /\.stories\.js$/)
//     .context('../components/stories', true, /\.stories\.js$/)
//   req.keys().forEach(filename => req(filename))
// }

function requireAll(requireContext) {
  return requireContext.keys().map(requireContext)
}

function loadStories() {
  requireAll(require.context('../src', true, /\.stories\.js$/))
}

configure(loadStories, module)
