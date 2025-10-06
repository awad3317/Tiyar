<?php

namespace Database\Seeders;

use App\Models\Developer;
use App\Models\Service;
use App\Models\Management;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->truncate();

        DB::table('users')->insert([
            [
                'name' => 'mohammad',
                'email' => 'mohammad@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('123'),
            ],
            [
                'name' => 'awad',
                'email' => 'awad@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('123'),
                
            ],

        ]);
        $developers = [
            [
                'name'       => 'محمد جعفر السعدي',
                'phone'      => '779522898',
                'notes'      => 'مبرمج Laravel متخصص في تطوير الأنظمة',
                'position'   => 'fullstack',
                'evaluation' => '5',
                'skills'     => 'Laravel, PHP, MySQL',
                'email'      => 'mohammad@example.com',
            ],
            [
                'name'       => 'عوض عبدالله الشرم',
                'phone'      => '0550002222',
                'notes'      => 'مبرمج Laravel متخصص في تطوير الأنظمة',
                'position'   => 'fullstack',
                'evaluation' => '5',
                'skills'     => 'Laravel, PHP, MySQL',
                'email'      => 'awad@example.com',
            ],
        ];
        Developer::insert($developers);

        $services = [
         
            [
                'name'         => 'تطوير وعمل المواقع الاكترونية',
                'description'  => 'تطوير المواقع الاكترونية مع أفضل التقنيات.',
                'icon_service' => 'web_dev_1.svg',
            ],
               [
                'name'         => 'تطوير وعمل تطبيقات الهواتف الذكية',
                'description'  => 'تطوير تطبيقات الهواتف الذكية مع أفضل التقنيات.',
                'icon_service' => 'mobile_dev_1.svg',
            ],
          
            [
                'name'         => 'تقديم الاستشاره التقنية',
                'description'  => 'احصل على استشارات تقنية متخصصة من أفضل المطورين.',
                'icon_service' => 'ideas_1.svg',
            ],
            [
                'name'         => 'تصاميم ui ux والجرافيك',
                'description'  => 'أفضل التصاميم ui ux والجرافيك متاحة للعرض.',
                'icon_service' => 'desgin.svg',
            ],
         
            [
                'name'         => 'ادارة الاستضافات والخوادم',
                'description'  => 'ادارة الاستضافات والخوادم مع أفضل التقنيات.',
                'icon_service' => 'servers_1.svg',
            ],
            
            
            
        
        ];

        Service::insert($services);

         $managements = [
            [
                'name'     => 'محمد جعفر السعدي',
                'email'    => 'mohammad@example.com',
                'phone'    => '779522898',
                'position' => 'admin',
                'skills'   => 'إدارة السيرفرات، Laravel، MySQL',
                'notes'    => 'مسؤول عن الإشراف العام',
                'role'     => 'admin',
                'password' => 'password123', 
                'ssh'      => 'ssh-rsa AAAAB3Nza...mohammad',
            ],
            [
                'name'     => 'عوض عبدالله الشرم',
                'email'    => 'awad@example.com',
                'phone'    => '0550002222',
                'position' => 'admin',
                'skills'   => ' إدارة السيرفرات، Laravel، MySQL',
                'notes'    => 'يتابع تقدم المشاريع والمهام',
                'role'     => 'admin',
                'password' => 'password123',
                'ssh'      => 'ssh-rsa AAAAB3Nza...awad',
            ],
        ];
        Management::insert($managements);
    }
}