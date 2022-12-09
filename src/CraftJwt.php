<?php
/**
 * Craft JWT plugin for Craft CMS 3.x
 *
 * Generate a JWT
 *
 * @link      builtbymasonry.com
 * @copyright Copyright (c) 2022 Masonry
 */

namespace masonry\craftjwt;

use masonry\craftjwt\variables\CraftJwtVariable;

use Craft;
use craft\base\Plugin;
use craft\services\Plugins;
use craft\events\PluginEvent;
use craft\web\twig\variables\CraftVariable;

use yii\base\Event;

/**
 * Class CraftJwt
 *
 * @author    Masonry
 * @package   CraftJwt
 * @since     0.0.1
 *
 */
class CraftJwt extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * @var CraftJwt
     */
    public static $plugin;

    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public string $schemaVersion = '0.0.1';

    /**
     * @var bool
     */
    public bool $hasCpSettings = false;

    /**
     * @var bool
     */
    public bool $hasCpSection = false;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;

        Event::on(
            CraftVariable::class,
            CraftVariable::EVENT_INIT,
            function (Event $event) {
                /** @var CraftVariable $variable */
                $variable = $event->sender;
                $variable->set('craftJwt', CraftJwtVariable::class);
            }
        );

        Event::on(
            Plugins::class,
            Plugins::EVENT_AFTER_INSTALL_PLUGIN,
            function (PluginEvent $event) {
                if ($event->plugin === $this) {
                }
            }
        );

        Craft::info(
            Craft::t(
                'craft-jwt',
                '{name} plugin loaded',
                ['name' => $this->name]
            ),
            __METHOD__
        );
    }

    // Protected Methods
    // =========================================================================

}
