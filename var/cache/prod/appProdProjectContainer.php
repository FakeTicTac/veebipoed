<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerQrm6j4e\appProdProjectContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerQrm6j4e/appProdProjectContainer.php') {
    touch(__DIR__.'/ContainerQrm6j4e.legacy');

    return;
}

if (!\class_exists(appProdProjectContainer::class, false)) {
    \class_alias(\ContainerQrm6j4e\appProdProjectContainer::class, appProdProjectContainer::class, false);
}

return new \ContainerQrm6j4e\appProdProjectContainer([
    'container.build_hash' => 'Qrm6j4e',
    'container.build_id' => '86ddc44c',
    'container.build_time' => 1662917368,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerQrm6j4e');
