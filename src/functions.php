<?php namespace PhAnsi;

function set_cursor_position($lineNumber, $columnNumber)
{
    echo "\033[{$lineNumber};{$columnNumber}H";
}

function move_cursor_up($lineCount)
{
    echo "\033[{$lineCount}A";
}

function move_cursor_down($lineCount)
{
    echo "\033[{$lineCount}B";
}

function move_cursor_forward($columnCount)
{
    echo "\033[{$columnCount}C";
}

function move_cursor_backward($columnCount)
{
    echo "\033[{$columnCount}D";
}

function clear_screen()
{
    echo "\033[2J";
}

function erase_to_end_of_line()
{
    echo "\033[K";
}

function ns_save_cursor_position()
{
    echo "\033[s";
}

function ns_restore_cursor_position()
{
    echo "\033[u";
}

function terminal_cursor_position()
{
    $ttyprops = trim(`stty -g`);
    system('stty -icanon -echo');

    $term = fopen('/dev/tty', 'w');
    fwrite($term, "\033[6n");
    fclose($term);

    $buf = fread(STDIN, 16);

    system("stty '$ttyprops'");

    #echo bin2hex($buf) . "\n";

    $matches = [];
    preg_match('/^\033\[(\d+);(\d+)R$/', $buf, $matches);

    return [
        intval($matches[2]),
        intval($matches[1]),
    ];
}

function terminal_width()
{
    return `tput cols`;
}

function terminal_height()
{
    return `tput lines`;
}