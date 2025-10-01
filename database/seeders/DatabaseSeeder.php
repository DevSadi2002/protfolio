<?php

namespace Database\Seeders;

use App\Models\Setting;
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
            'description' => json_encode([
                'en' => 'Personal portfolio showcasing projects and a blog.',
                'ar' => 'محفظة شخصية تعرض المشاريع والمدونة.'
            ]),
            'githup' => 'https://github.com/example/portfolio',
            'links' => 'https://example.com',
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name' => 'Task Manager API',
            'project_skills' => json_encode(['Laravel', 'Sanctum', 'Postman', 'Redis']),
            'image' => 'projects/task-api.png',
            'description' => json_encode([
                'en' => 'RESTful API for task management with token auth and caching.',
                'ar' => 'واجهة برمجة تطبيقات RESTful لإدارة المهام مع مصادقة الرمز والتخزين المؤقت.'
            ]),
            'githup' => 'https://github.com/example/task-api',
            'links' => null,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name' => 'Realtime Chat',
            'project_skills' => json_encode(['Laravel', 'Echo', 'Pusher', 'Vue.js']),
            'image' => 'projects/chat.png',
            'description' => json_encode([
                'en' => 'Realtime chat application with presence and typing indicators.',
                'ar' => 'تطبيق دردشة في الوقت الفعلي مع مؤشرات الحضور والكتابة.'
            ]),
            'githup' => 'https://github.com/example/chat-app',
            'links' => 'https://chat.example.com',
            'created_at' => now(),
            'updated_at' => now(),
            ],
        ]);

        Setting::create(attributes: [
            'description' => [
                'en' => 'Welcome to my portfolio website! I am a passionate developer specializing in web applications. Explore my projects and blog to learn more about my work and skills.',
                'ar' => 'مرحبًا بكم في موقع محفظتي! أنا مطور شغوف متخصص في تطبيقات الويب. استكشف مشاريعي ومدونتي لمعرفة المزيد عن عملي ومهاراتي.'
            ],
            'email' => 'info@example.com',
            'instgram' => 'https://instagram.com/example',
            'linkedin' => 'https://linkedin.com/in/example',
            'githup' => 'https://github.com/example',
            'whatsapp' => 'https://wa.me/1234567890',
            'telegram' => 'https://t.me/example',

            'copyright_holder' => 'Dev.Sadi',
            'copyright_start' => 2020,
            'copyright_end' => 2025
        ]);
    }
}
