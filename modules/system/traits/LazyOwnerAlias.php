<?php

namespace System\Traits;

/**
 * Lazy Owner Alias
 * Adds support for statically binding owner aliases
 *
 * @author Jack Wilkinson
 */
trait LazyOwnerAlias
{
    /**
     * @var array List of aliases
     */
    protected static $lazyAliases = [];

    /**
     * Binds the alias of an owner to the lazy alias list. This allows us to bind aliases
     * prior to init() which is necessary to do before to `PluginManager` being registered.
     *
     * @return void
     */
    public static function lazyRegisterOwnerAlias(string $owner, string $alias)
    {
        static::$lazyAliases[$alias] = $owner;
    }
}
