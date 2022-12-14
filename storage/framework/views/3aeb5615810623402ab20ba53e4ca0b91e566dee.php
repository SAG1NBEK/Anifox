<?php $__env->startSection('title', 'Anime Admin'); ?>

<?php $__env->startSection('content'); ?>
    <a href="<?php echo e(route('anime.create')); ?>" class="btn btn-success mb-3">Add new anime</a>

    <form method="get" action="<?php echo e(route('searchAnime')); ?>" class="form-inline my-2 my-lg-0 d-flex">
        <input name="query" id="query" value="<?php echo e(request()->input('query')); ?>" class="form-control mr-sm-2 w-50" type="search" placeholder="Наруто" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>

    <h4 class="mt-3 mb-4">
        Результат поиска: "
        <?php if(is_null( Request::input('query'))): ?>

        <?php else: ?>
            <?php echo e(Request::input('query')); ?>

        <?php endif; ?>
        ", найдена: <?php echo e($animes->count()); ?>

    </h4>

    <table class="table table-striped mt-3">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">Title</th>
            <th scope="col">Categories</th>
            <th scope="col">Types</th>
            <th scope="col">Year</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $animes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $anime): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <th scope="row"><?php echo e($anime->id); ?></th>
                <th><img src="<?php echo e(asset($anime->image)); ?>" height="100px"></th>
                <td><?php echo e($anime->title); ?></td>
                <td>
                    <?php $__currentLoopData = $anime->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('category.show', $category->id)); ?>"><?php echo e($category->title); ?></a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </td>
                <td>
                    <?php $__currentLoopData = $anime->types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('type.show', $type->id)); ?>"><?php echo e($type->title); ?></a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </td>
                <td>
                    <?php $__currentLoopData = $anime->dates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('date.show', $date->id)); ?>"><?php echo e($date->date); ?></a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </td>
                <td style="text-align: right; display: flex">
                    <a href="<?php echo e(route('anime.show', $anime)); ?>" class="btn btn-success"><i class="fas fa-eye"></i></a>
                    <a href="<?php echo e(route('anime.edit', $anime)); ?>" class="btn btn-primary"><i class="fas fa-pen"></i></a>
                    <form action="<?php echo e(route('anime.destroy', $anime)); ?>" type="submit" style="display: contents" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php echo e($animes->links("pagination::bootstrap-4")); ?>

        </tbody>
    </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/saginbek/Рабочий стол/Git HUB/anifox/resources/views/admin/anime/search.blade.php ENDPATH**/ ?>