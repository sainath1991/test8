<?php

namespace Drupal\hello\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'Comapany' block.
 *
 * @Block(
 *   id = "company",
 *   admin_label = @Translation("Company greeting")
 * )
 */
class Company extends BlockBase{
  
  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#markup' => $this->t('Welcome to our company'),
    ];
  }

}
