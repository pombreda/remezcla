<?php
/**
 * Class with methods for product item and list retrieval and display.
 *
 * @author Ramiro Gomez <www@ramiro.org>
 */
class Product extends AbstractModule {

  /**
   * Instance of Amazon class
   *
   * @var Amazon
   */
  protected $amazon;

  /**
   * Constructor of product class
   *
   * @param Object $amazon
   * @return Void
   */
  public function __construct($amazon) {
    $this->amazon = $amazon;
  }

  /**
   * Implementation of pathMap method.
   */
  public function pathMap() {
    return array(
      'product' => array(
        'callback' => 'item',
        'template' => 'templateItem'
      ),
      'manufacturer' => array(
        'callback' => 'itemList',
        'template' => 'templateItemList'
      )
    );
  }

  /**
   * Implementation of index method.
   */
  public function index() {

  }
  
  public function itemList() {

  }

  public function templateItemList() {

  }

  public function item() {

  }

  public function templateItem() {

  }
}