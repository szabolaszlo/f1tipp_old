<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2017. 03. 18.
 * Time: 10:33
 */

namespace Controller\Page\Admin;

use Controller\Controller;
use System\Registry\IRegistry;

/**
 * Class ClearCache
 * @package Controller\Page\Admin
 */
class ClearCache extends Controller
{
    /**
     * @var string
     */
    protected $cacheDir = '';

    protected $acceptedCacheDirs = array(
        'doctrine',
        'app',
        'twig'
    );

    /**
     * ClearCache constructor.
     * @param IRegistry $registry
     */
    public function __construct(IRegistry $registry)
    {
        parent::__construct($registry);

        $this->cacheDir = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'cache' . DIRECTORY_SEPARATOR;
    }

    /**
     * @return string
     */
    public function indexAction()
    {
        if (!$this->registry->getUserAuth()->isAdmin()) {
            $this->data['error'] = $this->registry->getLanguage()->get('admin_no_permisson_or_data_error');
            return $this->render();
        }

        $this->data['success'] = $this->session->get('success');
        $this->session->remove('success');

        return $this->render();
    }

    /**
     * @return string
     */
    public function clearAction()
    {
        $dir = $this->request->getQuery('dir');

        if (in_array($dir, $this->acceptedCacheDirs) && $this->registry->getUserAuth()->isAdmin()) {
            $this->rrmdir($this->cacheDir . $dir);
            $this->redirectSuccess();
        }

        $this->data['error'] = $this->registry->getLanguage()->get('admin_no_permisson_or_data_error');
        return $this->render();
    }

    protected function redirectSuccess()
    {
        $this->session->set('success', $this->registry->getLanguage()->get('admin_cache_clear_success'));
        $this->registry->getServer()->redirect('page=admin/clear_cache/index');
    }

    /**
     * @param $dir
     */
    protected function rrmdir($dir)
    {
        if (is_dir($dir)) {
            $objects = scandir($dir);
            foreach ($objects as $object) {
                if ($object != "." && $object != "..") {
                    if (is_dir($dir . "/" . $object)) {
                        $this->rrmdir($dir . "/" . $object);
                    } else {
                        unlink($dir . "/" . $object);
                    }
                }
            }
            rmdir($dir);
        }
    }
}
