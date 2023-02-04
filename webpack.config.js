import defaultConfig from '@wordpress/scripts/config/webpack.config.js'

export default {
  ...defaultConfig,
  entry: {
    ...defaultConfig.entry(),
    "editor/index": "./src/index" 
  }
}