<!-- partials/page-title.php -->
<div class="flex justify-between items-center mb-6">
    <h4 class="text-slate-900 dark:text-slate-200 text-lg font-medium"><?php echo end($pageTitles); ?></h4>
    <div class="md:flex hidden items-center gap-2.5 text-sm font-semibold">
        <?php
        $total = count($pageTitles);
        foreach ($pageTitles as $index => $title) {
            if ($index < $total - 1) {
                echo '<div class="flex items-center gap-2">';
                if ($index > 0) {
                    echo '<i class="mgc_right_line text-lg flex-shrink-0 text-slate-400 rtl:rotate-180"></i>';
                }
                echo '<a href="#" class="text-sm font-medium text-slate-700 dark:text-slate-400">' . $title . '</a>';
                echo '</div>';
            } else {
                echo '<div class="flex items-center gap-2">';
                echo '<i class="mgc_right_line text-lg flex-shrink-0 text-slate-400 rtl:rotate-180"></i>';
                echo '<a href="#" class="text-sm font-medium text-slate-700 dark:text-slate-400" aria-current="page">' . $title . '</a>';
                echo '</div>';
            }
        }
        ?>
    </div>
</div>