#!/bin/bash

# المسار المحلي لمشروعك – عدله حسب مكانه
LOCAL_PROJECT_DIR="/path/to/your/laravel-project/"  # ← عدله

# بيانات السيرفر
REMOTE_USER="tiyar"
REMOTE_HOST="195.35.24.73"
REMOTE_PROJECT_DIR="/home/tiyar/project/"  # ← عدل هذا حسب مسار المشروع في السيرفر

# تنفيذ المزامنة
rsync -avz --delete "$LOCAL_PROJECT_DIR" "$REMOTE_USER@$REMOTE_HOST:$REMOTE_PROJECT_DIR"

echo "✅ تم رفع المشروع بالكامل إلى السيرفر بنجاح!"
