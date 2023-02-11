import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps } from '@wordpress/block-editor';

import './index.css'

registerBlockType('fsd-gp/geopoint-map', {
  edit() {
    const blockProps = useBlockProps({className: "geopoint-map-placeholder"});

    return (
      <>
        <div {...blockProps}>
          <p>Your geopoint map will appear here.</p>
        </div>
      </>
    );
  }
});