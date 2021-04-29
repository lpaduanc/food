<?php

namespace App\Observers;

use App\Models\Plano;
use Illuminate\Support\Str;

class PlanoObserver
{
    /**
     * Handle the Plano "creating" event.
     *
     * @param  \App\Models\Models\Plano  $plano
     * @return void
     */
    public function creating(Plano $plano)
    {
        $plano->url = Str::slug($plano->nome);
        // $plano->url = Str::kebab($plano->nome);
    }

    /**
     * Handle the Plano "updating" event.
     *
     * @param  \App\Models\Models\Plano  $plano
     * @return void
     */
    public function updating(Plano $plano)
    {
        $plano->url = Str::slug($plano->nome); // retira a acentuação
        // $plano->url = Str::kebab());
    }

    /**
     * Handle the Plano "deleted" event.
     *
     * @param  \App\Models\Models\Plano  $plano
     * @return void
     */
    public function deleted(Plano $plano)
    {
        //
    }

    /**
     * Handle the Plano "restored" event.
     *
     * @param  \App\Models\Models\Plano  $plano
     * @return void
     */
    public function restored(Plano $plano)
    {
        //
    }

    /**
     * Handle the Plano "force deleted" event.
     *
     * @param  \App\Models\Models\Plano  $plano
     * @return void
     */
    public function forceDeleted(Plano $plano)
    {
        //
    }
}
