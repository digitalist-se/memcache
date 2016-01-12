<?php

/**
 * @file
 * Contains \Drupal\memcache\DrupalMemcacheConfig.
 */

namespace Drupal\memcache;

use Drupal\Core\Site\Settings;

/**
 * Class for holding Memcache related config
 */
class DrupalMemcacheConfig {

  /**
   * Array with the settings.
   *
   * @var array
   */
  private static $settings = array();

  /**
   * Constructor.
   *
   * @param array $settings
   *   Array with the settings.
   */
  public function __construct(Settings $settings) {
    self::$settings = $settings->get('memcache', array());
  }

  /**
   * Returns a memcache setting.
   *
   * Settings can be set in settings.php in the $settings['memcache'] array and
   * requested by this function. Settings should be used over configuration for
   * read-only, possibly low bootstrap configuration that is environment
   * specific.
   *
   * @param string $name
   *   The name of the setting to return.
   * @param mixed $default
   *   (optional) The default value to use if this setting is not set.
   *
   * @return mixed
   *   The value of the setting, the provided default if not set.
   */
  public static function get($name, $default = NULL) {
    return isset(self::$settings[$name]) ? self::$settings[$name] : $default;
  }

  /**
   * Returns all the settings. This is only used for testing purposes.
   *
   * @return array
   *   All the settings.
   */
  public static function getAll() {
    return self::$settings;
  }
}