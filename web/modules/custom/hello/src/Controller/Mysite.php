<?php

namespace Drupal\hello\Controller;

use Drupal\Component\Datetime\TimeInterface;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Datetime\DateFormatterInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Controller to print current time.
 */
class Mysite extends ControllerBase {
  
  /**
   * @var TimeInterface $time
   */
  protected $time;
  
  /**
   * @var DateFormatterInterface $dateFormat
   */
  protected $dateFormat;

  /**
   * Class constructor.
   */
  public function __construct(TimeInterface $time, DateFormatterInterface $dateFormat) {
    $this->time = $time;
    $this->dateFormat = $dateFormat;
  }
  
  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static($container->get('datetime.time'), $container->get('date.formatter'));
  }

  /**
   * Returns the current time when the path is accessed.
   */
  public function content() {
    return [
      '#type' =>  'markup',
      '#markup' => $this->t('Current time is ') . $this->dateFormat->format($this->time->getCurrentTime()),
    ];
  }
}
