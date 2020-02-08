<?php namespace ProcessWire;
class InputfieldDemo extends Inputfield {

  public static function getModuleInfo() {
    return array(
      'title' => 'Demo', // Module Title
      'summary' => 'Inputfield of FieldtypeDemo', // Module Summary
      'version' => '0.0.1',
      'requires' => 'FieldtypeDemo',
      );
  }

  // /**
  //  * Render ready
  //  * 
  //  * @param Inputfield $parent
  //  * @param bool $renderValueMode
  //  * @return bool
  //  * @throws WireException
  //  * 
  //  */
  // public function renderReady(Inputfield $parent = null, $renderValueMode = false) {
  //   // load assets here
  //   return parent::renderReady($parent, $renderValueMode);
  // }

  /**
   * Render Inputfield
   * 
   * @return string
   * 
   */
  public function ___render() {
    $out = '<input name="demo" value="' . $this->value . '" type="text">'; 
    return $out; 
  }

  // /**
  //  * Process input
  //  * 
  //  * @param WireInputData $input
  //  * @return $this
  //  * 
  //  */
  // public function ___processInput(WireInputData $input) {
  //   parent::___processInput($input);
  //   $this->message("Processing input of demo field: Value = " . $input->demo);
  //   return $this;
  // }

  /**
   * Get field configuration
   * 
   * @return InputfieldWrapper
   * @throws WireException
   * 
   */
  public function ___getConfigInputfields() {
    $inputfields = parent::___getConfigInputfields();

    // custom config inputfields here
    $inputfields->add([
      'type' => 'markup',
      'value' => __FILE__ . ":" . __LINE__,
    ]);

    return $inputfields; 
  }
}
