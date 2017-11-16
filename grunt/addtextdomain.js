/* jshint node:true */
// https://github.com/blazersix/grunt-wp-i18n
module.exports = {
	fixDomains: {
		options: {
			textdomain: '<%= package.textdomain %>',
			updateDomains: ['eaw']
		},
		files: {
			src: [
				'**/*.php'
			]
		}
	},
};
