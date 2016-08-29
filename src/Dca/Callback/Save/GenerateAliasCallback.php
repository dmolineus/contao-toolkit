<?php

/**
 * @package    contao-toolkit
 * @author     David Molineus <david.molineus@netzmacht.de>
 * @copyright  2015-2016 netzmacht David Molineus
 * @license    LGPL 3.0
 * @filesource
 *
 */

namespace Netzmacht\Contao\Toolkit\Dca\Callback\Save;

use Netzmacht\Contao\Toolkit\Data\Alias\AliasGenerator;
use Webmozart\Assert\Assert;

/**
 * Class GenerateAliasCallback is designed to create an alias of a column.
 *
 * @package Netzmacht\Contao\Toolkit\Dca\Callback
 */
class GenerateAliasCallback
{
    /**
     * The alias generator.
     *
     * @var AliasGenerator
     */
    private $generator;

    /**
     * Construct.
     *
     * @param AliasGenerator $generator The alias generator.
     */
    public function __construct(AliasGenerator $generator)
    {
        $this->generator = $generator;
    }

    /**
     * Generate the alias value.
     *
     * @param mixed          $value         The current value.
     * @param \DataContainer $dataContainer The data container driver.
     *
     * @return mixed|null|string
     */
    public function __invoke($value, $dataContainer)
    {
        Assert::isInstanceOf($dataContainer, 'DataContainer');
        Assert::isInstanceOf($dataContainer->activeRecord, 'Database\Result');

        return $this->generator->generate($dataContainer->activeRecord, $value);
    }
}
