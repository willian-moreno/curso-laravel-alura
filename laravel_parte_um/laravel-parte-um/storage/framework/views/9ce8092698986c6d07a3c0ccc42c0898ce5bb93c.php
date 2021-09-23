<?php $__env->startSection('conteudo'); ?>
    <section class="cardsection">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Adicionar nova série</h2>
                <form method="post">
                    <?php echo csrf_field(); ?> <!-- Obrigatorio. Serve para proteger contra requisicoes externas -->
                    <!-- Campo nome -->
                    <div class="form-group row">
                        <label for="nome" class="col-sm-2 col-form-label">Nome</label>
                        <div class="col-sm-10">
                            <input type="text" name="nome" id="nome" class="form-control"
                                placeholder="Nome da série">
                        </div>
                    </div>
                    <!-- Botoes -->
                    <div class="row col-sm-2 col-sm-2">
                        <input
                        name="salvar"
                        id="salvar"
                        class="btn btn-primary mr-2"
                        type="submit"
                        value="Salvar">
                        <a href="<?php echo e(url ('/series')); ?>" class="btn btn-dark" role="button">Voltar</a>
                    </div>
                </form>
                <?php if(strlen($nome ?? '') > 0 && !empty($nome ?? '')): ?>
                    <div class="mt-4 alert alert-success" role="alert">
                        Série <?php echo e($nome ?? ''); ?> adicionada!
                    </div>
                <?php endif; ?>
            </div>
        </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('series.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/willian_moreno/Documents/Cursos/CursoLaravelAlura/laravel_parte_um/laravel-parte-um/resources/views/series/create.blade.php ENDPATH**/ ?>