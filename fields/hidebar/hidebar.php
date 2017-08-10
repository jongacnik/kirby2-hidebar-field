<?php

class HidebarField extends BaseField {

  public function input () {
    $styles = '
      [data-field="hidebar"] { display: none; }
      @media screen and (min-width: 50em) {
        .mainbar { width: 100% }
        .sidebar { display: none }
        .bars-with-sidebar-left:before { background: none }
        .ltr .mainbar .form .buttons { left: 0 }
      }
    ';

    if (isset($this->unstick) && $this->unstick) {
      $styles .= '
        @media screen and (min-width: 50em) {
          .mainbar .form .buttons {
            position: relative;
          }
          .mainbar .form {
            padding-bottom: 1.5em;
          }
        }
      ';
    }

    return new Brick('style', $styles);
	}

  public function element() {
    $element = parent::element();
    $element->data('field', 'hidebar');
    return $element;
  }

}