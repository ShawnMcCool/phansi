<?php

function set_cursor_position($lineNumber, $columnNumber) {
    echo "\033[{$lineNumber};{$columnNumber}H";
}

function move_cursor_up($lineCount) {
    echo "\033[{$lineCount}A";
}

function move_cursor_down($lineCount) {
    echo "\033[{$lineCount}B";
}

function move_cursor_forward($columnCount) {
    echo "\033[{$columnCount}C";
}

function move_cursor_backward($columnCount) {
    echo "\033[{$columnCount}D";
}

function clear_screen() {
    echo "\033[2J";
}

function erase_to_end_of_line() {
    echo "\033[K";
}

function ns_save_cursor_position() {
    echo "\033[s";
}

function ns_restore_cursor_position() {
    echo "\033[u";
}

$animation = ['🌑', '🌒', '🌓', '🌔', '🌕', '🌖', '🌗', '🌘'];

$frame = 0;

echo "\n";
while(true) {
    usleep(100000);
    move_cursor_backward(90);
    foreach(range(1, 10) as $i) {
        echo $animation[$frame] . ' ';
    }

    $frame++;
    if ($frame == count($animation)) {
        $frame = 0;
    }
}