<?php namespace ProcessWire;
class FieldtypeDemo extends Fieldtype {
  public static function getModuleInfo() {
    return array(
      'title' => 'Demo',
      'version' => '0.0.1',
      'summary' => 'Demo of how to develop a PW Fieldtype',
      'installs' => 'InputfieldDemo',
    );
  }

  /**
   * Sanitize value for storage
   * 
   * @param Page $page
   * @param Field $field
   * @param string $value
   * @return string
   *
   */
  public function sanitizeValue(Page $page, Field $field, $value) {
    $this->message("Sanitizing value '$value'");
    return $value; 
  }

  /**
   * Format value for output
   * 
   * @param Page $page
   * @param Field $field
   * @param string $value
   * @return string
   *
   */
  public function ___formatValue(Page $page, Field $field, $value) {
    $value = (string) $value;
    // format value here
    return "Formatted value: $value";
  }

  /**
   * Return the associated Inputfield
   * 
   * @param Page $page
   * @param Field $field
   * @return Inputfield
   *
   */
  public function getInputfield(Page $page, Field $field) {
    $inputField = $this->wire('modules')->get('InputfieldDemo'); 
    return $inputField; 
  }

  // /**
  //  * Update a query to match the text with a fulltext index
  //  * 
  //  * @param DatabaseQuerySelect $query
  //  * @param string $table
  //  * @param string $subfield
  //  * @param string $operator
  //  * @param int|string $value
  //  * @return DatabaseQuerySelect
  //  *
  //  */
  // public function getMatchQuery($query, $table, $subfield, $operator, $value) {
  //   /** @var DatabaseQuerySelectFulltext $ft */
  //   $ft = $this->wire(new DatabaseQuerySelectFulltext($query)); 
  //   $ft->match($table, $subfield, $operator, $value); 
  //   return $query; 
  // }

  /**
   * Return the database schema in specified format
   * 
   * @param Field $field
   * @return array
   *
   */
  public function getDatabaseSchema(Field $field) {
    $schema = parent::getDatabaseSchema($field);
    $schema['data'] = 'text NOT NULL';
    $schema['keys']['data'] = 'FULLTEXT KEY `data` (`data`)'; 
    return $schema;
  }

  /**
   * Return the fields required to configure an instance of FieldtypeDemo
   * 
   * @param Field $field
   * @return InputfieldWrapper
   *
   */
  public function ___getConfigInputfields(Field $field) {
    $inputfields = parent::___getConfigInputfields($field);
    
    // custom config inputfields here
    $inputfields->add([
      'type' => 'markup',
      'value' => __FILE__ . ":" . __LINE__,
    ]);

    return $inputfields; 
  }
}
