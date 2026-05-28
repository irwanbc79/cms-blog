<div
    <?php echo e($attributes
            ->merge([
                'id' => $getId(),
            ], escape: false)
            ->merge($getExtraAttributes(), escape: false)); ?>

>
    <?php echo e($getChildComponentContainer()); ?>

</div>
<?php /**PATH /Users/irwanbece/cms-blog/vendor/filament/infolists/resources/views/components/grid.blade.php ENDPATH**/ ?>