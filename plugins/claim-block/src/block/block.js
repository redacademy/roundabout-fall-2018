/**
 * BLOCK: claim-block
 *
 * Registering a basic block with Gutenberg.
 * Simple block, renders and saves the same content without any interactivity.
 */

//  Import CSS.
import './style.scss';
import './editor.scss';

const { __ } = wp.i18n; // Import __() from wp.i18n
const { registerBlockType } = wp.blocks; // Import registerBlockType() from wp.blocks
const { RichText, BlockControls, AlignmentToolbar, InspectorControls } = wp.editor;
const { Fragment } = wp.element;
const { IconButton, Toolbar, TextControl, SelectControl, PanelBody} = wp.components;

/**
 * Register: aa Gutenberg Block.
 *
 * Registers a new block provided a unique name and an object defining its
 * behavior. Once registered, the block is made editor as an option to any
 * editor interface where blocks are implemented.
 *
 * @link https://wordpress.org/gutenberg/handbook/block-api/
 * @param  {string}   name     Block name.
 * @param  {Object}   settings Block settings.
 * @return {?WPBlock}          The block, if it has been successfully
 *                             registered; otherwise `undefined`.
 */
registerBlockType( 'cgb/block-claim-block', {
	// Block name. Block names must be string that contains a namespace prefix. Example: my-plugin/my-custom-block.
	title: __( 'claim-block - CGB Block' ), // Block title.
	icon: 'format-status', // Block icon from Dashicons → https://developer.wordpress.org/resource/dashicons/.
	category: 'common', // Block category — Group blocks together based on common traits E.g. common, formatting, layout widgets, embed.
	keywords: [
		__( 'claim-block — CGB Block' ),
		__( 'CGB Example' ),
		__( 'create-guten-block' ),
	],

	/**
	 * The edit function describes the structure of your block in the context of the editor.
	 * This represents what the editor will render when the block is used.
	 *
	 * The "edit" property must be a valid function.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/block-api/block-edit-save/
	 */
    attributes: {
        content: {
            type: 'string',
            source: 'html',
            selector: 'p',
        },

        buttonText: {
            type: 'string',
            source: 'text',
            selector: 'a.button'

        },
        background: {
            type: 'string',
            source: 'attribute',
            selector: 'div[data-background]',
            attribute: 'data-background'
        },

        buttonUrl: {
            type: 'string',
            source: 'attribute',
            selector: 'a.button',
            attribute: 'href'
        }
    },

    edit({attributes, className, setAttributes}) {
        const {content, buttonText, background, buttonUrl} = attributes;
        const hasButton = buttonText && buttonText.length;

        function onChangeContent(newContent) {
            setAttributes({content: newContent});
        }

        function toggleHasButton() {
            if(!hasButton) {
                setAttributes({buttonText: 'Button'});
            } else {
                setAttributes({buttonText: ''});
            }
        }

        function onChangeButtonText(newButtonText) {
            setAttributes({buttonText: newButtonText});
        }

        function onChangeBackground(newBackground) {
            setAttributes({background: newBackground});
        }

        function onChangeButtonUrl(newButtonUrl) {
            setAttributes({buttonUrl: newButtonUrl});
        }


        return (
            <Fragment>
                <InspectorControls>
                    <PanelBody
                        title='Background Icon Image'
                    >
                        <SelectControl
                            onChange={ onChangeBackground }
                            value={background}
                            options={
                                [
                                    {'value': 'none', label: 'None'},
                                    {'value': 'round', label: 'green round background'},
                                    {'value': 'heart', label: 'pink heart background'},
                                    {'value': 'number', label: 'eighty plus number'},
                                ]
                            }
                        />
                    </PanelBody>
                    <PanelBody
                        title='Button options'
                    >
                        <IconButton
                            className={{
                                'is-active': hasButton,
                                'components-toolbar__control': true
                            }}
                            icon="plus"
                            label="Add button"
                            onClick={ toggleHasButton }
                        />
                        { hasButton &&
                        <TextControl
                            label='Url'
                            placeholder='url'
                            value={ buttonUrl }
                            onChange={ onChangeButtonUrl }
                        />
                        }
                    </PanelBody>
                </InspectorControls>
                <div className={background}>

                    <RichText
                        key="editable"
                        tagName="p"
                        className={ className }
                        onChange={ onChangeContent }
                        value={ content }
                    />
                    { hasButton &&
                        <button>
                            <TextControl
                                value={ buttonText }
                                onChange={ onChangeButtonText }
                            />
                        </button>
                    }
                </div>
            </Fragment>
        );
    },



	/**
	 * The save function defines the way in which the different attributes should be combined
	 * into the final markup, which is then serialized by Gutenberg into post_content.
	 *
	 * The "save" property must be specified and must be a valid function.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/block-api/block-edit-save/
	 */
    save({attributes}) {
        const hasButton = attributes.buttonText && attributes.buttonText.length;

        return (
            <div>
                <div className={attributes.background} data-background={attributes.background}>
                    <RichText.Content
                        value={attributes.content}
                        tagName="p"
                    />
                    {hasButton &&
                    <a className={"button"} href={attributes.buttonUrl}>
                        {attributes.buttonText}
                    </a>
                    }
                </div>
            </div>
        );
    },
} );
