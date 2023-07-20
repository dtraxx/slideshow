<?php $__env->startSection('content'); ?>
    <?php if(session('success')): ?>
        <div class="bg-green-500 p-3 m-2">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>
    <?php if($errors->any()): ?>
        <div class="bg-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
    <?php if($photos->isNotEmpty()): ?>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Afbeelding
                    </th>
                    <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'admin')): ?>
                    <th scope="col" class="px-6 py-3">
                        user
                    </th>
                    <?php endif; ?>
                    <th scope="col" class="px-6 py-3">
                        Bestandsnaam
                    </th>
                    <th scope="col" class="px-6 py-3">
                        uploaded
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Verwijderen
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a href="<?php echo e(asset($photo->path)); ?>">
                                <img class="h-20" src="<?php echo e(asset($photo->path)); ?>" alt="<?php echo e($photo->filename); ?>">
                            </a>
                        </th>
                        <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'admin')): ?>
                        <td class="px-6 py-4">
                            <?php
                                $user = \App\Models\User::find($photo->user_id);
                            ?>
                            <?php echo e($user->name); ?>

                        </td>
                        <?php endif; ?>
                        <td class="px-6 py-4">
                            <?php echo e($photo->filename); ?>

                        </td>
                        <td class="px-6 py-4">
                            <?php echo e($photo->created_at->diffForHumans()); ?>

                        </td>
                        <td class="px-6 py-4">
                            <form action="<?php echo e(route('photo.delete', ['id' => $photo->id])); ?>" method="POST" id="delete-form">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <p class="p-16">Nog geen foto's weer te geven!</p>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/upload-index.blade.php ENDPATH**/ ?>