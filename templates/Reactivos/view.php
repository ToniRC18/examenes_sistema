<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reactivo $reactivo
 */
?>

<div class="reactivos view content">
    <h3>Detalle del Reactivo</h3>
    <table class="table">
        <tr>
            <th>ID</th>
            <td><?= $this->Number->format($reactivo->id) ?></td>
        </tr>
        <tr>
            <th>Pregunta</th>
            <td><?= nl2br(h($reactivo->pregunta)) ?></td>
        </tr>
        <tr>
            <th>Respuesta A</th>
            <td><?= h($reactivo->respuesta_a) ?></td>
        </tr>
        <tr>
            <th>Respuesta B</th>
            <td><?= h($reactivo->respuesta_b) ?></td>
        </tr>
        <tr>
            <th>Respuesta C</th>
            <td><?= h($reactivo->respuesta_c) ?></td>
        </tr>
        <tr>
            <th>Respuesta Correcta</th>
            <td><?= h($reactivo->respuesta_correcta) ?></td>
        </tr>
        <tr>
            <th>Retroalimentación</th>
            <td><?= nl2br(h($reactivo->retroalimentacion ?? '')) ?></td>
        </tr>
        <tr>
            <th>Dificultad</th>
            <td><?= $this->Number->format($reactivo->dificultad) ?></td>
        </tr>
        <tr>
            <th>Área</th>
            <td><?= h($reactivo->area_especialidad) ?></td>
        </tr>
        <tr>
            <th>Subespecialidad</th>
            <td><?= h($reactivo->subespecialidad) ?></td>
        </tr>
        <tr>
            <th>Autor</th>
            <td><?= h($reactivo->user->email ?? 'N/A') ?></td>
        </tr>
        <tr>
            <th>Creado</th>
            <td><?= $reactivo->created ? h($reactivo->created->format('d/m/Y H:i')) : '' ?></td>
        </tr>
        <tr>
            <th>Modificado</th>
            <td><?= $reactivo->modified ? h($reactivo->modified->format('d/m/Y H:i')) : '' ?></td>
        </tr>
    </table>

    <div class="actions" style="margin-top:1.5rem;display:flex;gap:.75rem;">
        <?= $this->Html->link('Editar', ['action' => 'edit', $reactivo->id], ['class' => 'button button-primary']) ?>
        <?= $this->Html->link('Volver', ['action' => 'index'], ['class' => 'button button-outline']) ?>
    </div>
</div>
