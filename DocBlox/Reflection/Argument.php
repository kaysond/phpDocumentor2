<?php
class DocBlox_Reflection_Argument extends DocBlox_Reflection_Abstract
{
  /**
   * The default value of this argument, or null if none available.
   *
   * @var string|null
   */
  protected $default     = null;

  /**
   * The type of this argument.
   *
   * This is a free text field and thus could contain any typehinting value like stdClass or array.
   * If no typehint was provided this variable contains null.
   *
   * @var string|null
   */
  protected $type        = null;

  /**
   * Retrieves the generic information.
   *
   * Find the name, type and default value for this argument.
   *
   * @param  DocBlox_TokenIterator $tokens
   * @return void
   */
  public function processGenericInformation(DocBlox_TokenIterator $tokens)
  {
    $this->setName($tokens->current()->getContent());
    $this->type    = $this->findType($tokens);
    $this->default = $this->findDefault($tokens);
  }

  /**
   * Returns the default value or null is none is set.
   *
   * @return null|string
   */
  public function getDefault()
  {
    return $this->default;
  }

  /**
   * Returns the typehint, or null if none is set.
   *
   * @return string|null
   */
  public function getType()
  {
    return $this->type;
  }

  /**
   * Returns the XML representation of this object or false if an error occurred.
   *
   * @return string|boolean
   */
  public function __toXml()
  {
    $xml = new SimpleXMLElement('<argument></argument>');
    $xml->name         = $this->getName();
    $xml->default      = $this->getDefault();
    $xml->type         = $this->getType();

    return $xml->asXML();
  }

  /**
   * Returns the name of this argument.
   *
   * @return string
   */
  public function __toString()
  {
    return $this->getName();
  }
}