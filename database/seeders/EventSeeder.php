<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = [
            [
                'events_title' => 'Tech Conference 2025',
                'events_description' => 'A gathering of tech enthusiasts to discuss the future of technology.',
                'events_image' => 'tech_conference.jpg',
                'events_date' => '2025-03-15',
                'events_tag' => 'Technology',
            ],
            [
                'events_title' => 'Digital Marketing Summit',
                'events_description' => 'Learn the latest trends in digital marketing from industry experts.',
                'events_image' => 'digital_marketing.jpg',
                'events_date' => '2025-04-10',
                'events_tag' => 'Marketing',
            ],
            [
                'events_title' => 'Startup Expo 2025',
                'events_description' => 'Showcase your startup and connect with investors.',
                'events_image' => 'startup_expo.jpg',
                'events_date' => '2025-06-20',
                'events_tag' => 'Business',
            ],
            [
                'events_title' => 'AI & Machine Learning Workshop',
                'events_description' => 'Hands-on workshop on AI and ML for beginners and experts.',
                'events_image' => 'ai_ml_workshop.jpg',
                'events_date' => '2025-07-05',
                'events_tag' => 'Artificial Intelligence',
            ],
            [
                'events_title' => 'Cyber Security Conference',
                'events_description' => 'Discussion on the latest cyber threats and security solutions.',
                'events_image' => 'cyber_security.jpg',
                'events_date' => '2025-09-12',
                'events_tag' => 'Cyber Security',
            ],
        ];

        DB::table('events')->insert($events);
    }
}
