<?php

namespace Backend\Classes;

/**
 * Class SideMenuItem
 */
class SideMenuItem
{
    /**
     * @var string
     */
    public $code;

    /**
     * @var string
     */
    public $owner;

    /**
     * @var string
     */
    public $label;

    /**
     * @var null|string
     */
    public $icon;

    /**
     * @var null|string
     */
    public $iconSvg;

    /**
     * @var string
     */
    public $url;

    /**
     * @var null|int|callable
     */
    public $counter;

    /**
     * @var null|string
     */
    public $counterLabel;

    /**
     * @var null|string
     */
    public $badge;

    /**
     * @var int
     */
    public $order = -1;

    /**
     * @var array
     */
    public $attributes = [];

    /**
     * @var array
     */
    public $permissions = [];

    /**
     * @param  null|string|int  $attribute
     * @param  null|string|array  $value
     */
    public function addAttribute($attribute, $value)
    {
        $this->attributes[$attribute] = $value;
    }

    public function removeAttribute($attribute)
    {
        unset($this->attributes[$attribute]);
    }

    public function addPermission(string $permission, array $definition)
    {
        $this->permissions[$permission] = $definition;
    }

    /**
     * @return void
     */
    public function removePermission(string $permission)
    {
        unset($this->permissions[$permission]);
    }

    /**
     * @return static
     */
    public static function createFromArray(array $data)
    {
        $instance = new static;
        $instance->code = $data['code'];
        $instance->owner = $data['owner'];
        $instance->label = $data['label'];
        $instance->url = $data['url'];
        $instance->icon = $data['icon'] ?? null;
        $instance->iconSvg = $data['iconSvg'] ?? null;
        $instance->counter = $data['counter'] ?? null;
        $instance->counterLabel = $data['counterLabel'] ?? null;
        $instance->attributes = $data['attributes'] ?? $instance->attributes;
        $instance->badge = $data['badge'] ?? null;
        $instance->permissions = $data['permissions'] ?? $instance->permissions;
        $instance->order = (! empty($data['order']) || @$data['order'] === 0) ? (int) $data['order'] : $instance->order;

        return $instance;
    }
}
