<?php
$dir = new RecursiveDirectoryIterator('c:\laragon\www\web-sekolah\resources\views\superadmin');
$ite = new RecursiveIteratorIterator($dir);
$files = new RegexIterator($ite, '/^.+\.blade\.php$/i', RecursiveRegexIterator::GET_MATCH);

foreach($files as $file) {
    if (strpos($file[0], 'messages') !== false) continue;
    $content = file_get_contents($file[0]);
    if (strpos($content, 'Pesan Masuk') === false && strpos($content, 'Artikel / Berita') !== false) {
        $pattern = '/<a href="\/superadmin\/articles".*?<\/a>/is';
        
        $content = preg_replace_callback($pattern, function($matches) {
            return $matches[0] . "\n" . '            <a href="/superadmin/messages" class="flex items-center gap-3 px-4 py-3 rounded-xl sidebar-item font-medium text-sm transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                Pesan Masuk
            </a>';
        }, $content);
        
        file_put_contents($file[0], $content);
        echo "Updated " . $file[0] . "\n";
    }
}
