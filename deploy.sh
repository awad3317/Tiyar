#!/bin/bash

LOCAL_PUBLIC_DIR="/e/Tiyar company/Tiyar/public/"
REMOTE_USER="tiyar"
REMOTE_HOST="195.35.24.73"
REMOTE_PUBLIC_DIR="/home/tiyar/htdocs/Tiyar/public/"

# اختبار: عرض محتوى مجلد public المحلي
echo "📂 محتوى مجلد public المحلي:"
ls "$LOCAL_PUBLIC_DIR"

# تنفيذ النقل
echo "🚀 جاري رفع الملفات..."
rsync -avz --delete --progress "$LOCAL_PUBLIC_DIR" "${REMOTE_USER}@${REMOTE_HOST}:${REMOTE_PUBLIC_DIR}"

echo "✅ تم رفع واستبدال مجلد public بالكامل!"
