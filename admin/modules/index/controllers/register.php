<?php
/*
 * @filesource index/controllers/register.php
 * @link http://www.kotchasan.com/
 * @copyright 2016 Goragod.com
 * @license http://www.kotchasan.com/license/
 */

namespace Index\Register;

use \Kotchasan\Login;
use \Kotchasan\Html;

/**
 * Register Form
 *
 * @author Goragod Wiriya <admin@goragod.com>
 *
 * @since 1.0
 */
class Controller extends \Kotchasan\Controller
{

  /**
   * แสดงผล
   */
  public function render()
  {
    // แอดมิน
    if (Login::isAdmin()) {
      // แสดงผล
      $section = Html::create('section');
      // breadcrumbs
      $breadcrumbs = $section->add('div', array(
        'class' => 'breadcrumbs'
      ));
      $ul = $breadcrumbs->add('ul');
      $ul->appendChild('<li><a class="icon-user" href="index.php?module=member">สมาชิก</a></li>');
      $ul->appendChild('<li><span>ลงทะเบียนสมาชิกใหม่</span></li>');
      $section->add('header', array(
        'innerHTML' => '<h1 class="icon-register">'.$this->title().'</h1>'
      ));
      // แสดงฟอร์ม
      $section->appendChild(createClass('Index\Register\View')->render());
      return $section->render();
    }
    // 404
    return \Index\PageNotFound\Controller::render();
  }

  /**
   * title bar
   */
  public function title()
  {
    return 'ลงทะเบียนสมาชิกใหม่';
  }
}