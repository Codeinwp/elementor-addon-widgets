/* jshint node:true */
//https://github.com/kswedberg/grunt-version
module.exports = {
    options: {
        pkg: {
            version: '<%= package.version %>'
        }
    },
    project: {
        src: [
            'package.json'
        ]
    },
    style: {
        options: {
            prefix: 'Version\\:\\s'
        },
        src: [
            'elementor-addon-widgets.php'

        ]
    },
    constants: {
	    options: {
		    prefix: 'EA_VERSION\'\,\\s+\''
	    },
	    src: [
		    'elementor-addon-widgets.php',
	    ]
    }
};