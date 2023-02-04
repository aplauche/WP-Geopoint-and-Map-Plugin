import {registerPlugin} from "@wordpress/plugins"


import {PluginSidebar} from "@wordpress/edit-post";


import { __ } from "@wordpress/i18n"

import {useSelect, useDispatch} from "@wordpress/data"

import {PanelBody, TextControl} from '@wordpress/components'

console.log("hello")

registerPlugin('fsd-sidebar', {
  render(){

    const {fsd_lat, fsd_lng} = useSelect(select => {
      return select('core/editor').getEditedPostAttribute("meta")
    })

    const { editPost } = useDispatch("core/editor")

    return <PluginSidebar name="fsd_sidebar" icon="location-alt" title="Geopoint Options">
      <PanelBody title={__("Coordinates", "fsd-gp")}>
        <TextControl 
          label={__("Latitude", "fsd-gp")}
          value={fsd_lat}
          onChange={fsd_lat => {
            editPost({
              meta: {
                fsd_lat: fsd_lat
              }
            })
          }}
        />
        <TextControl 
          label={__("Longitude", "fsd-gp")}
          value={fsd_lng}
          onChange={fsd_lng => {
            editPost({
              meta: {
                fsd_lng: fsd_lng
              }
            })
          }}
        />
      </PanelBody>
    </PluginSidebar>
  }
})