( function( api ) {

	// Extends our custom "jewellery-lite" section.
	api.sectionConstructor['jewellery-lite'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );