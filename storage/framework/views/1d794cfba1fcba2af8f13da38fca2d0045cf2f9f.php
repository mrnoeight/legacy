<media-upload
        ref="<?php echo e($mediaCollection->getName()); ?>_uploader"
        :collection="'<?php echo e($mediaCollection->getName()); ?>'"
        :url="'<?php echo e(route('brackets/media::upload')); ?>'"
        <?php if($mediaCollection->getMaxNumberOfFiles()): ?>
        :max-number-of-files="<?php echo e($mediaCollection->getMaxNumberOfFiles()); ?>"
        <?php endif; ?>
        <?php if($mediaCollection->getMaxFileSize()): ?>
        :max-file-size-in-mb="<?php echo e(round(($mediaCollection->getMaxFileSize()/1024/1024), 2)); ?>"
        <?php endif; ?>
        <?php if($mediaCollection->getAcceptedFileTypes()): ?>
        :accepted-file-types="'<?php echo e(implode(',', $mediaCollection->getAcceptedFileTypes())); ?>'"
        <?php endif; ?>
        <?php if(isset($media) && $media->count() > 0): ?>
        :uploaded-images="<?php echo e($media->toJson()); ?>"
        <?php endif; ?>
></media-upload><?php /**PATH C:\xampp2\htdocs\legacy\vendor\brackets\admin-ui\src/../resources/views/admin/includes/avatar-uploader.blade.php ENDPATH**/ ?>