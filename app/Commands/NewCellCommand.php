<?php

namespace App\Commands;

use LaravelZero\Framework\Commands\Command;
use LaravelZero\Framework\Contracts\Providers\ComposerContract;

class NewCellCommand extends Command
{
    /**
     * The name and signature of the command.
     *
     * @var string
     */
    protected $signature = 'new-cell {name=VendorName}';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Create a new Cell from skeleton';

    /**
     * Holds an instance of the composer service.
     *
     * @var \LaravelZero\Framework\Contracts\Providers\ComposerContract
     */
    protected $composer;

    /**
     * Creates a new instance of the NewCommand class.
     *
     * @param \LaravelZero\Framework\Contracts\Providers\ComposerContract $composer
     */
    public function __construct(ComposerContract $composer)
    {
        parent::__construct();

        $this->composer = $composer;
    }

    /**
     * Execute the command. Here goes the code.
     *
     * @return void
     */
    public function handle(): void
    {
        $this->info('Crafting application..');

        $name = $this->argument('name');

        if (!self::isCamelCaps($name)) {
            throw new \Exception('Name should be only in CamelCase format without Cell suffix');
        }

        $name = str_replace('Cell', '', $name);

        $this->composer->createProject(
            'apihawk/microcell',
            $this->argument('name') . 'Cell',
            ['--prefer-dist']
        );

        $this->comment('Application ready! Build something amazing.');
    }

    public static function isCamelCaps($string, $classFormat = false, $public = true, $strict = true)
    {
        // Check the first character first.
        if ($classFormat === false) {
            $legalFirstChar = '';
            if ($public === false) {
                $legalFirstChar = '[_]';
            }

            if ($strict === false) {
                // Can either start with a lowercase letter,
                // or multiple uppercase
                // in a row, representing an acronym.
                $legalFirstChar .= '([A-Z]{2,}|[a-z])';
            } else {
                $legalFirstChar .= '[a-z]';
            }
        } else {
            $legalFirstChar = '[A-Z]';
        }

        if (preg_match("/^$legalFirstChar/", $string) === 0) {
            return false;
        }

        // Check that the name only contains legal characters.
        $legalChars = 'a-zA-Z0-9';
        if (preg_match("|[^$legalChars]|", substr($string, 1)) > 0) {
            return false;
        }

        if ($strict === true) {
            // Check that there are not two capital letters
            // next to each other.
            $length = strlen($string);
            $lastCharWasCaps = $classFormat;

            for ($i = 1; $i < $length; $i++) {
                $ascii = ord($string{$i});
                if ($ascii >= 48 && $ascii <= 57) {
                    // The character is a number, so it cant be a capital.
                    $isCaps = false;
                } else {
                    if (strtoupper($string{$i}) === $string{$i}) {
                        $isCaps = true;
                    } else {
                        $isCaps = false;
                    }
                }

                if ($isCaps === true && $lastCharWasCaps === true) {
                    return false;
                }

                $lastCharWasCaps = $isCaps;
            }
        }//end if

        return true;

    }//end isCamelCaps()
}
