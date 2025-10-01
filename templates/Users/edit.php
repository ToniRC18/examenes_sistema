<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $usuario
 */
?>

<div class="users form">
    <div style="display:flex;align-items:center;justify-content:space-between;gap:1rem;margin-bottom:1.5rem;">
        <h2 style="margin:0;">Editar usuario</h2>
        <?= $this->Html->link('Volver al listado', ['action' => 'index'], ['class' => 'button']) ?>
    </div>

    <?= $this->Form->create($usuario) ?>
        <div class="grid" style="display:grid;gap:1.5rem;grid-template-columns:repeat(auto-fit,minmax(260px,1fr));">
            <div>
                <?= $this->Form->control('email', [
                    'label' => 'Correo electrónico',
                    'required' => true,
                    'autocomplete' => 'email',
                ]) ?>
            </div>
            <div>
                <?= $this->Form->control('password', [
                    'label' => 'Contraseña',
                    'autocomplete' => 'new-password',
                    'help' => 'Deja en blanco para mantener la actual.',
                ]) ?>
            </div>
            <div>
                <?= $this->Form->control('role', [
                    'label' => 'Rol',
                    'type' => 'select',
                    'options' => ['administrador' => 'Administrador', 'usuariobase' => 'Usuario base'],
                    'empty' => 'Selecciona un rol',
                    'required' => true,
                ]) ?>
            </div>
            <div>
                <?= $this->Form->control('active', [
                    'label' => 'Usuario activo',
                    'type' => 'checkbox',
                ]) ?>
            </div>
        </div>

        <div style="margin-top:2rem;display:flex;gap:.75rem;">
            <?= $this->Form->button('Actualizar usuario', ['class' => 'button button-primary']) ?>
            <?= $this->Html->link('Cancelar', ['action' => 'index'], ['class' => 'button button-outline']) ?>
        </div>
    <?= $this->Form->end() ?>
</div>
