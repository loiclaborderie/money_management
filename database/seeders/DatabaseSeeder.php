<?php

namespace Database\Seeders;

use App\Models\Budget;
use App\Models\Category;
use App\Models\Goal;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = User::factory()->createMany(5);
        foreach ($users as $user) {
            $categories = Category::factory()->count(3)->for($user)->create();
            foreach ($categories as $category) {
                $budgets = Budget::factory()->count(2)->for($category)->create();
                foreach ($budgets as $budget) {
                    Transaction::factory()->count(7)->for($budget)->create();
                }
            }
            $goals = Goal::factory()->count(2)->for($user)->create();
            if(rand(1, 3) === 3){
                $userSubset = $users->where('id', '!=', $user->id)->random(rand(2, 4));
                foreach ($goals as $goal) {
                    foreach ($userSubset as $user) {
                        DB::table('shared_goals')->insert([
                            'user_id' => $user->id,
                            'goal_id' => $goal->id,
                        ]);
                    }
                }
            }
        }
    }
}
