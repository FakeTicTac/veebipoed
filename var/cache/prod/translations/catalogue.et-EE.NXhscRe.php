<?php

use Symfony\Component\Translation\MessageCatalogue;

$catalogue = new MessageCatalogue('et-EE', array (
));

$catalogueEt = new MessageCatalogue('et', array (
));
$catalogue->addFallbackCatalogue($catalogueEt);

return $catalogue;
