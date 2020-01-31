const ghpages = require('gh-pages')

ghpages.publish(
  'build',
  {
    branch: 'master',
    repo: 'https://github.com/CAIJIN1002/CAIJIN1002.github.io.git'
  },
  () => console.log('publish Done')
)
