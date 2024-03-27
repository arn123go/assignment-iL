<?php

$string = ']This is a (sample} sentence [for bracket testing]';

// Set $messageShow = false if you don't want to see messages.
function validateBracket( $string = '', $messageShow = true ) {
    $bracketTemplate = '(){}[]';
    $bracketFound = '';
    $bracketPosition = false;
    $ifUnsolvedPosition = false;
    $loopLimit = strlen( $string );

    for ( $i = 0; $i < $loopLimit; $i++ ) {

        $currentBracketPos = strpos( $bracketTemplate, $string[$i] );

        if ( $currentBracketPos !== false ) {
            if ( !$bracketFound ) {
                if ( $currentBracketPos % 2 === 0 ) {
                    $bracketFound = $string[$i];
                    $bracketPosition = strpos( $bracketTemplate, $bracketFound );
                    $ifUnsolvedPosition = $i;
                } else {
                    $message = "Character Position {$i}: Opening bracket '{$bracketTemplate[$currentBracketPos - 1]}' should appear first. But closing bracket '{$string[$i]}' appeared first at position [{$i}]!\n\n";
                    if ( $messageShow === true ) {
                        echo $message;
                    }

                    return false;
                }
            } else {

                if ( $currentBracketPos !== $bracketPosition + 1 ) {
                    $message = "Character Position {$i}: After '{$bracketFound}' at position [{$ifUnsolvedPosition}], there should come '{$bracketTemplate[$bracketPosition + 1]}'. But '{$string[$i]}' found at position [{$i}]!\n\n";
                    if ( $messageShow === true ) {
                        echo $message;
                    }

                    return false;
                } else {
                    $bracketFound = '';
                    $bracketPosition = false;
                    $ifUnsolvedPosition = false;
                }
            }
        }
    }
    if ( $bracketFound !== '' ) {
        $message = "Character Position {$ifUnsolvedPosition}: This opening bracket '{$bracketFound}' was never closed!\n\n";
        if ( $messageShow == true ) {
            echo $message;    
        }

        return false;
    }
    return true;
}

$timeStart = microtime( true );

var_dump( validateBracket( $string ) );

echo "\n Time taken = " . microtime( true ) - $timeStart . "\n\n";