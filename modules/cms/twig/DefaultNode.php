<?php

namespace Cms\Twig;

use Twig\Compiler as TwigCompiler;
use Twig\Node\Node as TwigNode;

/**
 * Represents a "default" node
 *
 * @author Alexey Bobkov, Samuel Georges
 */
class DefaultNode extends TwigNode
{
    public function __construct($lineno, $tag = 'default')
    {
        parent::__construct([], [], $lineno, $tag);
    }

    /**
     * Compiles the node to PHP.
     *
     * @param  TwigCompiler  $compiler  A TwigCompiler instance
     */
    public function compile(TwigCompiler $compiler)
    {
        $compiler
            ->addDebugInfo($this)
            ->write("echo '<!-- X_WINTER_DEFAULT_BLOCK_CONTENT -->';\n");
    }
}
