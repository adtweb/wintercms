<?php

namespace Cms\Twig;

use Twig\Compiler as TwigCompiler;
use Twig\Node\Node as TwigNode;

/**
 * Represents a partial node
 *
 * @author Alexey Bobkov, Samuel Georges
 */
class PartialNode extends TwigNode
{
    public function __construct(TwigNode $nodes, $paramNames, $lineno, $tag = 'partial')
    {
        parent::__construct(['nodes' => $nodes], ['names' => $paramNames], $lineno, $tag);
    }

    /**
     * Compiles the node to PHP.
     *
     * @param  TwigCompiler  $compiler  A TwigCompiler instance
     */
    public function compile(TwigCompiler $compiler)
    {
        $compiler->addDebugInfo($this);

        $compiler->write("\$context['__cms_partial_params'] = [];\n");

        for ($i = 1; $i < count($this->getNode('nodes')); $i++) {
            $compiler->write("\$context['__cms_partial_params']['".$this->getAttribute('names')[$i - 1]."'] = ");
            $compiler->subcompile($this->getNode('nodes')->getNode($i));
            $compiler->write(";\n");
        }

        $compiler
            ->write("echo \$this->env->getExtension('Cms\Twig\Extension')->partialFunction(")
            ->subcompile($this->getNode('nodes')->getNode(0))
            ->write(", \$context['__cms_partial_params']")
            ->write(', true')
            ->write(");\n");

        $compiler->write("unset(\$context['__cms_partial_params']);\n");
    }
}
