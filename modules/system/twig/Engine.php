<?php

namespace System\Twig;

use Illuminate\Contracts\View\Engine as EngineInterface;
use System\Twig\Loader as TwigLoader;
use Twig\Environment as TwigEnvironment;

/**
 * View engine used by the system, used for converting .htm files to twig.
 *
 * @author Alexey Bobkov, Samuel Georges
 */
class Engine implements EngineInterface
{
    /**
     * @var TwigEnvironment
     */
    protected $environment;

    /**
     * Constructor
     */
    public function __construct(TwigEnvironment $environment)
    {
        $this->environment = $environment;
    }

    public function get($path, array $vars = [])
    {
        $previousAllow = TwigLoader::$allowInclude;

        TwigLoader::$allowInclude = true;

        $template = $this->environment->load($path);

        TwigLoader::$allowInclude = $previousAllow;

        return $template->render($vars);
    }
}
