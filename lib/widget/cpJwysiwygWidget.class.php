<?php
class cpJwysiwygWidget extends sfWidgetFormTextArea {

  protected function configure($options = array(), $attributes = array()) {
    $this->addOption('template', <<<EOF
%widget%
<script type="text/javascript">
  jQuery(document).ready(function() {
    jQuery('#%id%').wysiwyg();
  });
</script>    
EOF
);
  }

  /**
   * @param  string $name        The element name
   * @param  string $value       The value displayed in this widget
   * @param  array  $attributes  An array of HTML attributes to be merged with the default HTML attributes
   * @param  array  $errors      An array of errors for the field
   *
   * @return string An HTML tag string
   *
   * @see sfWidgetForm
   */
  public function render($name, $value = null, $attributes = array(), $errors = array()) {
    $id = $this->generateId($name);

    return strtr($this->getOption('template'), array(
             '%widget%' => parent::render($name, $value, $attributes, $errors),
             '%id%' => $id
            ));
  }
  
  public function getJavascripts() {
    return array('/cpJwysiwygPlugin/jwysiwyg/jquery.wysiwyg.js');
  }
  
  public function getStylesheets() {
    return array('/cpJwysiwygPlugin/jwysiwyg/jquery.wysiwyg.css' => 'screen');
  }
}
