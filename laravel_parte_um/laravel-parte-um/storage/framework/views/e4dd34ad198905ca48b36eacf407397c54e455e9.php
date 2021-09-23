<?php $__env->startSection('navbar'); ?>
<nav class="navbar navbar-expand-xl navbar-dark" style="background-color: #246B85">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample06"
        aria-controls="navbarsExample06" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample06">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(url('/')); ?>">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(url('/series')); ?>">Series</a>
            </li>
        </ul>
    </div>
</nav>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('conteudo'); ?>
<section class="cardsection">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Séries</h2>
            <a href="<?php echo e(url ('/series/create')); ?>" class="btn btn-dark mb-4" name="" id="" role="button">Adicionar
                Série</a>
            <ul class="list-group">
                <?php $__currentLoopData = $series; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $serie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="list-group-item">
                    <h6><?php echo e($serie->nome); ?></h6>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('series.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/willian_moreno/Documents/Cursos/CursoLaravelAlura/laravel_parte_um/laravel-parte-um/resources/views/series/index.blade.php ENDPATH**/ ?>