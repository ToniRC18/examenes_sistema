<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $usuario
 */
?>

<div class="users view content">
    <h3>Detalle de Usuario</h3>
    <table class="table">
        <tr>
            <th>ID</th>
            <td><?= $this->Number->format($usuario->id) ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?= h($usuario->email) ?></td>
        </tr>
        <tr>
            <th>Rol</th>
            <td><?= $usuario->role === 'administrador' ? 'Administrador' : 'Usuario Base' ?></td>
        </tr>
        <tr>
            <th>Estado</th>
            <td><?= $usuario->active ? 'Activo' : 'Inactivo' ?></td>
        </tr>
        <tr>
            <th>Creado</th>
            <td><?= $usuario->created ? h($usuario->created->format('d/m/Y H:i')) : '' ?></td>
        </tr>
        <tr>
            <th>Modificado</th>
            <td><?= $usuario->modified ? h($usuario->modified->format('d/m/Y H:i')) : '' ?></td>
        </tr>
    </table>

    <div class="related">
        <h4>Reactivos Asociados</h4>
        <?php if (!empty($usuario->reactivos)): ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Pregunta</th>
                        <th>Área</th>
                        <th>Subespecialidad</th>
                        <th>Dificultad</th>
                        <th>Creado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuario->reactivos as $reactivo): ?>
                        <tr>
                            <td><?= h($reactivo->pregunta) ?></td>
                            <td><?= h($reactivo->area_especialidad) ?></td>
                            <td><?= h($reactivo->subespecialidad) ?></td>
                            <td><?= $reactivo->dificultad ?></td>
                            <td><?= $reactivo->created ? h($reactivo->created->format('d/m/Y H:i')) : '' ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Este usuario aún no tiene reactivos.</p>
        <?php endif; ?>
    </div>

    <div class="actions" style="margin-top:1.5rem;display:flex;gap:.75rem;">
        <?= $this->Html->link('Editar', ['action' => 'edit', $usuario->id], ['class' => 'button button-primary']) ?>
        <?= $this->Html->link('Volver', ['action' => 'index'], ['class' => 'button button-outline']) ?>
    </div>
</div>
