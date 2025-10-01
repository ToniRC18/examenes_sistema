<?php
declare(strict_types=1);

namespace App\Controller;

class PagesController extends AppController
{
    public function dashboard()
    {
        $user = $this->Authentication->getIdentity();

        $reactivosTable = $this->fetchTable('Reactivos');

        if ($user->role === 'administrador') {
            $usersTable = $this->fetchTable('Users');

            $totalUsers = $usersTable->find()->count();
            $totalReactivos = $reactivosTable->find()->count();
            $reactivosPorEspecialidad = $reactivosTable->find()
                ->select([
                    'area_especialidad',
                    'count' => $reactivosTable->find()->func()->count('*'),
                ])
                ->group('area_especialidad')
                ->toArray();

            $this->set(compact('totalUsers', 'totalReactivos', 'reactivosPorEspecialidad'));
        } else {
            $misReactivos = $reactivosTable->find()
                ->where(['user_id' => $user->id])
                ->count();
            $this->set(compact('misReactivos'));
        }

        $this->set(compact('user'));
    }
}
