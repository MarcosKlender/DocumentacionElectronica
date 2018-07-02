<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
    	$Emproservis = DB::table('de01_xml')->select('persona_nombre', 'ruc_cliente_proveedor')->distinct()->get();

        foreach ($Emproservis as $client)
        {
            User::firstOrCreate
            ([
                'name' => $client->persona_nombre,
                'email' => str_random(10),
                'ruc_o_ci' => $client->ruc_cliente_proveedor,
                'password' => bcrypt($client->ruc_cliente_proveedor)
            ]);
        }
    }
}