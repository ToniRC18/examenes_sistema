<?php
$areaOptions = [];
foreach ($areas as $areaNombre) {
    $areaOptions[$areaNombre] = $areaNombre;
}

$subespecialidadOptions = [];
foreach ($subespecialidades as $sub) {
    $subespecialidadOptions[$sub] = $sub;
}

$especialidadesJson = json_encode($especialidadesMap, JSON_UNESCAPED_UNICODE);

$this->Html->scriptBlock(<<<JS
document.addEventListener('DOMContentLoaded', () => {
    const areaSelect = document.querySelector('select[name="area_especialidad"]');
    const subSelect = document.querySelector('select[name="subespecialidad"]');
    if (!areaSelect || !subSelect) {
        return;
    }

    const data = {$especialidadesJson};

    const refreshOptions = (area) => {
        const options = data[area] || [];
        subSelect.innerHTML = '';

        const placeholder = document.createElement('option');
        placeholder.value = '';
        placeholder.textContent = 'Selecciona una subespecialidad';
        subSelect.appendChild(placeholder);

        options.forEach(option => {
            const opt = document.createElement('option');
            opt.value = option;
            opt.textContent = option;
            subSelect.appendChild(opt);
        });

        if (!options.includes(subSelect.dataset.current)) {
            subSelect.value = '';
        } else if (subSelect.dataset.current) {
            subSelect.value = subSelect.dataset.current;
        }
    };

    areaSelect.addEventListener('change', (event) => {
        refreshOptions(event.target.value);
    });

    refreshOptions(areaSelect.value);

    subSelect.addEventListener('change', (event) => {
        subSelect.dataset.current = event.target.value;
    });
});
JS, ['block' => 'script']);
?>

<div class="reactivo-form" style="display:grid;gap:1.5rem;">
    <?= $this->Form->control('pregunta', [
        'label' => 'Pregunta',
        'type' => 'textarea',
        'rows' => 4,
        'required' => true,
    ]) ?>

    <div style="display:grid;gap:1rem;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));">
        <?= $this->Form->control('respuesta_a', ['label' => 'Respuesta A', 'required' => true]) ?>
        <?= $this->Form->control('respuesta_b', ['label' => 'Respuesta B', 'required' => true]) ?>
        <?= $this->Form->control('respuesta_c', ['label' => 'Respuesta C', 'required' => true]) ?>
    </div>

    <?= $this->Form->control('respuesta_correcta', [
        'label' => 'Respuesta correcta',
        'type' => 'select',
        'options' => ['A' => 'A', 'B' => 'B', 'C' => 'C'],
        'empty' => 'Selecciona la opción correcta',
        'required' => true,
    ]) ?>

    <?= $this->Form->control('retroalimentacion', [
        'label' => 'Retroalimentación',
        'type' => 'textarea',
        'rows' => 3,
    ]) ?>

    <div style="display:grid;gap:1rem;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));">
        <?= $this->Form->control('dificultad', [
            'label' => 'Dificultad',
            'type' => 'number',
            'min' => 1,
            'max' => 5,
            'required' => true,
        ]) ?>

        <?= $this->Form->control('area_especialidad', [
            'label' => 'Área de especialidad',
            'type' => 'select',
            'options' => $areaOptions,
            'empty' => 'Selecciona un área',
            'value' => $area,
            'required' => true,
        ]) ?>

        <?= $this->Form->control('subespecialidad', [
            'label' => 'Subespecialidad',
            'type' => 'select',
            'options' => $subespecialidadOptions,
            'empty' => 'Selecciona una subespecialidad',
            'data-current' => $reactivo->subespecialidad ?? '',
            'required' => true,
        ]) ?>
    </div>
</div>
