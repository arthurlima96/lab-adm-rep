<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_adm = new Role();
        $role_adm->nome = 'administrador';
        $role_adm->descricao = 'Usuario do tipo administrador';
        $role_adm->save();

        $role_aluno = new Role();
        $role_aluno->nome = 'aluno';
        $role_aluno->descricao = 'Usuario do tipo aluno';
        $role_aluno->save();

        $role_professor = new Role();
        $role_professor->nome = 'professor';
        $role_professor->descricao = 'Usuario do tipo professor';
        $role_professor->save();
    }
}
