/**
 * Registers a new block provided a unique name and an object defining its behavior.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-registration/
 */
import { registerBlockType } from '@wordpress/blocks';

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * All files containing `style` keyword are bundled together. The code used
 * gets applied both to the front of your site and to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import './style.scss';

/**
 * Internal dependencies
 */
import Edit from './edit';

/**
 * Every block starts by registering a new block type definition.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-registration/
 */
registerBlockType('create-block/youtube-customize-sticky-video', {
	/**
	 * @see ./edit.js
	 */
	 title: 'Youtube Sticky Video',
	 description: "Gutenberg block to adjust sticky video on frontend side",
	 icon: 'video-alt3',
	 apiVersion: 2,

	 supports: {
		multiple: false
	},

	 attributes: {
		video_id: {
			 type: "string",
			 default: 'XvEG9XWD4JI',
		 },
		video_possion: {
			 type: "string",
			 default: 'br',
		 },
		bottom: {
			 type: "number",
			 default: '10',
		 },
		top: {
			 type: "number",
			 default: '10',
		 },
		right: {
			 type: "number",
			 default: '10',
		 },
		left: {
			 type: "number",
			 default: '10',
		 },
	 },
	edit: Edit,
	/**
	 * @see ./save.js
	 */
	save,
});
