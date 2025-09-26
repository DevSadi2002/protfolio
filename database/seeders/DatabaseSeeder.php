<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),

        ]);
        // create projects
        \App\Models\Project::insert([
            [
                'name' => 'Portfolio Website',
                'project_skills' => json_encode(['Laravel', 'TailwindCSS', 'MySQL']),
                'image' => 'projects/portfolio.png',
                'description' => 'Personal portfolio showcasing projects and a blog.',
                'githup' => 'https://github.com/example/portfolio',
                'links' => 'https://example.com'
            ],
            [
                'name' => 'Task Manager API',
                'project_skills' => json_encode(['Laravel', 'Sanctum', 'Postman', 'Redis']),
                'image' => 'projects/task-api.png',
                'description' => 'RESTful API for task management with token auth and caching.',
                'githup' => 'https://github.com/example/task-api',
                'links' => null
            ],
            [
                'name' => 'Realtime Chat',
                'project_skills' => json_encode(['Laravel', 'Echo', 'Pusher', 'Vue.js']),
                'image' => 'projects/chat.png',
                'description' => 'Realtime chat application with presence and typing indicators.',
                'githup' => 'https://github.com/example/chat-app',
                'links' => 'https://chat.example.com'
            ],
        ]);
    }
}
