import { registerBlockType } from '@wordpress/blocks';
import './style.scss';
import Edit from './edit';

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
true