<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'prestashop.bundle.grid.controller_response_builder' shared service.

return $this->services['prestashop.bundle.grid.controller_response_builder'] = new \PrestaShopBundle\Service\Grid\ControllerResponseBuilder(${($_ = isset($this->services['prestashop.core.grid.filter.form_factory']) ? $this->services['prestashop.core.grid.filter.form_factory'] : $this->load('getPrestashop_Core_Grid_Filter_FormFactoryService.php')) && false ?: '_'}, ${($_ = isset($this->services['prestashop.router']) ? $this->services['prestashop.router'] : $this->load('getPrestashop_RouterService.php')) && false ?: '_'});
