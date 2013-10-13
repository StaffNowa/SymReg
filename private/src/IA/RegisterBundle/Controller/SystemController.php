<?php
/**
 * Created by JetBrains PhpStorm.
 * User: staff - info@prado.lt
 * Date: 2013-09-15
 * Time: 18:15
 */

namespace IA\RegisterBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpKernel\Kernel;

/**
 * System controller.
 *
 * @Route("/system")
 */
class SystemController extends Controller
{

    /**
     * Clears current environment cache
     *
     * @Route("/cc", name="system")
     * @Method("GET")
     * @Template()
     */
    public function ccAction()
    {
        $cacheDir = $this->get('kernel')->getCacheDir();
//        debugvar('Cache dir: ' . $cacheDir);
        if (file_exists($cacheDir)) {
            $this->removeCacheDirectory($cacheDir);
        }
        return array();
    }

    private function removeCacheDirectory($dir)
    {
        echo 'Deleting: ' . $dir . '...<br />';
        $files = scandir($dir);
        array_shift($files);
        array_shift($files);

        foreach ($files as $file)
        {
            $file = $dir . '/' . $file;
            if (is_dir($file))
            {
                $this->removeCacheDirectory($file);
                @rmdir($file);
            }
            else
            {
                @unlink($file);
            }
        }
        @rmdir($dir);
    }

}
