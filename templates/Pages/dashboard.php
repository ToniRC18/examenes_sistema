<?php
/**
 * @var \App\View\AppView $this
 * @var \Authentication\IdentityInterface $user
 */
?>
<div class="dashboard">
    <?php if ($user->role === 'administrador'): ?>
        <h2>Panel de Administración</h2>
        <div class="row">
            <div class="column">
                <div class="dashboard-card">
                    <h3>Total de Usuarios</h3>
                    <p><?= $totalUsers ?? 0 ?></p>
                </div>
            </div>
            <div class="column">
                <div class="dashboard-card">
                    <h3>Total de Reactivos</h3>
                    <p><?= $totalReactivos ?? 0 ?></p>
                </div>
            </div>
        </div>

        <div class="dashboard-card">
            <h3>Reactivos por Especialidad</h3>
            <?php if (!empty($reactivosPorEspecialidad)): ?>
                <table>
                    <thead>
                        <tr>
                            <th>Área</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($reactivosPorEspecialidad as $especialidad): ?>
                            <tr>
                                <td><?= h($especialidad->area_especialidad) ?></td>
                                <td><?= $especialidad->count ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No hay reactivos registrados aún.</p>
            <?php endif; ?>
        </div>

        <div class="dashboard-card">
            <h3>Acciones rápidas</h3>
            <?= $this->Html->link('Gestionar Usuarios', ['controller' => 'Users', 'action' => 'index'], ['class' => 'button']) ?>
            <?= $this->Html->link('Ver Reactivos', ['controller' => 'Reactivos', 'action' => 'index'], ['class' => 'button button-outline']) ?>
        </div>
    <?php else: ?>
        <div class="user-dashboard">
            <h2>Panel de Usuario</h2>
            
            <div class="row">
                <div class="column">
                    <div class="dashboard-card">
                        <h3>Mis Estadísticas</h3>
                        <p><strong>Reactivos Creados:</strong> <?= $misReactivos ?></p>
                    </div>
                </div>
                
                <div class="column">
                    <div class="dashboard-card">
                        <h3>Acciones Disponibles</h3>
                        <?= $this->Html->link('Ver Mis Reactivos', 
                            ['controller' => 'Reactivos', 'action' => 'index'], 
                            ['class' => 'button']
                        ) ?>
                        <br><br>
                        <?= $this->Html->link('Crear Nuevo Reactivo', 
                            ['controller' => 'Reactivos', 'action' => 'add'], 
                            ['class' => 'button button-outline']
                        ) ?>
                    </div>
                </div>
            </div>
            
            <div class="dashboard-card">
                <h3>Información del Sistema</h3>
                <p>Bienvenido al sistema de generación de exámenes médicos. Como usuario base, puedes:</p>
                <ul>
                    <li>Crear reactivos (preguntas de examen)</li>
                    <li>Editar y eliminar tus propios reactivos</li>
                    <li>Ver estadísticas de tu trabajo</li>
                </ul>
            </div>
        </div>
    <?php endif; ?>
</div>

<style>
    .dashboard {
        padding: 1rem 0;
    }
    .row {
        display: flex;
        flex-wrap: wrap;
        margin: -0.5rem;
    }
    .column {
        flex: 1;
        padding: 0.5rem;
        min-width: 300px;
    }
    table {
        width: 100%;
        margin-top: 1rem;
    }
    table th, table td {
        padding: 0.5rem;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    table th {
        background-color: #f8f9fa;
        font-weight: bold;
    }
    .button {
        margin: 0.2rem 0;
        display: inline-block;
    }
</style>
