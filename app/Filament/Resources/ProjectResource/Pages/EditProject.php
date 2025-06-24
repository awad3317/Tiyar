<?php

namespace App\Filament\Resources\ProjectResource\Pages;

use App\Filament\Resources\ProjectResource;
use Filament\Resources\Pages\EditRecord;

class EditProject extends EditRecord
{
    protected static string $resource = ProjectResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (isset($data['pdf_file']) && $data['pdf_file']) {
            // إذا تم رفع ملف PDF جديد، نحدث حقل link بمسار الملف
            $data['link'] = 'storage/' . $data['pdf_file'];
        }

        // نحذف الحقل لأنه غير موجود فعلياً في جدول قاعدة البيانات
        unset($data['pdf_file']);

        return $data;
    }
}
