<?php

namespace App\Filament\Resources\ProjectResource\Pages;

use App\Filament\Resources\ProjectResource;
use Filament\Resources\Pages\CreateRecord;

class CreateProject extends CreateRecord
{
    protected static string $resource = ProjectResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (isset($data['pdf_file']) && $data['pdf_file']) {
            // نستخدم مسار الملف المرفوع كـ link
            $data['link'] = 'storage/' . $data['pdf_file'];
        }

        // نحذف هذا الحقل لأنه ليس موجودًا في قاعدة البيانات
        unset($data['pdf_file']);

        return $data;
    }
}
