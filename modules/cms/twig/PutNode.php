<?php

namespace Cms\Twig;

use Twig\Compiler as TwigCompiler;
use Twig\Node\Node as TwigNode;

/**
 * Represents a put node
 *
 * @author Alexey Bobkov, Samuel Georges
 */
class PutNode extends TwigNode
{
    public function __construct(TwigNode $body, $name, $endType, $lineno, $tag = 'put')
    {
        parent::__construct(['body' => $body], ['name' => $name, 'endType' => $endType], $lineno, $tag);
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
            ->write("echo \$this->env->getExtension('Cms\Twig\Extension')->startBlock(")
            ->raw("'".$this->getAttribute('name')."'")
            ->write(");\n");

        $isOverwrite = strtolower($this->getAttribute('endType')) == 'overwrite';

        $compiler->subcompile($this->getNode('body'));

        $compiler
            ->addDebugInfo($this)
            ->write("echo \$this->env->getExtension('Cms\Twig\Extension')->endBlock(")
            ->raw($isOverwrite ? 'false' : 'true')
            ->write(");\n");
    }
}
