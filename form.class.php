<?php

require_once( '../vendor/NoCSRF/nocsrf.php' );

class Form {

  /**
  * The CSRF token used by the form builder.
  *
  * @var string
  */
  protected $csrfToken;
  
  /**
  * Open up a new HTML form.
  *
  * @param  string $name   Name value
  * @param  string $method Method value. Default: post
  * @param  string $action Action value
  * @return string         Returns HTML output
  */
  public function open( $name = '', $action = '', $method = 'post' ) {
    
    $action_name = preg_replace( '.php', '', $action );

    $output = '<form name="' . $name . '" method="' . $method . '" action="' . $action_name . '.php">' . "\n";
    $output .= $this->token();

    return $output;

  }

  /**
   * Close the current form.
   *
   * @return string Returns HTML output
   */
  public function close() {
    
    return '</form>';

  }

  /**
   * Generate a hidden field with the current CSRF token.
   *
   * @return string  Returns HTML Output
   */
  public function token( $name = '_token', $value = '' ) {
    
    $this->csrfToken = NoCSRF::generate( $name );

    if ( !isset( $value ) || $value == '' ) {
      $value = $this->csrfToken;
    }
    
    return $this->hidden( $name, $value );

  }

  /**
   * Create a hidden input field.
   *
   * @param  string $name  Name of field
   * @param  string $value Value of field
   * @return string        Returns HTML output
   */
  public function hidden( $name, $value = null)
  {
    return $this->input('hidden', $name, $value);
  }

  public function label() {

  }

  /**
   * Create a form input field.
   *
   * @param string $type
   * @param string $name
   * @param string $value
   * @param array $options
   * @return string
   */
  public function input( $type, $name, $value = null, $id = null, $class = null ) {
    $attr = array();

   if ( isset( $value ) ) ? $attr['value'] = ' value=' . $value : $attr['value'] = '';

   if ( isset( $id ) ) ? $attr['id'] = ' id=' . $id : $attr['id'] = '';

   if ( isset( $class ) ) ? $attr['class'] = ' class=' . $class : $attr['class'] = '';

    return '<input type="' . $type . '" name="' . $name . '"' . $attr['value'] . $attr['id'] . $attr['class'] . '>';
  }

  public function text() {

  }

  public function email() {

  }

  public function textarea() {

  }

  protected function setTextAreaSize() {

  }

  protected function setQuickTextAreaSize() {

  }

  public function submit() {
 
  }
 
  public function button() {
  
  }

}