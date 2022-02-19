<?php

namespace App\Observers;

use App\Models\Plan;
use Illuminate\Support\Str;

class PlanObserver
{
    /**
     * Handle the Plan "creating" event.
     *
     * @param  \App\Models\Models\Plan  $plan
     * @return void
     */
    public function creating(Plan $plan)
    {
        $plan->url = Str::slug($plan->name);
        // $plano->url = Str::kebab($plano->nome);
    }

    /**
     * Handle the Plan "updating" event.
     *
     * @param  \App\Models\Models\Plan  $plan
     * @return void
     */
    public function updating(Plan $plan)
    {
        $plan->url = Str::slug($plan->name); // retira a acentuação
        // $plano->url = Str::kebab());
    }

    /**
     * Handle the Plan "deleted" event.
     *
     * @param  \App\Models\Models\Plan  $plan
     * @return void
     */
    public function deleted(Plan $plan)
    {
        //
    }

    /**
     * Handle the Plan "restored" event.
     *
     * @param  \App\Models\Models\Plan  $plan
     * @return void
     */
    public function restored(Plan $plan)
    {
        //
    }

    /**
     * Handle the Plan "force deleted" event.
     *
     * @param  \App\Models\Models\Plan  $plan
     * @return void
     */
    public function forceDeleted(Plan $plan)
    {
        //
    }
}
