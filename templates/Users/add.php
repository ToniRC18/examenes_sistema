<?php
$this->assign('title', 'Nuevo usuario');
?>

<div class="users form">
    <div style="display:flex;align-items:center;justify-content:space-between;gap:1rem;margin-bottom:1.5rem;">
        <h2 style="margin:0;">Crear usuario</h2>
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
                    'required' => true,
                    'autocomplete' => 'new-password',
                    'help' => 'Al menos 8 caracteres.',
                ]) ?>
            </div>
            <div>
                <?= $this->Form->control('role', [
                    'label' => 'Rol',
                    'type' => 'select',
                    'options' => $roles,
                    'empty' => 'Selecciona un rol',
                    'required' => true,
                ]) ?>
            </div>
            <div>
                <?= $this->Form->control('active', [
                    'label' => 'Usuario activo',
                    'type' => 'checkbox',
                    'default' => true,
                ]) ?>
            </div>
        </div>

        <div style="margin-top:2rem;display:flex;gap:.75rem;">
            <?= $this->Form->button('Guardar usuario', ['class' => 'button', 'style' => 'background:#2563eb;color:#fff;']) ?>
            <?= $this->Html->link('Cancelar', ['action' => 'index'], ['class' => 'button', 'style' => 'background:#e5e7eb;color:#111827;']) ?>
        </div>
    <?= $this->Form->end() ?>
</div>
