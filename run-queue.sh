#!/bin/bash
# Queue worker untuk Content Studio — dipanggil cron hPanel tiap menit.
# --stop-when-empty: berhenti saat antrean kosong (hemat resource)
# --max-time=55: maksimal 55 detik agar tidak tumpang tindih cron menit berikutnya
cd /home/u301249154/domains/m2b.co.id/public_html/cms
/usr/bin/php artisan queue:work --stop-when-empty --max-time=55 --tries=1 --timeout=600 >> /tmp/cms_queue.log 2>&1
