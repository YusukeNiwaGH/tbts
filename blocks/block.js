const { assign } = lodash;
const { __ } = wp.i18n;
const { Fragment } = wp.element;
const { addFilter } = wp.hooks;
const {
    PanelBody,
    RadioControl
} = wp.components;

const {
    InspectorControls,
} = window.wp.editor;

const { createHigherOrderComponent } = wp.compose;

const isValidBlockType = ( name ) => {
  const validBlockTypes = [
      'core/paragraph',   // 段落
      'core/list',        // リスト
      'core/image'        // イメージ
  ];
  return validBlockTypes.includes( name );
};