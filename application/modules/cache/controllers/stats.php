<?php
/**
 * Build list of routers
 *
 * @author   Anton Shevchuk
 * @created  12.06.12 12:27
 */
namespace Application;
use Bluz;

return
/**
 * @privilege Management
 * @return \closure
 */
function () use ($view) {
    /* @var \Bluz\Application $this */
    $this->getLayout()->breadCrumbs([
        $view->ahref('Cache', ['cache', 'index']),
        'Statistics',
    ]);

    if ($handler = $this->getCache()->handler()) {
        $view->servers = $this->getCache()->getStats();
    } else {
        $this->getMessages()->addNotice("Cache is disabled");
        $this->redirectTo('cache', 'index');
    }

};